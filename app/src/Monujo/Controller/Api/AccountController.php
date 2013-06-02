<?php namespace Monujo\Controller\Api;

use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Routing\Controllers\Controller;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

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
        try {
            // Get the current active/logged in user
            $user = Sentry::getUser();
        } catch (UserNotFoundException $e) {
        }

        return $user;
    }


}
