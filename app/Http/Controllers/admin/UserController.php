<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
      $users = User::all();
      return view('admin-panel.user.index', compact('users'));
    }

    public function edit($id) {
      $user = User::find($id);
      return view('admin-panel.user.edit', compact('user'));
    }

    public function update(Request $request ,$id) {
      $user = User::find($id);
      $user->update([
        "name" => $request->name,
        "email" => $request->email,
        "status" => $request->status,
      ]);
      return redirect('admin/users')->with("successMsg", "You have successful updated");
    }

    public function delete($id) {
      $user = User::find($id);
      $user->delete();
      return back()->with("successMsg", "You have successful deleted");
    }
}