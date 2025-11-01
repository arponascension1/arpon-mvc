<?php

namespace App\Http\Middleware;

use Arpon\View\Factory as ViewFactory;

class ShareErrorsFromSession
{
    protected ViewFactory $view;

    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    public function handle($request, \Closure $next)
    {
        $this->view->share('errors', $request->session()->get('errors'));

        return $next($request);
    }
}
