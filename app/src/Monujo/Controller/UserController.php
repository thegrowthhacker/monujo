<?php namespace Monujo\Controller;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Throttling\UserBannedException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

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
                    return Redirect::to("login")->with("success", Lang::get("auth.login.success"));
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
            }
            // Redirect to the login page
            return Redirect::route("login.get")->with("error", Lang::get($error));
        }

        // Something went wrong
        return Redirect::route("login.get")->withInput()->withErrors($validator);
    }

    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route("home")->with("success", Lang::get("auth.logout.success"));
    }

    public function getProfile()
    {
        echo "2";
    }


}
