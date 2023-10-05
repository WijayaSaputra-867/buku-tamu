<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Visit;

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
        if(!Guest::all()->isEmpty()){
            $guests = Guest::latest()->orderBy('check_in', 'desc')->paginate(10);
        }else{
            $guests = null;
        }
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
        // return $request->file('image')->store('guest', 'public');
        // melakukan validasi pengecekan apakah data sesuai atau tidak
        $request->validate([
            'nama' => 'required|string|max:50',
            'instansi' => 'required|string|max:255',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'keperluan' => 'required|string|max:255',
            'bertemu' => 'required|string|max:255',
            'telepon' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg',
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
            'image.image' => 'Image harus berupa gambar',
            'image.mimes' => 'Ekstensi harus jpeg, png, atau jpg'
        ]);

        // membuat kode unik untuk kunjungan
        $unique_code = md5($request->input('nama') . $request->input('instansi'));
        $unique_code = substr($unique_code, 0, 8);
        
        // inisialisasi model Guest sebagai objek tamu
        $tamu = new Guest;
        $tamu->user_checkin = auth()->id();
        $tamu->nama_tamu = $request->input('nama');
        $tamu->keperluan_tamu = $request->input('keperluan');
        $tamu->bertemu = $request->input('bertemu');
        $tamu->jk = $request->input('jk');
        $tamu->asal_instansi = $request->input('instansi');
        $tamu->telepon = $request->input('telepon');
        $tamu->kode_kunjungan = $unique_code;
        $tamu->check_in = now();

        // menaruh image di public
        if ($request->file('image') != null) {
           $tamu->image =  $request->file('image')->store('guest', 'public');
        }else {
            $tamu->image = null;
        }
        
        // cek apakah kunjungan ada atau tidak dalam database
        if (Visit::where('kode_kunjungan', $unique_code)->first()) {
            $kunjungan = Visit::where('kode_kunjungan', $unique_code)->first();
            $kunjungan->total_kunjungan = $kunjungan->total_kunjungan + 1;
            $kunjungan->save();
        }else{
            $kunjungan = new Visit;
            $kunjungan->kode_kunjungan = $unique_code;
            $kunjungan->total_kunjungan = 1;
            $kunjungan->save();
        }

        // cek apakah data tamu dan data kunjungan berhasil disimpan
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
        $visits = Visit::where('kode_kunjungan', $guest->kode_kunjungan)->first();
        return view('guest.details',[
            'link' => 'guest',
            'guest' => $guest,
            'visits' => $visits->kunjungan
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
