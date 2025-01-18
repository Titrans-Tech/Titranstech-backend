<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Freetraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function createadmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        if($admin){
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }

    public function loginadmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('admin.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
        $freetrainingcount = Freetraining::count();
        $countblogs = Blog::count();
        $countcontact = Contact::count();
        $view_trainings = Freetraining::latest()->take(10)->get();
        $view_blogs = Blog::latest()->take(10)->get();
        return view('dashboard.admin.home', compact('view_blogs', 'view_trainings', 'freetrainingcount', 'countblogs', 'countcontact'));
    }
}
