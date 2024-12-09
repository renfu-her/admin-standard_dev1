<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        return view('frontend.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('member')->attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->has('redirect_to')) {
                return redirect($request->redirect_to);
            }
            
            return redirect()->intended(route('home'))->with('success', '登入成功');
        }

        return back()->withErrors([
            'email' => '帳號或密碼錯誤',
        ])->withInput()->with('error', '帳號或密碼錯誤');
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        session()->forget('cart');
        return redirect()->route('home')->with('success', '登出成功');
    }

}
