<?php

namespace App\Articals_Package\Data\Repository;

use App\Articals_Package\Data\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{



    public function __construct()
    {

    }


    public function getAdmin($id)
    {
        return   Admin::findOrFail($id);
    }

    public function getAdmins()
    {
        return   Admin::all();
    }

    public function addAdmin(Request $request)
    {
        $admin =    new Admin;
        $admin->name =  $request->name;
        $admin->email = $request->email;

        $imagePath = null;
        if ($request->image != null) {

            $imagePath =    myStoreUploadImages('admins_images', $request);
        }

        $admin->image = $request->image;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return  $admin;
    }
}
