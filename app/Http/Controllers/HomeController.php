<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\User;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $folder = $user->folders()->first();
        if (!isset($folder)) {
            return view('home');
        }
        return redirect()->route('tasks.index', ['id' => $folder->id]);
    }

    public function guestLogin(){
        $email = 'gest@sample.jp';
        $password = 'gest0000';

        if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            $folder = $user->folders()->first();
            if (!isset($folder)) {
                return view('home');
            }else{
                return redirect()->route('tasks.index', ['id' => $folder->id]);
            }
        }

        return redirect('/');
    }
}
