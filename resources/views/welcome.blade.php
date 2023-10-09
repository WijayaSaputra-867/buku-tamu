@extends('layouts.app')
@section('content')
@include('partials.modal-add-guest')

<div class="container mt-5">
  <div class="">
    <div class="d-flex justify-content-start">
      <h1>Data Tamu</h1>
    </div>
    <div class="d-flex justify-content-end my-3 mx-3">
      <form class="d-flex" method="post" action="/find">
        @csrf
        <input class="form-control-sm me-2 border-info" type="text" placeholder="Cari tamu" aria-label="Search" name="cari">
        <button class="btn btn-outline-info btn-sm" type="submit">Cari</button>
      </form>
    </div>
  </div>
  <div>
    <table class="table table-hover border-primary">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Tamu</th>
          <th scope="col">Asal Instansi</th>
          <th scope="col">Keperluan Tamu</th>
          <th scope="col">Bertemu</th>
          <th scope="col">Check In</th>
          <th scope="col">Check Out</th>
        </tr>
      </thead>
      <tbody>
        @if ($guests != null)
            
        @foreach ($guests as $guest)    
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $guest->nama_tamu }}</td>
          <td>{{ $guest->asal_instansi }}</td>
          <td>{{ $guest->keperluan_tamu}}</td>
          <td>{{ $guest->bertemu }}</td>
          <td>{{ $guest->check_in }}</td>
          <td>
            @if ($guest->check_out === null)
                Sedang berkunjung
            @else
            {{ $guest->check_out }}
            @endif
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="7" class="text-center">Belum ada data tamu yang melakukan checkin dan checkout</td>
        </tr>
        @endif
      </tbody>
    </table>
    @if ($guests != null)     
      <div class="mt-4">
        {{ $guests->links() }}
      </div>
    @endif
    </div>
  </div>
@endsection