@extends('layouts.app')
@section('title','Halaman | Petugas')
@section('content')
@include('partials.modal-add-user')

<div class="container mt-5">
  @include('partials.alert')
  <div class="">
    <div class="d-flex justify-content-start">
      <h1>Data Petugas</h1>
    </div>
    <div class="d-flex justify-content-end my-3 mx-3">
        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPetugasModal">
          Tambah Petugas
        </button>
    </div>
  </div>
  <div>
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
              <a href="/petugas/details/{{ $user->id }}" class="btn btn-sm btn-outline-primary">Detail</a>
              <button class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahPetugasModal">
                Ubah
              </button>
              @include('partials.modal-edit-user')
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4">
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection