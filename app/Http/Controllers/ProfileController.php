<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(UpdateUserRequest $request)
    {
        $request->validated();

        $user = auth()->user();

        $user->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
        ]);

        return redirect(route('profile'))->with('success','Berhasil memperbarui profile!');
    }

    public function update_password(User $user, UpdateUserPasswordRequest $request)
    {
        $request->validated();

        $user = auth()->user();

        $user->update(['password' => Hash::make($request['password'])]);

        return redirect(route('profile'))->with('success','Berhasil memperbarui password!');
    }
}
