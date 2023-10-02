<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
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
        $guests = Guest::latest()->orderBy('check_in', 'desc')->paginate(10);
        return view('guest.index', [
            'link' => 'guest',
            'guests' => $guests,
        ]);
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'instansi' => 'required|string|max:255',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'keperluan' => 'required|string|max:255',
            'bertemu' => 'required|string|max:255',
            'telepon' => 'required|numeric',
        ], 
        [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'instansi.required' => 'Asal instansi wajib diisi.',
            'instansi.string' => 'Asal instansi harus berupa teks.',
            'instansi.max' => 'Asal instansi tidak boleh lebih dari 255 karakter.',
            'jk.required' => 'Pilih jenis kelamin.',
            'jk.in' => 'Pilih salah satu jenis kelamin yang tersedia.',
            'keperluan.required' => 'Keperluan wajib diisi.',
            'keperluan.string' => 'Keperluan harus berupa teks.',
            'keperluan.max' => 'Keperluan tidak boleh lebih dari 255 karakter.',
            'bertemu.required' => 'Bertemu wajib diisi.',
            'bertemu.string' => 'Bertemu harus berupa teks.',
            'bertemu.max' => 'Bertemu tidak boleh lebih dari 255 karakter.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.numeric' => 'Nomor telepon wajib menggunakan angka.',
        ]);
        
        $tamu = new Guest;
        $tamu->user_checkin = auth()->id();
        $tamu->nama_tamu = $request->input('nama');
        $tamu->keperluan_tamu = $request->input('keperluan');
        $tamu->bertemu = $request->input('bertemu');
        $tamu->jk = $request->input('jk');
        $tamu->asal_instansi = $request->input('instansi');
        $tamu->telepon = $request->input('telepon');
        $tamu->check_in = now();
        
        if ($tamu->save()) {
            return redirect()->back()->with('success', 'Data tamu telah ditambahkan');
        }else {
            return redirect()->back()->with('danger', 'Data tamu gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        
        return view('guest.details',[
            'link' => 'guest',
            'guest' => $guest
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Guest $guest)
    {
        $id_user = auth()->id();
        $guest->check_out = now();
        $guest->user_checkout = $id_user;
        if ($guest->save()) {
            return redirect()->back()->with('success', 'Check out berhasil');
        }else {
            return redirect()->back()->with('danger', 'Check ouut gagal');
        }
    }
}
