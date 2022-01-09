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
        data-date-format="dd-mm-yyyy">
</div>

<div class="container-fluid mt-5" id="validasi_table">
    
</div>

@endsection

@section('script')
<script>
    $(document).ready( function () {    

        validasi_filter()
    });

function validasi_filter()
    {
        const date_validasi = $('#date_validasi').val()                
        const role_user = '{{ Auth::user()->role_id }}'
        
        $.ajax({
            url: '/validasi',            
            data: {
                date_validasi,
                role_user
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