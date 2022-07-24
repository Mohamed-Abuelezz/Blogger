<?php

namespace App\Articals_Package\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = array();


    public function articals()
    {
        return $this->hasMany(Artical::class);
    }
}
