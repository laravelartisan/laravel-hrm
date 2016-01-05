<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Support;

use Illuminate\View\Engines\CompilerEngine;

/**
 * Sebwite Support Service Provider
 *
 * @author    Sebwite Dev Team
 * @copyright Copyright (c) 2015, Sebwite
 * @license   https://tldrlegal.com/license/mit-license MIT License
 * @package   Sebwite\Support
 */
class SupportServiceProvider extends ServiceProvider
{
    protected $dir = __DIR__;


    protected $provides = [ 'sebwite.support.generator', 'fs' ];

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $app = parent::register();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app    = parent::register();

        $app->singleton('fs', Filesystem::class);
        $this->registerStubs();
        $this->registerHelpers();
    }

    protected function registerHelpers()
    {
        require_once(realpath(__DIR__ . '/helpers.php'));
    }

    protected function registerStubs()
    {
        $app = $this->app;

        /** @var \Illuminate\View\Factory $view */
        $view     = $app->make('view');
        $resolver = $app->make('view.engine.resolver');

        $app->singleton('sebwite.support.generator', StubGenerator::class);

        $resolver->register('stub', function () use ($app) {

            $compiler = $app->make('blade.compiler');

            return new CompilerEngine($compiler);

        });
        $view->addExtension('stub', 'stub');
    }
}
