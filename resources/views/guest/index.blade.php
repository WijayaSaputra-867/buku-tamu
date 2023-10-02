@extends('layouts.main')
@section('title','Halaman | Tamu')
@section('container')
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
          <a href="/guest/checkout/{{ $guest->id }}" class="btn btn-sm btn-outline-primary">Check Out</a>
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
@endsection