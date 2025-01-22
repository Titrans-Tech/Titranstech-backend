<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Freetraining;
use App\Models\Jobpost;
use App\Models\Meeting;
use App\Models\Student;
use App\Models\Subcriber;
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
        $countjobs = Jobpost::count();
        $countmeet = Meeting::count();
        $countstudent = Student::count();
        $view_jobs = Jobpost::latest()->take(10)->get();
        $view_contacts = Contact::latest()->take(10)->get();
        $view_subs = Subcriber::latest()->take(10)->get();

        return view('dashboard.admin.home', compact('view_subs', 'view_contacts', 'view_jobs', 'countstudent', 'countmeet', 'countjobs', 'view_blogs', 'view_trainings', 'freetrainingcount', 'countblogs', 'countcontact'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function viewroles(){
        $view_roles = Admin::latest()->get();
        return view('dashboard.admin.viewroles', compact('view_roles'));
    }

    public function approveadadmin($id){
        $approve = Admin::find($id);
        $approve->role = 'admin';
        $approve->save();
        return redirect()->back()->with('success', 'Admin approved successfully');
    }

    public function suspendadmin($id){
        $suspend = Admin::find($id);
        $suspend->role = 'suspend';
        $suspend->save();
        return redirect()->back()->with('success', 'Admin suspended successfully');
    }

    public function deleteadmin($id){
        $delete = Admin::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully');
    }
}
