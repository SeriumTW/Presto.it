<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $path, $fileName, $w, $h;

    public function __construct($filePath,$w,$h)
    {

        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w=$w; 
        $this->h=$h;

      
    }
 

    public function handle()
    {

        // dd('convention over configuration');
        $w= $this->w;
        $h= $this->h;

        $srcPath = storage_path() . "/app/" . $this->path . "/" . $this->fileName;

        $destPath = storage_path(). "/app/" . $this->path ."/crop{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
        ->crop(Manipulations::CROP_CENTER, $w, $h)
        ->watermark(base_path('public\img\logowater.png'))
        ->watermarkPosition('top-right')
        ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
        ->watermarkHeight(10, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(30, Manipulations::UNIT_PERCENT)
        ->save($destPath);
    }

}
