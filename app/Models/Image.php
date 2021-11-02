<?php

namespace App\Models;

use Imagick;

class Image
{
    private Imagick $imagick;
    private string $name;

    public function __construct(string $imagePath, $config)
    {
        $this->imagick = new Imagick($imagePath);
        $imageName = str_replace("$config->imageDirectoryPath/",'',$imagePath);
        $this->name = str_replace(".$config->imagesFormat",'',$imageName);
    }

    public function Imagick(): Imagick
    {
        return $this->imagick;
    }
    public function name() :string
    {
        return $this->name;
    }


}