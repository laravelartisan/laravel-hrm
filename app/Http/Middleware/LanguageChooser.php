<?php

namespace Erp\Http\Middleware;

use Closure;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;


class LanguageChooser
{

    private $app;


    public function __construct(Application $app)
    {
        $this->app = $app;


    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Make sure current locale exists.

        if(Session::get('locale')){
            $locale = Session::get('locale');
        }else{
            $locale = $this->app->config->get('app.fallback_locale');
        }
        Session::put('language',$this->app->config->get('app.locales')[$locale]);
        $this->app->setLocale($locale);

        return $next($request);
    }
}
