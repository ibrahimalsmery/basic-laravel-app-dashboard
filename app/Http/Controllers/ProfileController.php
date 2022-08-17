<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_page()
    {

        return $this
            ->page_title("Dashboard")
            ->breadcrumb_link("Dashboard", route("dashboard.index"))
            ->breadcrumb_link("Profile <b>[" . auth()->user()->name . "]</b>", route("dashboard.user.profile"))->setData("auth", auth()->user())
            ->view("dashboard.user_profile.user_profile");
    }

    public function update_profile(Request $request, User $user = null)
    {
        if ($user == null or !$user) $user = auth()->user();

        if ($request->type == "updatedinfo") {
            $valid_data = $request->validate([
                "name" => "required | string ",
                "email" => "required | email | unique:users,email," . $user->id
            ]);
            $user->name = $valid_data['name'];
            $user->email = $valid_data['email'];
            $user->save();
        }
        if ($request->type == "updatepassword") {
            $valid_data = $request->validate([
                "password" => "required | confirmed "
            ]);
            $user->password = bcrypt($valid_data["password"]);
            $user->save();
        }

        if ($request->type == "updatedprofileimage") {

            if ($request->hasFile("profile_image")) {
                $user->image_profile = $request->file("profile_image")->store("public/imgprofile");
                $user->save();
            }
        }
        return back()->with("success", ucwords("user updated successfully."));
    }
}
