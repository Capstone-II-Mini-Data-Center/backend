<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class UserController extends Controller
{
    public function index(Request $request)
    {
        
        $admins = Auth::user();
        $users = User::where('role', 'user')->get();
        $query = User::where('role', 'user');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $users = $query->get();

        return view('users.index', compact('users', 'admins'));
    }
    
}
