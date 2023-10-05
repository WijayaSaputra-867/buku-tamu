@extends('layouts.app')
@section('content')
<div class="container mt-5">
  @include('partials.alert')
  <div class="row mb-5">
    <div class="col">   
        <h1 class="text-center mb-5">{{ $guest->nama_tamu }}</h1>
        <hr class="border-primary border-3">
        <hr class="border-primary border-2">
        <h2 class="mt-5 mx-auto">Asal Instansi : {{ $guest->asal_instansi }}</h2>
        <h3 class="mt-3">Jenis Kelamin : {{ $guest->jk }}</h3>
        <h3 class="mt-3">No Telepon : {{ $guest->telepon }}</h3>
    </div>
    <div class="col">
      @if ($guest->image != null)    
        <img src="{{ asset('storage/'. $guest->image) }}" alt="{{ $guest->nama_tamu }}" class="img-thumbnail rounded mx-auto d-block" style="max-width: 300px; max-height: 400px ;">
      @else  
        <img src="{{ asset('/img/person.png') }}" alt="{{ $guest->nama_tamu }}" class="img-thumbnail rounded mx-auto d-block" style="max-width: 300px; max-height: 400px;">
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col">
        <table class="table table-hover border-primary">
            <thead>
              <tr>
                <th scope="col">Keperluan Tamu</th>
                <th scope="col">Bertemu</th>
                <th scope="col">Status</th>
                <th scope="col">Petugas Check-In</th>
                <th scope="col">Petugas Check-out</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($visits as $visit)
              <tr>
                <td>{{ $visit->keperluan_tamu }}</td>
                <td>{{ $visit->bertemu }}</td>
                <td>{{ ($visit->check_out === null) ? 'Sedang Berkunjung' : 'Kunjungan Selesai'}}</td>
                <td>{{ $visit->checkIn->name }}</td>
                <td>{{ ($visit->check_out) === null ? '-' : $visit->checkOut->name }}</td>
                <td>{{ $visit->check_in }}</td>
                <td>
                  @if ($visit->check_out === null)
                  <a href="/guest/checkout/{{ $visit->id }}" class="btn btn-sm btn-outline-primary">Check Out</a>
                  @else
                  {{ $visit->check_out }}
                  @endif
                </td>
              </tr> 
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>

@endsection