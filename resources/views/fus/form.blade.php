<div class="modal fade" id="tambah-jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Tambah Data FUS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('fuses.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="no_polisi" class="form-control" aria-describedby="emailHelp"
                            placeholder="No Polisi">
                    </div>
                    <div class="form-group">
                        <input type="text" name="model" class="form-control" aria-describedby="emailHelp"
                            placeholder="Model">
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_chassis" class="form-control" aria-describedby="emailHelp"
                            placeholder="No Chassis">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_customer" class="form-control" aria-describedby="emailHelp"
                            placeholder="Nama Customer">
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_telp" class="form-control" aria-describedby="emailHelp"
                            placeholder="Nomor telp">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="alamat" class="form-control" aria-describedby="emailHelp"
                            placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">                        
                        <textarea type="text" name="catatan" class="form-control"
                           placeholder="catatan" aria-describedby="emailHelp"></textarea>
                    </div>
                    <div class="modal-footer">                        
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>