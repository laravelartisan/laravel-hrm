<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support;

use Sebwite\Testbench\Traits\ServiceProviderTester;

/**
 * This is the SupportServiceProviderTest.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class SupportServiceProviderTest extends TestCase
{
    use ServiceProviderTester;

    protected function getPackageRootPath()
    {
        return realpath(__DIR__ . '/..');
    }


    public function testFunctionsExists()
    {
        $this->app->register($this->getServiceProviderClass());

        $this->assertTrue(function_exists('path_join'));

        $this->assertTrue(function_exists('path_is_absolute'));

        $this->assertTrue(function_exists('path_is_relative'));

        $this->assertTrue(function_exists('path_get_directory'));

        $this->assertTrue(function_exists('path_get_extension'));

        $this->assertTrue(function_exists('path_get_filename'));
    }



    public function testConfigFiles()
    {
        # $this->registerSupportServiceProvider();
        # $this->runServiceProviderPublishesConfigTest([ 'sebwite.support']);
    }
}
