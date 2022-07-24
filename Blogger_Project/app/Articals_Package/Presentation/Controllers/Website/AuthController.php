<?php

namespace App\Articals_Package\Presentation\Controllers\Website;

use App\Articals_Package\Domain\Usecase\UserUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //

        //
        public $userUseCases;




        public function __construct()
        {
            $this->userUseCases = new UserUseCases();
        }


    public function index()
    {
        

        return view('Website.screens.auth');
        
    }



    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $isSuccess =    $this->userUseCases->checkLoginCase($request);

        if ($isSuccess) {
            return redirect(route('home'));
        } else {
            return back()->with('error', 'Account not found.');
        }
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'image' => "required|mimes:jpeg,jpg,png,gif|max:2000",
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            
        ]);

        $storeArtical = $this->userUseCases->registerUserCase($request);

        return  redirect()->back()->with('success', 'The account has been successfully registered, you can now login.');   
        
    }



    public function logout()
    {

        return $this->userUseCases->logoutCase();
    }


    
}
