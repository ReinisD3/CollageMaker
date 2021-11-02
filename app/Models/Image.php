<?php

namespace App\Models;

use Imagick;

class Image
{
    private Imagick $imagick;
    private string $name;

    public function __construct(string $fileName, $config)
    {
        $this->imagick = new Imagick($fileName);
        $imageName = str_replace("$config->imageDirectoryPath/",'',$fileName);
        $this->name = str_replace(".$config->imagesFormat",'',$imageName);
    }

    public function getImagick(): Imagick
    {
        return $this->imagick;
    }
    public function name() :string
    {
        return $this->name;
    }


}