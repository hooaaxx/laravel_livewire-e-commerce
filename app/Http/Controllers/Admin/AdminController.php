<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $users = User::with('role')->get();

        return view('admin.index', compact('users'));
    }

    // public function createUser(Request $request)
    // {
    //     $user = new User();
    //     $user->role_id = $request->role_id;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect('/admin')->with('status', 'Successfully created user.');
    // }
}
