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
class PageController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
}
