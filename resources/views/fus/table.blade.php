<table class="table p-0" id="table_fus">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Polisi</th>
            <th scope="col">Model</th>
            <th scope="col">No Chassis</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">No Telp</th>
            <th scope="col">Alamat</th>
            <th scope="col">Catatan</th>
            <th scope="col">
                <button class="btn btn-success rounded" data-toggle="modal" data-target="#tambah-jadwal">Tambah</button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fuses as $key => $fus)
        <tr class="data-row text-dark" style="background-color: {{ ($key + 1) % 2 == 0 ?  '#b4f2cd' : ''}}">
            <td class="align-middle">{{ $key + 1 }}</td>
            <td class="align-middle no_polisi">{{ $fus->no_polisi }}</td>
            <td class="align-middle model">{{ $fus->model }}</td>
            <td class="align-middle word-break no_chassis">{{ $fus->no_chassis }}</td>
            <td class="align-middle word-break nama_customer">{{ $fus->nama_customer }}</td>
            <td class="align-middle word-break no_telp">{{ $fus->no_telp }}</td>
            <td class="align-middle word-break alamat">{{ $fus->alamat }}</td>
            <td class="align-middle word-break catatan">{{ $fus->catatan }}</td>
            <td class="align-middle">
                <button type="button" class="btn btn-primary btn-sm" id="edit-item"
                    data-item-id="{{ $fus->id }}">edit</button>
                <button class="btn btn-danger btn-sm" onclick="onDelete({{ $fus->id }})">Hapus</button>
                {{-- <div class="modal fade" id="deleteConfirm{{$fus->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Hapus</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus item ini ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {!! Form::open([
                                'method' => 'DELETE',
                                'url' => ['/fuses', $fus->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Confirm Delete'
                                )) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div> --}}
                @if ($fus->is_ajukan == 0)
                <button class="btn btn-warning btn-sm" onclick="onAjukan({{ $fus->id }})">Ajukan</button>
                {{-- <div class="modal fade" id="ajukanConfirm{{$fus->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Ajukan</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin mengajukan item ini ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {!! Form::open([
                                'method' => 'PATCH',
                                'url' => ['/fus/ajukan', $fus->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('Ajukan', array(
                                'type' => 'submit',
                                'class' => 'btn btn-warning btn-sm',
                                'title' => 'Confirm Delete'
                                )) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table_fus').DataTable();
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
                            url: `/fuses/${id}`,              
                            method: 'DELETE',                                                 
                            dataType: 'json',
                            cache: false,                                                                      
                        }).then(
                            location.reload()
                        )                                 
                }
           })
    }

    function onAjukan(id) {
        swal.fire({
            title: "Ajukan",
            text: `Apa anda yakin ingin mengajukan item ini?`,
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,            
            confirmButtonText: "Ya, Ajukan!",
        })
        .then(function(isConfirm) {                                
                if (isConfirm.value == true) {                                                        
                        $.ajax({
                            url: `/fus/ajukan/${id}`,              
                            method: 'PATCH',                                                 
                            dataType: 'json',
                            cache: false,                                                                      
                        }).then(
                            location.reload()
                        )                                 
                }
           })
    }
</script>