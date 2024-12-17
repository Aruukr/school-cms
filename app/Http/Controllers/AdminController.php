<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin list";
        return view('admin.admin.list' ,$data);
    }

    public function add()
    {

        $data['header_title'] = " Add New User";
        return view('admin.admin.add' ,$data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('admin/admin/list')->with('success', "User Successfully Createed.");
    }

    public function edit($id)
    {
        $data['getRecord'] = user::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit User";
            return view('admin.admin.edit' ,$data);
        }
        else
        {
            abort(404);
        }

    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('admin/admin/list')->with('success', "User Successfully updated.");
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', "User Successfully deleted.");
    }
}
