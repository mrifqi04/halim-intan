@extends('master')

@section('content')
<div class="d-sm-flex align-items-center mb-5">
    @if (Route::is('dashboard'))
    <h1 class="h3 mb-0 text-gray-800">Halaman Utama</h1>
    @else
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    @endif
</div>

@if (Route::is('dashboard'))
<div class="container mt-5">
    <table class="table">
        <tr class="mb-3">
            <td>Nama</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr class="mb-3">
            <td>Email</td>
            <td>:</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr class="mb-3">
            <td>Rank</td>
            <td>:</td>
            <td>{{ Auth::user()->rank }}</td>
        </tr>
        <tr class="mb-3">
            <td>No HP</td>
            <td>:</td>
            <td>{{ Auth::user()->no_handphone }}</td>
        </tr>
        <tr class="mb-3">
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ Auth::user()->jabatan }}</td>
        </tr>
    </table>
</div>
@else
<div class="container bg-light">
    @include('profile.edit')
</div>
@endif

@endsection
