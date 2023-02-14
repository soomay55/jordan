<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $casts = [
        'preloaded_amount' => 'json',
    ];
    protected $fillable=   ["category",
        "title",
        "description","featured_image",
        "video_link",
        "start_date",
        "end_date",
        "preloaded_amount",
        "goal",
        "available_fund",
        "status"];
}
