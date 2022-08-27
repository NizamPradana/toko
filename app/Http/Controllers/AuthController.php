<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {

        $users = User::all();

        return view('dashboard.user.index', [
            'title' => 'Users',
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('dashboard.user.tambah', [
            'title' => 'Users',
        ]);
    }

    
    // view Login
    public function viewLogin()
    {
        return view('auth.login');
    }

    // view register
    public function viewRegister()
    {
        return view('auth.register');
    }

    // proses login
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            // jika admin login
            if(auth()->user()->role == "admin") return redirect()->route('pesanan.index');
            // jika user login
            if(auth()->user()->role == "user") return redirect()->route('toko');
            

        }
        return back()->with(['error' => 'Email or password is incorrect.']);
    }

    // proses logout     
    public function logout()
    {
        auth()->logout();
        return redirect()->route('viewLogin')->with(['success' => 'Berhasil Logout!.']);
    }
 
    // proses register
    public function register(Request $request)
    {

        if(!$request->role)
        {
            $request['role'] = 'user';
        }


        $validated = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'role' => 'required|in:admin,user'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        

        if($validated){
            User::create($validated);
            return back()->with('success', 'Register success');
        }
        return back()->with('error', 'Register error');

    }

    

}
