@extends('master')

@section('content')
<div class="d-sm-flex align-items-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Data Validasi</h1>
</div>

<div class="container">
    <div class="text-right">
        <button class="btn btn-success rounded" data-toggle="modal" data-target="#tambah-jadwal">Tambah</button>
    </div>

    <div class="container-fluid mt-5">
        <table class="table p-0" id="table_users">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr class="data-row text-dark">
                    <td class="align-middle">{{ $key + 1 }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->role->role_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('user.form')


@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#table_users').DataTable();
        })
</script>
@endsection