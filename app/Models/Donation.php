<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
