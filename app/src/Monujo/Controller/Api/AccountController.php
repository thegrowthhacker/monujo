<?php namespace Monujo\Controller\Api;

use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Routing\Controllers\Controller;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

/**
 *
 * Monujo
 *
 * @author Alessandro Arnodo
 *
 *
 */
class AccountController extends Controller
{

    public function getAccount()
    {
        sleep(1);
        try {
            // Get the current active/logged in user
            $user = Sentry::getUser();
        } catch (UserNotFoundException $e) {
        }

        return $user;
    }

    public function PostAccount()
    {
        $rules = array(
            "email" => "email|unique:users",
            "password" => "min:6",
        );
        $validator = Validator::make(Input::only("email", "password"), $rules);
        $user = Sentry::getUser();
            try {
                $user->email = Input::get("email");
                $user->first_name = Input::get("first_name");
                $user->last_name = Input::get("last_name");
                // Update the user
                if ($user->save()) {
                    // User information was updated
                } else {
                    // User information was not updated
                }
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                echo 'User with this login already exists.';
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                echo 'User was not found.';
            }
        return $user;
    }


}
