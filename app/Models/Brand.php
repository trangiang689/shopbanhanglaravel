<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','parent_id','email','phone','address','slug'];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }
    public function faculty()
    {
        return $this->belongsToMany('App\Models\Category', 'categories_brands', 'brand_id', 'category_id')->withTimestamps();
    }
}
