<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("dashboard", compact("users"));
    }

    public function order()

    {
        $tokos = Toko::get();
        return view('users.order', compact('tokos'));
    }

    public function detail($id): View
{
    $tokos = Toko::find($id);

    // Check if Toko exists
    if (!$tokos) {
        // Handle the case where Toko is not found, for example, redirect to an error page
        return redirect()->route('error.page');
    }

    return view('users.detail', compact('tokos'));
}


    // public function homepage()
    // {
    //     $users = User::all();
    //     return view("admins.homeadmin", compact("users"));
    // }

    // public function producpage()
    // {
    //     return view("admins.producpage");
    // }

    public function logout()

    {
        return view("dashboard");
    }

    public function index1()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'admin') {

                $userCount = User::count();
                $flowerCount = Toko::count();

                return view('admins.homeadmin', compact('userCount', 'flowerCount'));


                // $tokos = Toko::get();
                // return view('admins.homeadmin', compact('tokos'));





            } else if ($usertype == 'user') {
                $tokos = Toko::get();
                return view('users.homeuser', compact('tokos'));
            } else {
                return redirect()->back();
            }
        }
    }
}
