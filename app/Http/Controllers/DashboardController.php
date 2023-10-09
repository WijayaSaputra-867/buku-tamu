<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class DashboardController extends Controller
{
    public function index() {
        if(!Guest::all()->isEmpty()){
            $guests = Guest::latest()->orderBy('check_in', 'desc')->paginate(10);
        }else{
            $guests = null;
        }
        return view('welcome', [
            'link' => 'welcome',
            'guests' => $guests,
        ]);
    }

    public function find(Request $request) {
        $key = $request->input('cari');
        $guests = Guest::where('nama_tamu', 'like', '%' . $key . '%')->orWhere('asal_instansi',  'like', '%' . $key . '%')->latest()->orderBy('check_in', 'desc')->paginate(10);
        return view('welcome', [
            'link' => 'guest',
            'guests' => $guests,
        ]);
    }
}
