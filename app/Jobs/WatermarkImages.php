<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImages;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class WatermarkImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $annoucement_image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($annoucement_image_id)
    {
        $this->annoucement_image_id = $annoucement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AnnouncementImages::find($this->annoucement_image_id);
        if (!$i) {return;}

        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);

        $image = Image::load($srcPath);
            $image->watermark(base_path('public\img\logowater.png'))
            ->watermarkPosition('top-right')
            ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
            ->watermarkHeight(10, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(30, Manipulations::UNIT_PERCENT);

            $image->save($srcPath);
    }
}
