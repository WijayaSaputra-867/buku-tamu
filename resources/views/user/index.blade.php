@extends('layouts.main')
@section('title','Halaman | Petugas')
@section('container')
<table class="table table-hover border-primary">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Petugas</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)    
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
          <a href="/user/update/{{ $user->id }}" class="btn btn-sm btn-outline-warning">Ubah</a>
          <a href="/user/delete/{{ $user->id }}" class="btn btn-sm btn-outline-danger">Hapus</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">
  {{ $users->links() }}
</div>
@endsection