<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support;

use Sebwite\Support\SupportServiceProvider;

/**
 * This is the TestCase.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
abstract class TestCase extends \Sebwite\Testbench\TestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return SupportServiceProvider::class;
    }

    protected function getPackageRootPath()
    {
        return realpath(__DIR__ . '/..');
    }
}
