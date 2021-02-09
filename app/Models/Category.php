<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','parent_id','slug'];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimestamp(strtotime($value))->diffForHumans();
    }

    public function subject()
    {
        return $this->belongsToMany('App\Models\Brand', 'categories_brands', 'category_id', 'brand_id')->withTimestamps();;
    }
}
