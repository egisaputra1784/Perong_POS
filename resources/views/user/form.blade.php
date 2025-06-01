<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"></h1>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-md-offset-1 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-md-offset-1 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-2 col-md-offset-1 control-label">Konfirmasi Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required
                            data-match="#password">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
