<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateUser $request)
    {
        $formData = $request->all();

        $formData['password'] = bcrypt($formData['password']);

        User::create($formData);

        flash()->success('User Created');

        return redirect()->route('admin.user.index');
    }

    public function edit($uuid)
    {
        $user = User::findByUuid($uuid);

        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUser $request, $uuid)
    {
        $user = User::findByUuid($uuid);

        $formData = $request->all();

        if(empty($formData['password']))
        {
            unset($formData['password']);
        } else
        {
            $formData['password'] = bcrypt($formData['password']);
        }

        $user->fill($formData);

        $user->save();

        flash()->success('User Updated');

        return redirect()->back();
    }

    public function delete(Request $request)
    {

    }
}
