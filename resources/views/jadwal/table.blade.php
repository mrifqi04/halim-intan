<table class="table p-0" id="table_jadwals">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Polisi</th>
            <th scope="col">Model</th>
            <th scope="col">No Chassis</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">No Telp</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jadwal FUS</th>
            <th scope="col">
                <button class="btn btn-success rounded" data-toggle="modal"
                    data-target="#tambah-jadwal">Tambah</button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwals as $key => $jadwal)
        <tr class="data-row text-dark" style="background-color: {{ ($key + 1) % 2 == 0 ?  '#b4f2cd' : ''}}">
            <td class="align-middle">{{ $key + 1 }}</td>
            <td class="align-middle no_polisi">{{ $jadwal->no_polisi }}</td>
            <td class="align-middle model">{{ $jadwal->model }}</td>
            <td class="align-middle word-break no_chassis">{{ $jadwal->no_chassis }}</td>
            <td class="align-middle word-break nama_customer">{{ $jadwal->nama_customer }}</td>
            <td class="align-middle word-break no_telp">{{ $jadwal->no_telp }}</td>
            <td class="align-middle word-break alamat">{{ $jadwal->alamat }}</td>
            <td class="align-middle word-break jadwal_fus">{{ $jadwal->jadwal_fus }}</td>
            <td class="align-middle">
                <button type="button" class="btn btn-primary btn-sm" id="edit-item"
                    data-item-id="{{ $jadwal->id }}">edit</button>
                <button class="btn btn-danger btn-sm" onclick="onDelete({{ $jadwal->id }})">Hapus</button>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table_jadwals').DataTable();
    })

    function onDelete(id) {
        swal.fire({
            title: "Hapus",
            text: `Apa anda yakin ingin menghapus item ini?`,
            type: "error",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,            
            confirmButtonText: "Yes, delete it!",
        })
        .then(function(isConfirm) {                                
                if (isConfirm.value == true) {                                                        
                        $.ajax({
                            url: `/jadwals/${id}`,              
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