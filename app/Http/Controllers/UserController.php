<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();

        User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'picture_url' => 'https://ui-avatars.com/api/?background=random&color=fff&name='.$request['name']
        ]);

        return redirect(route('user.index'))->with('success','Berhasil menambhkan pengguna baru!');
    }
}
