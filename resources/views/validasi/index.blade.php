@extends('master')

@section('content')
<div class="d-sm-flex align-items-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Data Validasi</h1>
</div>

<div class="container-fluid w-25 float-left mb-5">
    <?php
        $date_to = date('Y-m-d');
        $date_from = date('Y-m-d', strtotime("-2 weeks", strtotime($date_to)));        
    ?>
    <input type="date" class="form-control" name="start" id="date_validasi" value="{{ $date_from }}"
        data-date-format="dd-mm-yyyy" onchange="validasi_filter()">
</div>

<div class="container-fluid mt-5" id="validasi_table">
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
                    <button class="btn btn-success rounded">Download</button>
                </th>
            </tr>
        </thead>
        <tbody>            
            <tr class="data-row text-dark">
                <td class="align-middle">asd</td>                               
            </tr>            
        </tbody>
    </table>
</div>

@endsection

@section('script')
<script>
    $(document).ready( function () {
    // $('#table_validasi').DataTable();

    validasi_filter()
});

function validasi_filter()
    {
        const date_validasi = $('#date_validasi').val()                
        
        $.ajax({
            url: '/validasi',            
            data: {
                date_validasi
            },
            dataType: 'json',
            cache: false,
            success: function(res) {
                $('#validasi_table').html(res.validasi)                               
            },
            beforeSend: function(res){
			$('#validasi_table').html('<p align="center">Loading...</p>');
		}
        })
    }


</script>
@endsection