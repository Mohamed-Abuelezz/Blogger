<?php

namespace App\Articals_Package\Data\Repository;

use App\Articals_Package\Data\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{



    public function __construct()
    {

    }


    public function getUser($id)
    {
        return   User::findOrFail($id);
    }

    public function getUsers()
    {
        return   User::all();
    }

    public function addUser(Request $request)
    {
        $user =    new User;
        $user->name =  $request->name;
        $user->email = $request->email;

        $imagePath = null;
        if ($request->image != null) {

            $imagePath =    myStoreUploadImages('admins_images', $request);
        }

        $user->image = $imagePath;
        $user->password = Hash::make($request->password);
        $user->save();

        return  $user;
    }
}
