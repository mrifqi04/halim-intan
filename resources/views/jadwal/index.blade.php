@extends('master')

@section('content')
<div class="d-sm-flex align-items-center mb-5">
    <h1 class="h3 mb-0 text-gray-800">Data Jadwal</h1>
</div>

<div class="container-fluid mt-5">
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
                  <button type="button" class="btn btn-primary btn-sm" id="edit-item" data-item-id="{{ $jadwal->id }}">edit</button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirm{{$jadwal->id}}">Hapus</button>
                  <div class="modal fade" id="deleteConfirm{{$jadwal->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Hapus</h4>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus item ini ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Close</button>
                                {!! Form::open([
                                'method' => 'DELETE',
                                'url' => ['/jadwals', $jadwal->id],
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
                </div>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('jadwal.form')

@include('jadwal.edit')

@endsection

@section('script')
<script>
    $(document).ready( function () {
    $('#table_jadwals').DataTable();

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
    var jadwal_fus = row.children(".jadwal_fus").text();       

    // fill the data in the input fields
    $("#edit_no_polisi").val(no_polisi);
    $("#edit_model").val(model);
    $("#edit_no_chassis").val(no_chassis);
    $("#edit_nama_customer").val(nama_customer);
    $("#edit_no_telp").val(no_telp);
    $("#edit_alamat").val(alamat);
    $("#edit_jadwal_fus").val(jadwal_fus);

    $("#edit_form_action").attr('action', `/jadwals/${id}`);
  })

  // on modal hide
  $('#edit-jadwal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
} );


</script>
@endsection