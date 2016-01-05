<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support;

use Sebwite\Support\Path;
use Sebwite\Support\StubGenerator;
use Mockery as m;

/**
 * This is the StubGeneratorTest.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class StubGeneratorTest extends TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $fs;

    /**
     * @var \Mockery\MockInterface
     */
    protected $compiler;

    /**
     * @var \Sebwite\Support\StubGenerator
     */
    protected $generator;

    public function setUp()
    {
        parent::setUp();
        $this->fs = m::mock('Sebwite\\Support\\Filesystem');
        $this->compiler = m::mock('Illuminate\\View\\Compilers\\BladeCompiler');
        $this->generator = new StubGenerator($this->compiler, $this->fs);
    }

    public function testDirectoryGeneration()
    {
        $baseDir = base_path('test');
        foreach (['src', 'src2', 'src/make/this/happen'] as $dir) {
            $this->createDirGenTest($baseDir, $dir);
        }
    }

    protected function createDirGenTest($baseDir, $dir)
    {

        $this->fs->shouldReceive('exists')->once()->with(m::mustBe(Path::join($baseDir, $dir)))->andReturn(false);
        $this->fs->shouldReceive('makeDirectory')->once()->with(
            m::mustBe(Path::join($baseDir, $dir)),
            m::mustBe(0755),
            m::mustBe(true)
        )->andReturn(true);

        $generator = $this->generator->generateDirectoryStructure($baseDir, [$dir]);
        $this->assertInstanceOf(StubGenerator::class, $generator);
    }
}
