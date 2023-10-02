<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $guest->check_out = now();
        $guest->save();
        return redirect()->back();
    }
}
