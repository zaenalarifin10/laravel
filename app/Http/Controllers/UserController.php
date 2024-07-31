<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8',
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->status = 'aktive';
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return to_route('users.table')->with('success', 'User berhasil ditambahkan!');
    }
    public function create()
    {
        return view('users.create');
    }
    public function users()
    {
                $users = user::all();
        return view('users.table', compact('users'));
    }
public function show($id)
    {
        $user= user::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$user) {
            abort(404);
        }
        // Mengirimkan data barang ke view
        return view('users.show', ['user' => $user]);
    }
    public function edit($id)
    {
        // Mengambil data barang berdasarkan ID
        $user = user::find($id);

        // Jika barang tidak ditemukan, bisa ditangani di sini
        if (!$user) {
            abort(404);
        }

        // Mengirimkan data barang ke view
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, user $user)
{
    // Validasi data input
    $validatedData = $request->validate([
        'name'=>'rerequired|string|max:255',
        'email'=>'rerequired|string|email|max:255|unique:users',
        'password'=>'rerequired|string|min:8',
        // tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);
    $user->update($validatedData);


    // Redirect atau tindakan lain setelah berhasil diupdate
    return redirect()->route('user.tables')->with('success','barang terupdete');
}
public function destroy($id)
{
    $user = user::findOrFail($id); // Temukan data barang berdasarkan ID
    $user->delete(); // Hapus data barang

    // Redirect atau tindakan lain setelah berhasil dihapus
    return redirect()->route('users.table')->with('success', 'data berhasil di hapus!');

}
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // Jika pengguna sudah login, arahkan ke halaman index
        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view('users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function index()
{
    return view('index'); // Pastikan Anda memiliki view untuk halaman beranda
}

}

