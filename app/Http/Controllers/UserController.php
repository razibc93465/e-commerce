<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;  //Elequent ORM
use DB;

class UserController extends Controller
{
     public function manageUser() {
        // $users = User::all();
         $users = User::paginate(10);
//        $users = User::simplePaginate(10);
        return view('admin.user.manageUser', ['users' => $users]);
    }

    public function editUser($id) {
        $userById = User::where('id', $id)->first();
        return view('admin.user.editUser', ['userById' => $userById]);
    }

    public function updateUser(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        //  $user->password = $request->password;
        // 'password' => bcrypt($request['password']),
        $user->save();
        return redirect('/user/manage')->with('message', 'User info updated successfully');
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/user/manage')->with('message', 'User info deleted successfully');
    }
}
