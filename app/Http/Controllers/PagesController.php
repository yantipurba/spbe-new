<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Aplikasi;
use App\Models\Bank;
use App\Models\Homestay;
use App\Models\Hosting;
use App\Models\Pesanan;
use App\Models\Rekomendasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{

    public function register_verifiaktor()
    {
        return view('auth.register_verifikator');
    }

    public function tambah_user()
    {
        return view('admin.create-user');
    }
    public function create_user(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect('/home');
    }

    public function dashboard()
    {
        if (Auth::user() != null) {
            if (Auth::user()->role == "admin") {
                $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
                // dd($users);
                return view('admin.dashboard', compact(['users']));
            } else if (Auth::user()->role == "verifikator") {
                $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
                // dd($users);
                $aplikasi = count(Aplikasi::all());
                $hosting = count(Hosting::all());
                // $aduanJaringan = count(::all());
                $rekomendasi = count(Rekomendasi::all());
                return view('verifikator.dashboard', compact(['users', 'aplikasi', 'hosting', 'rekomendasi']));
            } else {
                $aplikasi = count(Aplikasi::all());
                $hosting = count(Hosting::all());
                // $aduanJaringan = count(::all());
                $rekomendasi = count(Rekomendasi::all());
                return view('user.index', compact(['aplikasi', 'hosting', 'rekomendasi']));
            }
        } else {
            return view('auth.login');
        }
    }
    public function home()
    {
        if (Auth::user()->role == "admin") {
            $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
            // dd($users);
            return view('admin.dashboard', compact(['users']));
        } else if (Auth::user()->role == "verifikator") {
            $users = User::where('role', 'user')->orderBy('id', 'desc')->get();
            // dd($users);
            $aplikasi = count(Aplikasi::all());
            $hosting = count(Hosting::all());
            // $aduanJaringan = count(::all());
            $rekomendasi = count(Rekomendasi::all());
            return view('verifikator.dashboard', compact(['users', 'aplikasi', 'hosting', 'rekomendasi']));
        } else {
            $aplikasi = count(Aplikasi::all());
            $hosting = count(Hosting::all());
            // $aduanJaringan = count(::all());
            $rekomendasi = count(Rekomendasi::all());
            return view('user.index', compact(['aplikasi', 'hosting', 'rekomendasi']));
        }
    }

    public function akunBank()
    {
        $admin_id = User::find(Auth::user()->id)->admin->id;
        return view('admin.bank', compact(['banks', 'admin_id']));
    }

    public function pesanan()
    {
        $admin_id = User::find(Auth::user()->id)->admin->id;
        return view('admin.pesanan', compact(['pesanans', 'homestay']));
    }
}
