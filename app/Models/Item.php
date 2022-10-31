<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'parent_id', 'category_id', 'image', 'status', 'type'];


    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(static::class, 'category_id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }
}
