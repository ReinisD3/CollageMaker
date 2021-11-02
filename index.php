<?php

require_once 'vendor/autoload.php';

use App\Collage;
use App\Models\ImagesCollection;

$config = json_decode(file_get_contents('config.json'));

$imageCollection = new ImagesCollection($config);

Collage::make($config , $imageCollection);










