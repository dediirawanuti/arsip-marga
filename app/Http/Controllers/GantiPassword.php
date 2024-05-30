<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GantiPassword extends Controller
{
    public function editPassword($hashId)
    {
        $users = User::findByHashId($hashId);
        return view('users.gantipassword', compact('users'));
    }

    public function updatePassword(Request $request, $hashId)
    {
        $users = User::findByHashId($hashId);

        // Validate input
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Check current password
        if (!Hash::check($request->current_password, $users->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update to new password
        $users->password = Hash::make($request->password);
        $users->save();

        return redirect()->route('users.index')->with('success', 'Password berhasil diubah');
    }
}
