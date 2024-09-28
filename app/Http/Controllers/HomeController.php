<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function __construct()

    {

        $this->middleware('auth');
    }


    public function index()
    {

        // check user is login or not with role

        // if (Auth::user()->hasRole('admin')) {
        //     return redirect('/admin');
        // } else if (Auth::user()->hasRole('user')) {
        //     return redirect('/home');
        // }

        // if (Auth::check()) {
        //     return redirect('/home');
        // } else {
        //     return view('auth.login');
        // }



        if(Auth::id()){
            // Auth::logout();
            // Auth()->user()->hasRole('admin') ? redirect('/admin') : redirect('/home');
            $userRole = Auth::user()->role;
            // return $userRole;
            if($userRole == 'admin'){

                return view('pages.dashboard');
            }else{
                return view('user');
            }


            // if($userRole == 'admin'){
            //     return redirect('/admin');
            // }else{
            //     return redirect('/home');
            // }

            // return $userRole == 'admin' ? redirect('/admin') : redirect('/home');

           
        }
        
        // else{
        //     return view('auth.login');
        // }

    }


    public function adminHome()

    {

        return view('pages.dashboard');

        

    }
}
