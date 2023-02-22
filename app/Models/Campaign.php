<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Campaign extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    //protected $guarded = [];
    protected $casts = [
        'preloaded_amount' => 'json',
    ];
    protected $guarded=['id'];
    // protected $fillable=   ["category",
    //     "title",
    //     "description","featured_image",
    //     "video_link",
    //     "start_date",
    //     "end_date",
    //     "preloaded_amount",
    //     "goal",
    //     "available_fund",
    //     "status"];
    public $translatedAttributes = ['title', 'description'];
}
