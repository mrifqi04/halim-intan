<div class="modal fade" id="edit-jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Ubah Data Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_form_action">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="form-group">
                        <input type="text" name="no_polisi" class="form-control" id="edit_no_polisi"
                            aria-describedby="emailHelp" placeholder="No Polisi">
                    </div>
                    <div class="form-group">
                        <input type="text" name="model" class="form-control" id="edit_model"
                            aria-describedby="emailHelp" placeholder="Model">
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_chassis" class="form-control" id="edit_no_chassis"
                            aria-describedby="emailHelp" placeholder="No Chassis">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_customer" class="form-control" id="edit_nama_customer"
                            aria-describedby="emailHelp" placeholder="Nama Customer">
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_telp" class="form-control" id="edit_no_telp"
                            aria-describedby="emailHelp" placeholder="Nomor telp">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="alamat" class="form-control" id="edit_alamat"
                            aria-describedby="emailHelp" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jadwal FUS</label>
                        <input type="date" name="jadwal_fus" class="form-control" id="edit_jadwal_fus"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="modal-footer">                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>