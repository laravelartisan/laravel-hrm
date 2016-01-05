<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Support\Traits;

/**
 * Singleton Trait
 *
 * @author    Sebwite Dev Team
 * @copyright Copyright (c) 2015, Sebwite
 * @license   https://tldrlegal.com/license/mit-license MIT License
 * @package   Sebwite\Support
 */
trait Singleton
{
    /**
     * @var mixed
     */
    protected static $instance;

    /**
     * Create a new singleton instance.
     *
     * @return void
     */
    protected function __construct()
    {
        if (method_exists($this, 'init')) {
            call_user_func_array([$this, 'init'], func_get_args());
        }
    }

    /**
     * Initialize a new instance.
     *
     * @return mixed
     */
    abstract protected function init();

    /**
     * Get the current instance.
     *
     * @param  string  $name
     * @return static
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        $instance = new static();

        static::$instance = $instance;

        return $instance;
    }
}
