<?php

namespace App\Articals_Package\Data\Repository;

use App\Articals_Package\Data\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArticalRepository
{



    public function __construct()
    {
    }


    public function getArticals()
    {
        return   Artical::all();
    }

    public function getArtical($id)
    {
        return   Artical::where('id',$id)->first();
    }

    public function getArticalsWithPagination($numberOfItems)
    {
        
        return   Artical::paginate($numberOfItems);
    }

    public function getArticalsWithFilterCategoriesPagination($ids,$numberOfItems){

        return   Artical::whereIn('category_id',$ids)->paginate($numberOfItems);


    }

    public function storeArtical(Request $request)
    {

        $artical =    new Artical();
        $artical->title = $request->title;
        $artical->body = $request->body;

        if ($request->has('image')) {
            # code...
            $imagePath =    myStoreUploadImages('artical_images', $request);
            $artical->image = $imagePath;
        }

        $artical->category_id = $request->category;
        $artical->admin_published_id = Auth::guard('admin')->user()->id;

        $artical->save();


        return $artical;
    }



    public function getLastSpecificNumberArticals($number)
    {
        return   Artical::latest()->with('admin')->take($number)->get();
    }

    
    public function removeArtical($id)
    {
        return   Artical::destroy($id);
    }
}
