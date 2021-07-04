<?php


namespace App\Http\Controllers\AdminControllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view(self::THEME_PREFIX . '.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:10',
            'password' => 'required|min:5|max:16'
        ]);

        if(!auth('admin')->attempt($request->only(['username','password']))){
            abort(401,'账号密码不对');
        }
        return $this->msg();
    }

    public function logout()
    {
        Auth::logout();
        return $this->msg();
    }

}
