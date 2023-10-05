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
}
