<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //

    public function users_list(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(User::query()->where("id", '<>', auth()->user()->id))->make(true);
        }
        return $this
            ->page_title("Users list")
            ->breadcrumb_link("Dashboard", route('dashboard.index'))
            ->breadcrumb_link("Users", route('dashboard.users.list'))
            ->view("dashboard.users.users_list");
    }


    public function create_user()
    {
        return $this->page_title("Create New User")
            ->breadcrumb_link("Dashboard", route('dashboard.index'))
            ->breadcrumb_link("Users", route('dashboard.users.list'))
            ->breadcrumb_link("Create New User", route('dashboard.users.create'))
            ->view("dashboard.users.create_user");
    }


    public function store_user(Request $request)
    {
        $valid_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create($valid_data);
        return redirect()->route('dashboard.users.list')->with('success', 'User created successfully.');
    }


    public function edit_user(User $user)
    {
        return $this->page_title("Edit User: " . $user->name)
            ->breadcrumb_link("Dashboard", route('dashboard.index'))
            ->breadcrumb_link("Users", route('dashboard.users.list'))
            ->breadcrumb_link("Edit  User: " . $user->name, route('dashboard.users.edit', ['user' => $user->id]))
            ->setData('user', $user)
            ->view("dashboard.users.edit_user");
    }

    public function delete_user(User $user)
    {
        $user->delete();
        return true;
    }
}
