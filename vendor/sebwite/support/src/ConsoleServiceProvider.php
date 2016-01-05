<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Support;

use ErrorException;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * This is the ConsoleServiceProvider.
 *
 * @package        Sebwite\Support
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
abstract class ConsoleServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * The namespace where the commands are
     *
     * @var string
     */
    protected $namespace = '';

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [ ];

    /**
     * @var string
     */
    protected $prefix = '';

    protected $commandSuffix = 'Command';

    /**
     * Register the service provider.
     *
     * @throws ErrorException
     */
    public function register()
    {
        foreach ($this->commands as $binding => $command) {
            $bind    = $this->prefix . $binding;
            $command = '\\' . $this->namespace . '\\' . $command . $this->commandSuffix;
            unset($this->commands[ $binding ]);
            $this->commands[ $bind ] = $command;
            $this->app->singleton($bind, $command);
        }

        $this->commands(array_keys($this->commands));
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->commands);
    }
}
