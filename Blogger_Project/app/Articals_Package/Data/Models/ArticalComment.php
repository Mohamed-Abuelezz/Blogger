<?php

namespace App\Articals_Package\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticalComment extends Model
{
    use HasFactory;

    protected $table = 'articals_comments';


    public function artical()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_published_id');
    }

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
