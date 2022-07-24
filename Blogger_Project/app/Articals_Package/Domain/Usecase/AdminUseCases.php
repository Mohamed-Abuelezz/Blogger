<?php

namespace App\Articals_Package\Domain\Usecase;

use App\Articals_Package\Data\Models\Admin;
use App\Articals_Package\Data\Repository\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUseCases
{

    private $adminRepository;


    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }



    public function getAllAdminsCase()
    {
        return   $this->adminRepository->getAdmins();
    }

    public function autoRegisterSuperAdminCase(Request $request)
    {

        if (Admin::where('email', $request->email)->first() == null) {
            $admin =    new Admin;
            $admin->name = 'Mohamed Khalid';
            $admin->email = $request->email;
            $admin->image = 'ssssss';
            $admin->password = Hash::make($request->password);
            $admin->save();
        }
    }

    public function checkLoginCase(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),]))
        {

            return true;

        }else {
            return false;
        }
    }

    public function logoutCase()
    {
        if (Auth::guard('admin')->check()) {
            # code...
            Auth::guard('admin')->logout();

        } 
        
        return redirect()->route('adminAuth');
    }
}
