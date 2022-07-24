<?php

namespace App\Articals_Package\Data\Repository;

use App\Articals_Package\Data\Models\Artical;
use App\Articals_Package\Data\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryRepository
{



    public function __construct()
    {

    }




    public function getCategories()
    {
        return   Category::all();
    }


    public function storeCategory(Request $request)
    {

        $category =    new Category();
        $category->name = $request->name;
        $category->save();

        return   $category;
        
    }

    public function removeCategory($id)
    {
        return   Category::destroy($id);
        
    }

}
