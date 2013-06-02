<?php namespace Monujo\Controller;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\View;

/**
 *
 * Monujo
 *
 * @author Alessandro Arnodo
 *
 *
 */
class HomeController extends BaseController
{


    protected function getHome()
    {
        if (Sentry::check()){
            $this->layout = "layouts.app";
            return View::make('pages.app');
        }else{
            $this->layout = "layouts.home";
            return View::make('pages.home');
        }
    }
}
