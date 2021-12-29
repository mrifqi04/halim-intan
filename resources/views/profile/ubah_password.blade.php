@extends('master')

@section('content')
<div class="mb-5 container">    
    <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>   
</div>

<div class="container shadow p-4 rounded" style="background-color: #ffffff">
    <form method="post" action="/ubah-password">
        @csrf
        <div class="form-group">
            <label for="form-label">Password baru</label>
            <input type="password" name="password" class="form-control"
                aria-describedby="emailHelp" placeholder="******">
        </div>
        <div class="form-group">
            <label for="form-label">Ulangi Password baru</label>
            <input type="password" name="password_confirmation" class="form-control"
                aria-describedby="emailHelp" placeholder="******">
        </div>
        <div class="text-right" style="margin-top: 5%">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

@endsection
