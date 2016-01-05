<?php
/**
 * Part of the Sebwite PHP packages.
 *
 * MIT License and copyright information bundled with this package in the LICENSE file
 */
namespace Sebwite\Support;

use Illuminate\Container\Container;

/**
 * This is the Publisher.
 *
 * @package        Sebwite\Support
 * @author         Sebwite Dev Team
 * @copyright      Copyright (c) 2015, Sebwite
 * @license        https://tldrlegal.com/license/mit-license MIT License
 */
class Publisher
{
    /**
     * The package name (ex: sebwite/themes)
     * @var string
     */
    protected $package;

    /**
     * The path to the source files which are to be published
     * @var string
     */
    protected $sourcePath;

    /** @var \Illuminate\Filesystem\Filesystem */
    protected $files;

    protected $destinationPath;

    /**
     * @param \Sebwite\Support\Filesystem $files
     */
    protected function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    /**
     * publish
     */
    public function publish()
    {
        $destination = config_path('packages/' . $this->package);
        if (! $this->files->exists($this->sourcePath)) {
            return;
        }
        if (! $this->files->exists($this->destinationPath)) {
            $this->files->makeDirectory($destination, 0755, true);
        }
        $this->files->copyDirectory($this->sourcePath, $destination);
    }

    /**
     * Create a new publisher instance
     *
     * @param \Sebwite\Support\Filesystem $files
     * @return static
     */
    public static function create(Filesystem $files)
    {
        return Container::getInstance()->make(static::class);
    }

    /**
     * package
     *
     * @param $package
     * @return $this
     */
    public function to($destinationPath)
    {
        $this->destinationPath = $destinationPath;

        return $this;
    }

    /**
     * from
     *
     * @param $sourcePath
     * @return $this
     */
    public function from($sourcePath)
    {
        $this->sourcePath = $sourcePath;

        return $this;
    }
}
