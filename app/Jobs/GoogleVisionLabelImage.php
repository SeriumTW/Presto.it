<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImages;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
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

        $image = file_get_contents(storage_path('/app/' . $i->file));

        //importa la variabile di ambienta GOOGLE_APPLICATION_CREDENTIALS
        //al path del credentials file

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        if ($labels){

            $result = [];
            foreach ($labels as $label){
                $result[] = $label->getDescription();
            }

            $i->labels = $result;
            $i->save();

        }

        $imageAnnotator->close();

        
    }
}
