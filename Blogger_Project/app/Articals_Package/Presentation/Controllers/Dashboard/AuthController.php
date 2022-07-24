<?php

namespace App\Articals_Package\Presentation\Controllers\Dashboard;

use App\Articals_Package\Domain\Usecase\AdminUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;

class AuthController extends Controller
{
    //
    public $adminUseCases;




    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->adminUseCases = new AdminUseCases();
    }

    public function getAuth()
    {
        return view('Dashboard.auth.auth');
    }


    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->adminUseCases->autoRegisterSuperAdminCase($request);

        $isSuccess =    $this->adminUseCases->checkLoginCase($request);

        if ($isSuccess) {
            return redirect(route('dashboard'));
        } else {
            return back()->with('error', 'Account not found.');
        }
    }


    public function logout()
    {

        return $this->adminUseCases->logoutCase();
    }
}
