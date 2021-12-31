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
            <th scope="col">Pekerjaan</th>                                              
            <th scope="col">
                <button class="btn btn-success rounded" data-toggle="modal"
                    data-target="#tambah-jadwal">Tambah</button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $key => $service)           
        <tr class="data-row text-dark" style="background-color: {{ ($key + 1) % 2 == 0 ?  '#b4f2cd' : ''}}">                
            <td class="align-middle">{{ $key + 1 }}</td>
            <td class="align-middle no_polisi">{{ $service->no_polisi }}</td>
            <td class="align-middle model">{{ $service->model }}</td>
            <td class="align-middle word-break no_chassis">{{ $service->no_chassis }}</td>
            <td class="align-middle word-break nama_customer">{{ $service->nama_customer }}</td>
            <td class="align-middle word-break no_telp">{{ $service->no_telp }}</td>
            <td class="align-middle word-break alamat">{{ $service->alamat }}</td>
            <td class="align-middle word-break pekerjaan">{{ $service->pekerjaan }}</td>
            <td class="align-middle">
              <button type="button" class="btn btn-primary btn-sm" id="edit-item" data-item-id="{{ $service->id }}">edit</button>
              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirm{{$service->id}}">Hapus</button>
              <div class="modal fade" id="deleteConfirm{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            'url' => ['/services', $service->id],
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