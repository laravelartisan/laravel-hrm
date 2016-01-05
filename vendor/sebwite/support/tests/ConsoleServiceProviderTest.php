<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support;

use Sebwite\Testbench\Traits\ServiceProviderTester;
use Sebwite\Tests\Support\Fixture\ConsoleServiceProvider;

/**
 * This is the SupportServiceProviderTest.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class ConsoleServiceProviderTest extends TestCase
{
    use ServiceProviderTester;
    protected function getServiceProviderClass()
    {
        return ConsoleServiceProvider::class;
    }
}
