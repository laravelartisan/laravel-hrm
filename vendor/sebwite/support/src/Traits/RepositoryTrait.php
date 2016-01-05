<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Support\Traits;

/**
 * This is the RepositoryTrait.
 *
 * @package        Sebwite\Support
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */

trait RepositoryTrait
{
    /**
     * Create a new instance of the model.
     *
     * @param  array $data
     * @return mixed|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function createModel(array $data = [ ])
    {
        $class = '\\' . ltrim($this->model, '\\');

        return new $class($data);
    }

    /**
     * Returns the model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Runtime override of the model.
     *
     * @param  string $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Dynamically pass missing methods to the model.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $model = $this->createModel();

        return call_user_func_array([ $model, $method ], $parameters);
    }
}
