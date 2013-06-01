<?php namespace Monujo\Controller;

use Illuminate\Routing\Controllers\Controller;

/**
 *
 * Monujo
 *
 * @author Alessandro Arnodo
 *
 *
 */
class BaseController extends Controller
{



    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
