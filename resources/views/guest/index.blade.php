@extends('layouts.app')
@section('content')
@include('partials.modal-add-guest')

<div class="container mt-5">
  @include('partials.alert')
  <div class="row">
    <div class="col">
      <span class="d-flex justify-content-start">
        <h1>Data Tamu</h1>
      </span>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambahTamuModal">
        Tambah Tamu
      </button>
    </div>
    <div class="col">
      <span class="d-flex justify-content-end">
        <form class="d-flex" method="get" action="/guest/find">
          @if ($guests == null)
            <fieldset disabled>
          @endif
          <input class="form-control-sm me-2 border-info" type="text" placeholder="Cari tamu" aria-label="Search" name="cari">
          <button class="btn btn-outline-info btn-sm" type="submit">Cari</button>
          @if ($guests == null)
            </fieldset>
          @endif
        </form>
      </span>
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
        @if ($guests != null)
            
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
        @else
        <tr>
          <td colspan="6" class="text-center">Belum ada data tamu yang melakukan checkin dan checkout</td>
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