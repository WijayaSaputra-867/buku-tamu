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
        $rules = [
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'jk' => 'required|in:Laki-laki,Perempuan', 
            'telepon' => 'required|numeric',
            'password' => 'required|min:6|confirmed'
        ];

        $message = [
             'nama.required' => 'Nama wajib diisi.',
             'nama.string' => 'Nama harus berupa teks.',
             'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
             'email.required' => 'Email wajib diisi.',
             'email.email' => 'Email harus berupa email yang valid.',
             'email.unique' => 'Email harus berbeda dengan email yang sudah di tambahkan.',
             'jk.required' => 'Pilih jenis kelamin.',
             'jk.in' => 'Pilih salah satu jenis kelamin yang tersedia.',
             'telepon.required' => 'Nomor telepon wajib diisi.',
             'telepon.numeric' => 'Nomor telepon wajib menggunakan angka.',
             'password.required' => 'Password wajib diisi.',
             'password.confirmed' => 'Konfirmasi password tidak sama dengan password.',
             'password.min' => 'Password harus lebih besar dari 6 karakter.',
        ];

        if($request->file('image') != null){
            $rules['image'] = 'image|mimes:jpeg,png,jpg';
            $message['image.image'] = 'Image harus berupa gambar';
            $message['image.mimes'] = 'Ekstensi harus jpeg, png, atau jpg';
        }

        $validate = $request->validate($rules, $message);

        // Simpan data pengguna baru ke database
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->gender = $request->jk;
        $user->phone = $request->telepon;
        $user->password = bcrypt($request->password);
       
         // menaruh image di public
         if ($request->file('image') != null) {
            $user->image =  $request->file('image')->store('user', 'public');
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
        $rules = [
            'nama_edit' => 'required|string|max:50',
            'jk_edit' => 'required|in:Laki-laki,Perempuan', 
            'telepon_edit' => 'required|numeric',
        ];

        $message = [
             'nama_edit.required' => 'Nama wajib diisi.',
             'nama_edit.string' => 'Nama harus berupa teks.',
             'nama_edit.max' => 'Nama tidak boleh lebih dari 50 karakter.',
             'jk_edit.required' => 'Pilih jenis kelamin.',
             'jk_edit.in' => 'Pilih salah satu jenis kelamin yang tersedia.',
             'telepon_edit.required' => 'Nomor telepon wajib diisi.',
             'telepon_edit.numeric' => 'Nomor telepon wajib menggunakan angka.',
        ];

        if($request->input('email_edit') != $user->email){
            $rules['email_edit'] = 'required|email|unique:users';
            $message['email_edit.required'] = 'Email wajib diisi.';
            $message['email_edit.email'] = 'Email harus berupa email yang valid.';
            $message['email_edit.unique'] = 'Email harus berbeda dengan email yang sudah di tambahkan.';
        }
        if($request->file('image') != null){
            $rules['image_edit'] = 'image|mimes:jpeg,png,jpg';
            $message['image_edit.image'] = 'Image harus berupa gambar';
            $message['image_edit.mimes'] = 'Ekstensi harus jpeg, png, atau jpg';
        }

        $validate = $request->validate($rules, $message);

        $user->name = $request->input('nama_edit');
        $user->email = $request->input('email_edit');
        $user->gender = $request->input('jk_edit');
        $user->phone = $request->input('telepon_edit');

        // menaruh image di public
        if ($request->file('image_edit') != null) {
            $user->image =  $request->file('image_edit')->store('user', 'public');
        }else {
            $user->image = null;
        }

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
