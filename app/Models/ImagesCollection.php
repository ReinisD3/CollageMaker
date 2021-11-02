<?php

namespace App\Models;


class ImagesCollection
{
    private array $imageCollection = [];
    public function __construct(\stdClass $config)
    {
        $imageList = glob("$config->imageDirectoryPath/*");
        foreach ($imageList as $imagePath)
        {
            $img = new Image($imagePath, $config);
            $this->imageCollection[$img->name()] = $img;
        }
        ksort($this->imageCollection);
    }

    public function getImageCollection(): array
    {
        return $this->imageCollection;
    }
}