<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
        return view('users.profile');
    }

    public function update(Request $request)
    {
        // get user and user.id
        $user = Auth::user();
        $id = $user?->getAuthIdentifier();

        // validate incoming inputs data from request
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        // get inputs request values
        $name = request('name');
        $surname = request('surname');
        $nickname = request('nickname');
        $email = request('email');

        assert($user !== null, "Cannot be a null user if is logged in");

        // user update;
        $user->name = $name;
        $user->surname = $surname;
        $user->nickname = $nickname;
        $user->email = $email;
        $image = $request->file('image');
        if ($image) {
            $image_path = time().$image->getClientOriginalName();
            Storage::disk('users')->put($image_path, File::get($image));
            $user->image = $image_path;
        }
        $user->update();
        //redirect
        return redirect()->route('user.profile')->with(['message' => 'You\'r personal info has been updated! :)']);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8'],
            'new-password' => ['required', 'string', 'min:8'],
            'new-password-confirm' => ['required', 'string', 'min:8'],
        ]);

        $password = request('password');
        $newPassword = request('new-password');
        $confirmPassword = request('new-password-confirm');

        if ($newPassword !== $confirmPassword && !Hash::check($password, $user->password)){
            return back()->withErrors(['new-password-confirm' => __('New password and confirm password mismatch.'), 'password' => __('The current password is incorrect.')]);
        }
        if (!Hash::check($password, $user->password)) {
            return back()->withErrors(['password' => __('The current password is incorrect.')]);
        }
        if ($newPassword !== $confirmPassword) {
            return back()->withErrors(['new-password-confirm' => __('New password and confirm password mismatch.')]);
        }


        $hashedNewPassword = Hash::make($newPassword);
        assert($user !== null, "Cannot be a null user if is logged in");

        $user->password = $hashedNewPassword;
        $user->update();

        return redirect()->route('user.profile')->with(['message' => 'You\'r password has been updated! :)']);
    }

    public function getImageFromStorage(string $filename){
        return new Response(Storage::disk('users')->get($filename), 201) ;
    }
}
