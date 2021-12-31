@extends('master')

@section('content')
<div class="d-sm-flex align-items-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Data Service</h1>
</div>

<div class="container-fluid w-25 float-left mb-5">
    <?php
        $date_to = date('Y-m-d');
        $date_from = date('Y-m-d', strtotime("-2 weeks", strtotime($date_to)));        
    ?>
    <input type="date" class="form-control" name="start" id="date_service" value="{{ $date_from }}"
        data-date-format="dd-mm-yyyy" onchange="service_filter()">
</div>

<div class="container-fluid mt-5" id="service_table">
    <table class="table p-0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Polisi</th>
                <th scope="col">Model</th>
                <th scope="col">No Chassis</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">No Telp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">
                    <button class="btn btn-success rounded" data-toggle="modal"
                        data-target="#tambah-jadwal">Tambah</button>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="data-row text-dark">
                <td class="align-middle text-center" colspan="9">No Data</td>                
            </tr>  
        </tbody>
    </table>
</div>

@include('service.form')

@include('service.edit')

@endsection

@section('script')
<script>
    $(document).ready( function () {

    service_filter()

    $(document).on('click', "#edit-item", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#edit-jadwal').modal(options)
  })

  // on modal show
  $('#edit-jadwal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var no_polisi = row.children(".no_polisi").text();
    var model = row.children(".model").text();   
    var no_chassis = row.children(".no_chassis").text();       
    var nama_customer = row.children(".nama_customer").text();       
    var no_telp = row.children(".no_telp").text();       
    var alamat = row.children(".alamat").text();       
    var pekerjaan = row.children(".pekerjaan").text();       

    // fill the data in the input fields
    $("#edit_no_polisi").val(no_polisi);
    $("#edit_model").val(model);
    $("#edit_no_chassis").val(no_chassis);
    $("#edit_nama_customer").val(nama_customer);
    $("#edit_no_telp").val(no_telp);
    $("#edit_alamat").val(alamat);
    $("#edit_pekerjaan").val(pekerjaan);

    $("#edit_form_action").attr('action', `/services/${id}`);
  })

  // on modal hide
  $('#edit-jadwal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
} );

function service_filter()
    {
        const date_service = $('#date_service').val()                
        
        $.ajax({
            url: '/table-services',            
            data: {
                date_service
            },
            dataType: 'json',
            cache: false,
            success: function(res) {
                $('#service_table').html(res.service)                
            },
            beforeSend: function(res){
			$('#service_table').html('<p align="center">Loading...</p>');
		}
        })
    }

</script>
@endsection