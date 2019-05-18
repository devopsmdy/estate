<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        $user_id = auth()->user()->id;
        return view('user.edit', compact('user_id'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(1);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return back()->with('status', 'Password changed successfully');
        } else {
            return back()->with('status', 'Incorrect password');
        }
    }
}
