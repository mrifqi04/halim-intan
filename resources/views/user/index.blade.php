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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr class="data-row text-dark">
                    <td class="align-middle">{{ $key + 1 }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->role->role_name }}</td>
                    @if (Auth::user()->role_id == 1 && $user->id != 1)
                    <td class="align-middle">
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <button class="btn btn-danger" onclick="onDelete({{ $user->id }})">delete</button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function onDelete(id) {
        swal.fire({
            title: "Hapus",
            text: `Apa anda yakin ingin menghapus user ini?`,
            type: "error",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,            
            confirmButtonText: "Yes, delete it!",
        })
        .then(function(isConfirm) {                                
                if (isConfirm.value == true) {                                                        
                        $.ajax({
                            url: `/users/${id}`,              
                            method: 'DELETE',                                                 
                            dataType: 'json',
                            cache: false,                                                                      
                        }).then(
                            location.reload()
                        )                                 
                }
           })
    }
</script>

@include('user.form')


@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#table_users').DataTable();
        })
</script>
@endsection