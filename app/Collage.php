<?php

namespace App;

use App\Models\ImagesCollection;
use Imagick;

class Collage
{
    public static function make(\stdClass $config , ImagesCollection $collection) :void
    {
        $rowImages = new Imagick();

        for ($i=0; $i < $config->rows ; $i++)
        {
            $row = new Imagick();
            $images = array_slice($collection->getImageCollection(),$i*$config->columns,$config->columns);
            /** @var Imagick $img */
            foreach( $images as $image)
            {
                $img = $image->getImagick();
                $img->borderImage($config->imageBorderColor,$config->imageBorderMargin/2,$config->imageBorderMargin);
                $img->resizeImage(362,544,imagick::FILTER_UNDEFINED, 1);
                $row->addImage($img);
            }
            $row->resetIterator();
            $rowImage = $row->appendImages(false);
            $rowImages->addImage($rowImage);
        }
        $rowImages->resetIterator();
        $final = $rowImages->appendImages(true);
        $final->setImageFormat($config->collageFormat);
        $final->setBackgroundColor($config->backgroundColor);
        $final->writeImage($config->collageName);
    }
}