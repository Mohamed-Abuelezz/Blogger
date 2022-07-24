<?php

namespace App\Articals_Package\Domain\Usecase;

use App\Articals_Package\Data\Models\Admin;
use App\Articals_Package\Data\Models\User;
use App\Articals_Package\Data\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUseCases
{

    private $userRepository;


    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }





    public function registerUserCase(Request $request)
    {

        $this->userRepository->addUser($request);
        
    }

    public function checkLoginCase(Request $request)
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),]))
        {

            return true;

        }else {
            return false;
        }
    }

    public function logoutCase()
    {
        if (Auth::check()) {
            # code...
            Auth::logout();

        } 
        
        return redirect()->route('auth');
    
}
}
