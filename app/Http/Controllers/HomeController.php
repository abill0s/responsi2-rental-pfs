<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;;

class HomeController extends Controller
{
    public function home(){
        $cars=Car::orderBy('id','DESC')->get();
        return view('home')
            ->with('cars',$cars);
    }   

    public function order($id){
        $car = Car::findOrFail($id);
        $user = Auth::user();
        if (Auth::check()) {
            return view('order')->with('car', $car)->with('user', $user);
        }
        return view('login');
    }

    public function loginView() {
        return view('login');
    }
}
