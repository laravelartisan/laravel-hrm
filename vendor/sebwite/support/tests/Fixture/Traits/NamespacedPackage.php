<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support\Fixture\Traits;

use Sebwite\Support\Traits\NamespacedPackageTrait;

/**
 * This is the NamespacedPackage.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class NamespacedPackage
{
    use NamespacedPackageTrait;

    /** Instantiates the class */
    public function __construct()
    {
    }
}
