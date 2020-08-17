<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     */
    public function show($id)
    {
        if ($id == auth()->id() || auth()->id() == 1) {
            $user = User::select('id', 'name', 'email', 'active')->where('id', '=', $id)->first();
            //dd($user);
            if (!$user) {
                abort(404);
            }
            return view('profile', ['user' => $user]);
        }
        abort(404);
    }

    public function update(ProfileUpdateRequest $request, $id)
    {
        $userID = $id;
        if (auth()->id() != 1) {
            $userID = auth()->id();
        }
        $data = ['name' => $request->input('name'), /*'email' => $request->input('email'),*/ 'password' =>
            $request->input('password'), 'active' => $request->has('active')];

        User::where('id', '=', $userID)->update($data);
        return Redirect::route('profile', ['id' => $userID]);
    }
}
