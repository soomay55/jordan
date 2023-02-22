<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipTranslation extends Model
{
    use HasFactory;
    protected $table = 'membership_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
