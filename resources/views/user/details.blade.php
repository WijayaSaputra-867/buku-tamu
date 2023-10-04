{{-- @dd($checkout) --}}
@extends('layouts.app')
@section('content')
<div class="container mt-5">
  @include('partials.alert')
  <div class="row mb-5">
    <div class="col">   
        <h3 class="text-center">{{ $user->name }}</h3>
        <hr class="border-primary border-3">
        <hr class="border-primary border-2">
        <h4 class="mt-3">E-mail : {{ $user->email }}</h4>
        <h5 class="mt-3">Jenis Kelamin : {{ $user->gender }}</h5>
        <h5 class="mt-3">No Telepon : {{ $user->phone }}</h5>
    </div>
    <div class="col">
        <img src="" alt="" class="img-thumbnail rounded mx-auto d-block">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div>
        <h3>Data Checkin</h3>
      </div>
      <div>
        <table class="table table-hover border-primary">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tamu</th>
                <th scope="col">Asal Instansi</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Bertemu</th>
                <th scope="col">Check-In</th>
                <th scope="col">Check-Out</th>
              </tr>
            </thead>
            <tbody>
              @if ($checkin != null)    
              @foreach ($checkin as $user_checkin) 
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user_checkin->nama_tamu }}</td>
                <td>{{ $user_checkin->asal_instansi }}</td>
                <td>{{ $user_checkin->keperluan_tamu }}</td>
                <td>{{ $user_checkin->bertemu }}</td>
                <td>{{ $user_checkin->check_in }}</td>
                <td>
                  @if ($user_checkin->check_out === null)
                    <a href="/guest/checkout/{{ $user_checkin->id }}" class="btn btn-sm btn-outline-primary">Check Out</a>
                  @else
                    {{ $user_checkin->check_out }}
                  @endif
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="7" class="text-center">Belum ada tamu yang checkin melalui petugas ini</td>
              </tr>
              @endif
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div>
        <h3>Data Checkout</h3>
      </div>
      <div>
        <table class="table table-hover border-primary">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Tamu</th>
                <th scope="col">Asal Instansi</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Bertemu</th>
                <th scope="col">Check-In</th>
                <th scope="col">Check-Out</th>
              </tr>
            </thead>
            <tbody>
              @if ($checkout != null )      
              @foreach ($checkout as $user_checkout) 
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user_checkout->nama_tamu }}</td>
                <td>{{ $user_checkout->asal_instansi }}</td>
                <td>{{ $user_checkout->keperluan_tamu }}</td>
                <td>{{ $user_checkout->bertemu }}</td>
                <td>{{ $user_checkout->check_in }}</td>
                <td>{{ $user_checkout->check_out }}</td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="7" class="text-center">Belum ada tamu yang checkout melalui petugas ini</td>
              </tr>
              @endif
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection