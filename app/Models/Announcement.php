<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImages;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [

        'title',
        'price',
        'description',
        'category_id',
        'user_id',
        'accepted',
        'modification_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(AnnouncementImages::class);
    }

    public static function ToBeRevisionedCount(){
        return Announcement::where('accepted', null)->count();
    }

    public static function ToBeRevisionedCountFalse(){
        return Announcement::where('accepted', false)->count();
    }

    public function toSearchableArray()
    {
        
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'category'=> $this->category->it,
            'categoryen'=> $this->category->en,
            'categoryes'=> $this->category->es,
            'description'=> $this->description,
        ];
        return $array;
    }
}
