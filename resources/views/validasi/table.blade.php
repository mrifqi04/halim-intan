@php
$role = Auth::user()->role_id;
@endphp
<table class="table p-0" id="table_validasi">
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
                {!! Form::open([
                'before' => 'csrf',
                'url' => 'export-validasi',
                'method' => 'post'
                ]) !!}
                <input type="hidden" name="date_validasi" value="{{ $date_validasi }}">
                <input type="hidden" name="final" value="{{ $final }}">
                <button type="submit" class="btn btn-success rounded">Download</button>
                {!! Form::close() !!}
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
            @if ($role == 3)
            <td class="align-middle">
                @if ($fus->status_approve == null)
                <button class="btn btn-primary btn-sm" onclick="onApprove({{ $fus->id }})">Approve</button>

                <button class="btn btn-danger btn-sm" onclick="onReject({{ $fus->id }})">Reject</button>
                @else
                <span class="badge badge-{{ $fus->status_approve == 'Approved' ? 'success' : 'danger'}}">{{
                    $fus->status_approve }}</span>
                @endif
            </td>
            <div id="approve">
                @include('validasi.approve')
            </div>
            @else
            <td class="align-middle word-break"></td>
            @endif
        </tr>
        
        @endforeach
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(document).ready(function() {
        $('#table_validasi').DataTable({
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 7, 8 ] }, 
                { "bSearchable": false, "aTargets": [ 7, 8 ] }
            ]
        });    
    })

    function onApprove(id) {
        swal.fire({
            title: "Apa anda yakin?",
            text: `approve item ini.`,
            type: "success",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,            
            confirmButtonText: "Yes, approve it!",
        })
        .then(function(isConfirm) {                                
                if (isConfirm.value == true) {                                                        
                        $.ajax({
                            url: `/fus/approve/${id}`,              
                            method: 'post',                                                 
                            dataType: 'json',
                            cache: false,                                                                      
                        }).then(
                            location.reload()
                        )                                 
                }
           })
    }

    function onReject(id) {
        swal.fire({
            title: "Apa anda yakin?",
            text: `reject item ini.`,
            type: "success",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,            
            confirmButtonText: "Yes, reject it!",
        })
        .then(function(isConfirm) {                                
                if (isConfirm.value == true) {                                                        
                        $.ajax({
                            url: `/fus/reject/${id}`,              
                            method: 'post',                                                 
                            dataType: 'json',
                            cache: false,                                                                      
                        }).then(
                            location.reload()
                        )                                 
                }
           })
    }

</script>