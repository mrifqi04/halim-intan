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
            <th scope="col">Catatan</th>
            <th scope="col">
                <button class="btn btn-success rounded">Download</button>
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
                @if ($fus->status_approve == null)
                <button class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#approveConfirm{{$fus->id}}">Approve</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#rejectConfirm{{$fus->id}}">Reject</button>
                    @else
                    <span class="badge badge-{{ $fus->status_approve == 'Approved' ? 'success' : 'danger'}}">{{ $fus->status_approve }}</span>
            </td>
            @endif
        </tr>

        <div class="modal fade" id="approveConfirm{{$fus->id}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Approve</h4>
                    </div>
                    <div class="modal-body">
                        Approve item ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::open([
                        'method' => 'PATCH',
                        'url' => ['/fus/approve', $fus->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('Approve', array(
                        'type' => 'submit',
                        'class' => 'btn btn-primary btn-sm',
                        'title' => 'Confirm Delete'
                        )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="rejectConfirm{{$fus->id}}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Approve</h4>
                    </div>
                    <div class="modal-body">
                        Reject item ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::open([
                        'method' => 'PATCH',
                        'url' => ['/fus/reject', $fus->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('Reject', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Confirm Delete'
                        )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>