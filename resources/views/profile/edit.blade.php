<form method="post" action="{{ route('profile.update', Auth::user()->id ) }}">
    {{ method_field('PATCH') }}    
    @csrf
    <div class="form-group">
        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Name" value="{{ Auth::user()->name }}">
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Email" value="{{ Auth::user()->email }}">
    </div>
    <div class="form-group">
        <input type="text" name="rank" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="rank" value="{{ Auth::user()->rank }}">
    </div>
    <div class="form-group">
        <input type="text" name="no_handphone" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="No Handphone" value="{{ Auth::user()->no_handphone }}">
    </div>
    <div class="form-group">
        <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Jabatan" value="{{ Auth::user()->jabatan }}">
    </div>
    <div class="modal-footer">
        <a class="btn btn-warning" href="/ubah-password">Ubah Password</a>                 
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>