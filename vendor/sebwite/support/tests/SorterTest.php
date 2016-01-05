<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Tests\Support;

use Sebwite\Support\Contracts\Dependable;
use Sebwite\Support\Sorter;

/**
 * This is the SorterTest.
 *
 * @package        Sebwite\Tests
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class SorterTest extends TestCase
{

    /**
     * @var \Sebwite\Support\Contracts\Sortable
     */
    protected $s;


    public function setUp()
    {
        parent::setUp();
        $this->s = new Sorter;
    }
    public function testStringDependencyList()
    {
        $this->s->add(array(
            'mother' => 'father',
            'father' => null,
            'couple' => 'father, mother',
        ));
        $this->expected = array(
            'father',
            'mother',
            'couple',
        );

        $this->setResult($this->s->sort());
        $this->analyze();

        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
    }
    public function testDependableDependencyList()
    {
        $this->s->add(array(
            'father' => new SimpleDependable('father'),
            'mother' => new SimpleDependable('mother', 'father'),
            'couple' => new SimpleDependable('couple', 'mother,father'),
        ));
        $this->expected = array(
            'father',
            'mother',
            'couple',
        );
        $this->setResult($this->s->sort());
        $this->analyze();

        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
    }
    public function testDependablesArrayDependencyList()
    {
        $this->s->add(array(
            new SimpleDependable('father'),
            new SimpleDependable('mother', 'father'),
            new SimpleDependable('couple', 'mother,father'),
        ));
        $this->expected = array(
            'father',
            'mother',
            'couple',
        );
        $this->setResult($this->s->sort());
        $this->analyze();

        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
    }
    public function testSortGoodSet()
    {
        $this->s->add(array(
            'hello' => [],
            'helloGalaxy' => ['helloWorld'],
            'father' => [],
            'mother' => [],
            'child' => ['father', 'mother'],
            'helloWorld' => ['hello'],
            'family' => ['father', 'mother', 'child']
        ));
        $this->expected = array(
            'hello',
            'father',
            'mother',
            'child',
            'helloWorld',
            'family',
            'helloGalaxy',
        );
        $this->setResult($this->s->sort());
        $this->analyze();

        $this->assertEmpty($this->s->getCircular());
        $this->assertEmpty($this->s->getMissing(), json_encode($this->s->getMissing(), JSON_PRETTY_PRINT));

        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
    }
    public function testSortMissingSet()
    {
        $this->s->add(array(
            'helloWorld' => [],
            'helloGalaxy' => ['helloWorld'],
            'father' => [],
            'child' => ['father', 'mother'],
            'family' => ['father', 'mother', 'child']
        ));
        $this->expected = array(
            'helloWorld',
            'helloGalaxy',
            'father'
        );
        $this->setResult($this->s->sort());
        $this->analyze();
        $this->assertEmpty($this->s->getCircular());
        $this->assertTrue($this->s->isMissing('mother'));

        $this->assertTrue($this->s->hasMissing('child'));

        $this->assertTrue($this->s->hasMissing('family'));
        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
    }
    public function testSortCircularSet()
    {
        $this->s->add(array(
            'helloWorld' => ['hello'],
            'helloGalaxy' => ['helloWorld'],
            'mother' => ['father'],
            'child' => ['father', 'mother'],
            'father' => ['mother', 'baby'],
            'baby' => ['father']
        ));
        $this->expected = array( );
        $this->setResult($this->s->sort());
        $this->analyze();
        $this->assertSame($this->expected, array_values($this->getResult()), $this->msg());
        $this->assertTrue($this->s->isCircular('mother'));
        $this->assertTrue($this->s->isCircular('baby'));
        $this->assertTrue($this->s->isCircular('father'));

        $this->assertTrue($this->s->hasCircular('father'));

        $this->assertTrue($this->s->hasCircular('baby'));
        $this->assertTrue($this->s->hasCircular('mother'));
        $this->assertTrue($this->s->isMissing('hello'));
        $this->assertTrue($this->s->hasMissing('helloWorld'));
    }
    public function tearDown()
    {
        unset($this->expected);
        $this->setResult(null);
        unset($this->s);
    }
    protected function msg()
    {
        return sprintf(
            "Expected: %s\nResult: %s\n",
            join(", ", $this->expected),
            join(", ", $this->getResult())
        );
    }
    protected function analyze()
    {
        _d("\nLIST: [%s]", $this->getResult());
        {
            _d("\t [#] %12s %4s %4s %12s %4s %12s", 'item', 'dep\'es', 'missing', '', 'circular', '');
        foreach ($this->s->getHits() as $n => $c) {
            _d(
                "\t [%d] %12s %4s %4s %12s %4s %12s",
                $c,
                $n,
                $this->s->hasDependents($n) ? count($this->s->getDependents($n)) : 0,
                $this->s->hasMissing($n) ? count($this->s->getMissing($n)) : 0,
                $this->s->hasMissing($n) ? $this->s->getMissing($n) : '',
                $this->s->isCircular($n) ? count($this->s->getCircular($n)) : 0,
                $this->s->isCircular($n) ? $this->s->getCircular($n) : ''
            );
        }
        }
        _d("MISSING");
        foreach ($this->s->getMissing() as $key => $value) {
            _d("\t%s => %s", $key, $value);
        }
    }
}
function _d()
{
}


class SimpleDependable implements Dependable
{
    protected $handle;
    protected $deps;
    public function __construct($handle, $deps = [])
    {
        $this->handle = $handle;
        $this->deps = $deps;
    }
    public function getDependencies()
    {
        return $this->deps;
    }
    public function getHandle()
    {
        return $this->handle;
    }
}
