<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementImages extends Model
{
    use HasFactory;

    // google vision label
    protected $casts = [
        'labels' => 'array',
    ];

    public function announcement(){
        return $this->belongsTo(Announcement::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if(!$w && !$h){
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $filename = basename($filePath);

        $file ="{$path}/crop{$w}x{$h}_{$filename}";

        return Storage::url($file);
    }

    public function getUrl($w =null, $h = null){
        return AnnouncementImages::getUrlByFilePath($this->file, $w, $h);
    }

}
