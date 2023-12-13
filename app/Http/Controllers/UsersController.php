<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class UsersController extends Controller
{
    function signUp(): Response
    {
        return response()->view("users.register", [
            "title" => "Sign Up",
        ]);
    }

    function doSignUp(Request $request)
    {


        $user = new User();
        $nama = $request->input('nama');
        $nim = $request->input('nim');
        $password = Hash::make($request->input('password'));

        $user->nama = $nama;
        $user->nim = $nim;
        $user->password = $password;

        if (empty($nama) || empty($nim) || empty($password)) {
            return response()->view("users.register", [
                "title" => "Register",
                "error" => "Name or NIM or Password is required"
            ]);
        }

        $user->save();

        return response()->view("users.register", [
            "title" => "Register",
            "success" => "Sign Up Successfull"
        ]);
    }

    function login(): Response
    {
        return response()->view("users.login", [
            "title" => "Login",
        ]);
    }

    function doLogin(Request $request)
    {
        $nim = $request->input('nim');
        $password = $request->input('password');

        //validate input
        if (empty($nim) || empty($password)) {
            return response()->view("users.login", [
                "title" => "Login",
                "error" => "NIM or password is required"
            ]);
        }

        $data = [
            'nim' => $request->nim,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect("/");
        }

        return response()->view("users.login", [
            "title" => "Login",
            "error" => "NIM or password is wrong"
        ]);
    }

    function doLogout()
    {
        Auth::logout();
        return redirect("/login");
    }


    function detailUser(string $id)
    {
        $detailUser = User::findOrFail($id);

        return response()->view('dashboard.show', [
            "title" => "Profile",
            "data" => $detailUser
        ]);
    }

    function doUpdate(Request $request, string $id)
    {

        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $detailUser = User::findOrFail($id);
        //validate input
        if (empty($nim) || empty($nama)) {
            return response()->view('dashboard.show', [
                "title" => "Profile",
                "data" => $detailUser,
                "error" => "NIM or nama is required"
            ]);
        }



        $detailUser->update($request->all());

        return redirect("/");
    }
}
