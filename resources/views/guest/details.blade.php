@extends('layouts.app')
@section('content')
<div class="container mt-5">
  @include('partials.alert')
  <div class="row mb-5">
    <div class="col">   
        <h3 class="text-center">{{ $guest->nama_tamu }}</h3>
        <hr class="border-primary border-3">
        <hr class="border-primary border-2">
        <h4 class="mt-3">Asal Instansi : {{ $guest->asal_instansi }}</h4>
        <h5 class="mt-3">Jenis Kelamin : {{ $guest->jk }}</h5>
        <h5 class="mt-3">No Telepon : {{ $guest->telepon }}</h5>
    </div>
    <div class="col">
        <img src="" alt="" class="img-thumbnail rounded mx-auto d-block">
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
              <tr>
                <td>{{ $guest->keperluan_tamu }}</td>
                <td>{{ $guest->bertemu }}</td>
                <td>{{ ($guest->check_out === null) ? 'Sedang Berkunjung' : 'Kunjungan Selesai'}}</td>
                <td>{{ $guest->checkIn->name }}</td>
                <td>{{ ($guest->check_out) === null ? '-' : $guest->checkOut->name }}</td>
                <td>{{ $guest->check_in }}</td>
                <td>
                  @if ($guest->check_out === null)
                  <a href="/guest/checkout/{{ $guest->id }}" class="btn btn-sm btn-outline-primary">Check Out</a>
                  @else
                  {{ $guest->check_out }}
                  @endif
                </td>
              </tr> 
            </tbody>
        </table>
    </div>
  </div>
</div>

@endsection