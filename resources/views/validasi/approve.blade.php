<div class="modal fade" id="approveConfirm{{$fus->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve</h4>
            </div>
            <div class="modal-body">
                Approve item ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{-- {!! Form::open([
                'method' => 'PATCH',
                'url' => ['/fus/approve', $fus->id],
                'style' => 'display:inline'
                ]) !!}
                {!! Form::button('Approve', array(
                'type' => 'submit',
                'class' => 'btn btn-primary btn-sm',
                'title' => 'Confirm Delete'
                )) !!}
                {!! Form::close() !!} --}}
                <button class="btn btn-primary btn-sm">Approve</button>
            </div>
        </div>
    </div>
</div>
