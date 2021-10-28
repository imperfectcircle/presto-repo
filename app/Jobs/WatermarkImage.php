<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class WatermarkImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $announcement_image_id;

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id=$announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $i=AnnouncementImage::find($this->announcement_image_id);
            if(!$i) {return;}
            $srcPath = storage_path('/app/' . $i->file);
            
            $image = Image::load($srcPath);
         
            $image->watermark(base_path('public/media/watermark_presto.png'))
            ->watermarkPosition('bottom-left')
            // ->watermarkPadding(20, 3, Manipulations::UNIT_PERCENT)
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkHeight(15, Manipulations::UNIT_PERCENT)
            // ->watermarkWidth(50, Manipulations::UNIT_PERCENT)
            // ->watermarkFit(Manipulations::FIT_STRETCH)
            ->watermarkOpacity(35);
            
            
            $image->save($srcPath);
    }
}