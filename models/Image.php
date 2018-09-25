<?php


class Image
{
    public function searchImg($imgName, $imgFolder)
    {
        $file=dirname(__file__);
        $file=dirname($file);
        
        return $file."/images/".$imgFolder."/".$imgName;
    }
}
$imageManager= new Image;