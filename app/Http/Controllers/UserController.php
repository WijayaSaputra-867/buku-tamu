<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\User;
use Monolog\Handler\IFTTTHandler;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(5);
        return view('user.index', [
            'link' => 'petugas',
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data jika diperlukan
        $validate = $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'konfirmasi'=> 'required|confirmed:'
        ],
        [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa email yang valid.',
            'email.unique' => 'Email harus berbeda dengan email yang sudah di tambahkan.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sama dengan password.',
            'password.min' => 'Password harus lebih besar dari 6 karakter.',
            'konfirmasi.required' => 'Konfirmasi password harus diisi',
            'konfirmasi.confirmed' => 'Konfirmasi password tidak sama dengan password.',
        ]);

        // Simpan data pengguna baru ke database
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
       
         // menaruh image di public
         if ($request->file('image') != null) {
            $user->image =  $request->file('image')->store('guest', 'public');
         }else {
             $user->image = null;
         }

        if ($user->save()) {
            return redirect()->back()->with('success', 'Petugas telah ditambahkan');
        }else {
            return redirect()->back()->with('danger', 'Petugas gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $checkin = $this->check('checkin', $user);
        $checkout = $this->check('checkout', $user);
        return view('user.details',[
            'link' => 'petugas',
            'user' => $user,
            'checkin' => $checkin,
            'checkout' => $checkout,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if($request->input('email') != $user->email){

            $validate = $request->validate([
                'nama' => 'required|string|max:50',
                'email' => 'required|email|unique:users',
            ],
            [
                'nama.required' => 'Nama wajib diisi.',
                'nama.string' => 'Nama harus berupa teks.',
                'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email harus berupa email yang valid.',
                'email.unique' => 'Email harus berbeda dengan email yang sudah di tambahkan.',
            ]);
        }else{

            $validate = $request->validate([
                'nama' => 'required|string|max:50',
                'email' => 'required|email',
            ],
            [
                'nama.required' => 'Nama wajib diisi.',
                'nama.string' => 'Nama harus berupa teks.',
                'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email harus berupa email yang valid.',
            ]);
        }

        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if ($user->save()) {
            return redirect()->back()->with('success', 'Petugas telah diubah');
        }else {
            return redirect()->back()->with('danger', 'Petugas gagal diubah');
        }
    }

    private function check(string $check, User $user){
        if($check == 'checkin'){
            if(!$user->checkIn->isEmpty()){
                $result = $user->checkIn;
            }else{
                $result = null;
            }
        }else if($check == 'checkout'){
            if(!$user->checkOut->isEmpty()){
                $result = $user->checkOut;
            }else{
                $result = null;
            }
        }
        return $result;
    }
}
