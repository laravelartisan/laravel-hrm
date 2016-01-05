<?php
namespace Sebwite\Tests\Support\Traits;

use Sebwite\Support\Traits\NamespacedPackageTrait;
use Sebwite\Tests\Support\TestCase;

class NamespacedPackageTraitTest extends TestCase
{
    use NamespacedPackageTrait;


    protected function runValidatePackageName($expect, $packageName)
    {
        $this->assertEquals($expect, $this->isValidPackageName($packageName));
    }

    public function testParsePackageName()
    {
        $parsed = $this->parsePackageName('robin-radic/super-package');
        $this->assertArrayHasKey('vendor', $parsed);
        $this->assertArrayHasKey('package', $parsed);
        $this->assertEquals('robin-radic', $parsed[ 'vendor' ]);
        $this->assertEquals('super-package', $parsed[ 'package' ]);
    }

    public function testGetPackageNamespace()
    {
        $namespace = $this->getPackageNamespace('robin-radic/super-package');
        $this->assertEquals('RobinRadic\\SuperPackage', $namespace);
    }


    public function testValidateValidPackageName()
    {
        $this->runValidatePackageName(true, 'robin-radic/super-package');
    }

    public function testValidateInvalidPackageName()
    {
        $this->runValidatePackageName(false, 'robin-radic super-package_!@#A45');
        $this->runValidatePackageName(false, 'robin-radic');
    }
}
