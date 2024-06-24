<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentlogs = RentLogs::with(['user', 'mobil'])->where('user_id', Auth::user()->id)->get();
        return view('Profile.profile', ['rent_logs' => $rentlogs]);
    }

    public function index()
    {
        // $request->session()->flush();
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('User.user', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('User.registered-user', ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'mobil'])->where('user_id', $user->id)->get();
        return view('User.user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }

    public function approve($slug)
    {
        $user = user::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/' . $slug)->with('status', 'user berhasil di approve');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('User.user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'user berhasil di di blokir');
    }

    public function bannedUser()
    {
        $bannedUser = User::onlyTrashed()->get();
        return view('User.user-banned', ['bannedUsers' => $bannedUser]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'user berhasil di pulihkan');
    }
}
