<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('pages.user.user-all');
    }

    public function edit(Request $request){
        $user = User::where('id',$request->userId)->firstOrFail();
        return view('pages.user.user-edit',compact('user'));
    }
}
