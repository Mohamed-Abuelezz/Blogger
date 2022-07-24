<?php

namespace App\Articals_Package\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $table = 'articals';

/**
 * Does something interesting
 */ 

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_published_id');
    }

    public function comments()
    {
        return $this->hasMany(ArticalComment::class);
    }
}
