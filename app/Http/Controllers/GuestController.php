<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Institution;
use App\Exports\GuestExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreGuestRequest;



class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::with('institution')->latest()->paginate(10);
        return view('guests.index', compact('guests'));
    }


    public function create()
    {
        $institutions = Institution::all();
        return view('guests.create', compact('institutions'));
    }



    public function store(StoreGuestRequest $request)
    {
        $data = $request->validated();

        if (request()->hasFile('photo')) {
            $path = request()->file('photo')->store('guests', 'public');
            $data['photo'] = $path;
        }

        $data['user_id'] = Auth::user()->id;
        $data['check_in_at'] = now();

        Guest::create($data);

        return redirect()
            ->route('guests.index')
            ->with('success', 'Tamu berhasil check-in!');
    }


    public function show(Guest $guest)
    {
        return view('guests.show', compact('guest'));
    }


    public function checkOut(Guest $guest)
    {
        if ($guest->check_out_at) {
            return back()->with('info', 'Tamu sudah checkout sebelumnya.');
        }

        $guest->update(['check_out_at' => now()]);
        return back()->with('success', 'Tamu berhasil checkout.');
    }


    public function destroy(Guest $guest)
    {
        $guest->delete();
        return back()->with('success', 'Data tamu dihapus.');
    }


    public function exportExcel()
    {
        $fileName = 'buku_tamu_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new GuestExport, $fileName);
    }
}
