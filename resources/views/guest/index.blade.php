@extends('layouts.app')
@section('content')
@include('partials.modal-add-guest')

<div class="container mt-5">
  @include('partials.alert')
  <div class="">
    <div class="d-flex justify-content-start">
      <h1>Data Tamu</h1>
    </div>
    <div class="d-flex justify-content-end my-3 mx-3">
        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambahTamuModal">
          Tambah Tamu
        </button>
    </div>
  </div>
  <div>
    <table class="table table-hover border-primary">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Tamu</th>
          <th scope="col">Status</th>
          <th scope="col">Check In</th>
          <th scope="col">Check Out</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($guests as $guest)    
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $guest->nama_tamu }}</td>
          <td>{{ ($guest->check_out === null) ? 'Sedang Berkunjung' : 'Kunjungan Selesai'}}</td>
          <td>{{ $guest->check_in }}</td>
          <td>
            @if ($guest->check_out === null)
            <a href="/guest/checkout/{{ $guest->id }}" class="btn btn-outline-primary btn-sm">Check Out</a>
            @else
            {{ $guest->check_out }}
            @endif
          </td>
          <td>
            <a href="/guest/details/{{ $guest->id }}" class="btn btn-sm btn-outline-primary">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4">
      {{ $guests->links() }}
    </div>
    </div>
  </div>
@endsection