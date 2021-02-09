<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email = $request->get('email');
        $password = md5($request->get('password'));
        $result = DB::table('admins')->where('email', $email)->where('password', $password)->first();
//        echo "<pre>";
//        print_r($result);
//        echo "</pre>";
        if ($result) {
           \Illuminate\Support\Facades\Session::put('name', $result->name);
            \Illuminate\Support\Facades\Session::put('id',$result->id);
            return Redirect::to('/dashboard');
           // return view('admin.dashboard');
        }
        else{
            \Illuminate\Support\Facades\Session::put('message', 'Mật khẩu hoặc email bị sai');
            return Redirect::to('/admin-login');
        }

    }

    public function logout()
    {
        \Illuminate\Support\Facades\Session::put('name', null);
        \Illuminate\Support\Facades\Session::put('id',null);
        return Redirect::to('/admin-login');


    }
}
