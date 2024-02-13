<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class UserController extends Controller
{
    public function index()
    {
        
        $admins = Auth::user();
        $users = User::where('role', 'user')->get();

        return view('users.index', compact('users', 'admins'));
    }
    
}
