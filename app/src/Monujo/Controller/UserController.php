<?php namespace Monujo\Controller;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Throttling\UserBannedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Users\UserAlreadyActivatedException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

/**
 *
 * Monujo
 *
 * @author Alessandro Arnodo
 *
 *
 */
class UserController extends PageController
{

    public function getLogin()
    {
        // Are we logged in?
        if (Sentry::check()) {
            return Redirect::route("home");
        }

        // Show the page
        return View::make("pages.login");
    }

    public function postLogin()
    {
        $rules = array(
            "email" => "required|email",
            "password" => "required"
        );

        $validator = Validator::make(Input::only("email", "password"), $rules);

        if ($validator->passes()) {
            try {
                // Try to log the user in
                if (Sentry::authenticate(Input::only("email", "password"), Input::get("remember", 0))) {
                    return Redirect::route("home")->with("success", Lang::get("auth.login.success"));
                }
            } catch (UserNotFoundException $e) {
                $error = "auth.account.not.found";
            }
            catch (UserNotActivatedException $e) {
                $error = "auth.account.not.activated";
            }
            catch (UserSuspendedException $e) {
                $error = "auth.account.suspended";
            }
            catch (UserBannedException $e) {
                $error = "auth.account.banned";
            } catch (\Exception $e) {
                return Redirect::route("login.get")->with("error", Lang::get("auth.login.error"));
            }
            // Redirect to the login page
            return Redirect::route("login.get")->with("error", Lang::get($error));
        }

        // Something went wrong
        return Redirect::route("login.get")->withInput()->withErrors($validator);
    }

    public function getSignup()
    {
        // Are we logged in?
        if (Sentry::check()) {
            return Redirect::route("home");
        }

        // Show the page
        return View::make("pages.signup");
    }

    public function postSignup()
    {
        $rules = array(
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        );

        $validator = Validator::make(Input::only("email", "password", "password_confirmation", "username"), $rules);

        if ($validator->passes()) {
            try {
                // Let's register a user.
                $user = Sentry::register(array(
                    'email' => Input::get("email"),
                    'password' => Input::get("password"),
                    'username' => Input::get("username"),
                    'permissions' => array(
                        'user' => 1
                    )
                ));

                // Let's get the activation code
                $activationCode = $user->getActivationCode();

                $data = array("user" => $user, "activationCode" => $activationCode);

                Mail::send('emails.welcome', $data, function ($message) use (&$user) {
                    $message->to($user->email)->subject(Lang::get("auth.signup.welcome.mail.subject"));
                });
                return Redirect::route("home")->with("success", Lang::get("auth.signup.success"));

                // Send activation code to the user so he can activate the account
            } catch (\Exception $e) {
                return Redirect::route("signup.get")->with("error", Lang::get("auth.signup.error"));
            }

        }
        // Something went wrong
        return Redirect::route("signup.get")->withInput()->withErrors($validator);
    }

    function getActivate($id, $token)
    {
        try {
            // Find the user using the user id
            $user = Sentry::getUserProvider()->findById($id);

            // Attempt to activate the user
            if ($user->attemptActivation($token)) {
                return Redirect::route("home")->with("success", Lang::get("auth.activation.success"));
            }
        } catch
        (UserNotFoundException $e) {
            $error = "auth.account.not.found";
        }
        catch (UserAlreadyActivatedException $e) {
            $error = "auth.account.already.activated";
        }
        catch (\Exception $e) {
            return Redirect::route("home")->with("error", Lang::get("auth.activation.error"));
        }
        return Redirect::route("home")->with("error", !empty($error) ? Lang::get($error) : Lang::get("auth.activation.error"));
    }

    function getPasswordForgot()
    {
        // Are we logged in?
        if (Sentry::check()) {
            return Redirect::route("home");
        }

        // Show the page
        return View::make("pages.passwordForgot");
    }

    function postPasswordForgot()
    {
        $rules = array(
            "email" => "required|email"
        );

        $validator = Validator::make(Input::only("email"), $rules);

        if ($validator->passes()) {
            try {
                $user = Sentry::getUserProvider()->findByLogin(Input::get("email"));

                // Get the password reset code
                $resetCode = $user->getResetPasswordCode();

                $data = array("user" => $user, "resetCode" => $resetCode);

                Mail::send('emails.forgot', $data, function ($message) use (&$user) {
                    $message->to($user->email)->subject(Lang::get("auth.forgot.mail.subject"));
                });
                return Redirect::route("home")->with("success", Lang::get("auth.forgot.success"));
            } catch (UserNotFoundException $e) {
                $error = "auth.account.not.found";
            }
            catch (\Exception $e) {
                return Redirect::route("forgot.get")->with("error", Lang::get("auth.forgot.error"));
            }
            return Redirect::route("forgot.get")->with("error", !empty($error) ? $error : Lang::get("auth.forgot.error"));
        }

        // Something went wrong
        return Redirect::route("forgot.get")->withInput()->withErrors($validator);
    }

    function getPasswordReset($id, $token)
    {
        // Are we logged in?
        if (Sentry::check()) {
            return Redirect::route("home");
        }

        $data = array("id" => $id, "token" => $token);
        // Show the page
        return View::make("pages.passwordReset")->with($data);
    }

    function postPasswordReset()
    {
        $rules = array(
            "user_id" => "required",
            "user_token" => "required",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        );

        $validator = Validator::make(Input::only("user_id", "user_token", "password_confirmation", "password"), $rules);

        if ($validator->passes()) {
            try {
                $user = Sentry::getUserProvider()->findById(Input::get("user_id"));

                // Check if the reset password code is valid
                if ($user->checkResetPasswordCode(Input::get("user_token"))) {
                    // Attempt to reset the user password
                    if ($user->attemptResetPassword(Input::get("user_token"), Input::get("password"))) {
                        return Redirect::route("login.get")->with("success", Lang::get("auth.reset.success"));
                    }
                }
            } catch (UserNotFoundException $e) {
                $error = "auth.account.not.found";
            }
            catch (\Exception $e) {
                return Redirect::route("reset.get")->with("error", Lang::get("auth.forgot.error"));
            }
            return Redirect::route("reset.get", array(Input::get("user_id"), Input::get("user_token")))->with("error", !empty($error) ? Lang::get($error) : Lang::get("auth.reset.error"));
        }
        return Redirect::route("reset.get", array(Input::get("user_id"), Input::get("user_token")))->withInput()->withErrors($validator);
    }

    function getLogout()
    {
        Sentry::logout();
        return Redirect::route("home")->with("success", Lang::get("auth.logout.success"));
    }
}
