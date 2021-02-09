<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'mfg','exp','feature_image_path','content','user_id','category_id'];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }
}
