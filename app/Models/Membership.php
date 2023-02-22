<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Membership extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $casts = [
        'count' => 'json',
    ];
    protected $guarded=['id'];
    public $translatedAttributes = ['title', 'description'];
}
