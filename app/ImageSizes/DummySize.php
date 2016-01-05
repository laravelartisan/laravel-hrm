<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 11/28/15
 * Time: 11:18 AM
 */

namespace Erp\ImageSizes;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class DummySize implements FilterInterface {

    public function applyFilter(Image $image)
    {
        return $image->fit(200,150);
    }
}