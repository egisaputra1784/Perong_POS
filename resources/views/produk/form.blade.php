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
                        <label for="nama_produk" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
                        <div class="col-md-9">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @if ($kategori ?? false)
                                    @foreach ($kategori as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merek" class="col-md-2 col-md-offset-1 control-label">Merek</label>
                        <div class="col-md-9">
                            <input type="text" name="merek" id="merek" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-md-2 col-md-offset-1 control-label">Harga Beli</label>
                        <div class="col-md-9">
                            <input type="number" name="harga_beli" id="harga_beli" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-md-2 col-md-offset-1 control-label">Harga Jual</label>
                        <div class="col-md-9">
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-md-2 col-md-offset-1 control-label">Diskon</label>
                        <div class="col-md-9">
                            <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-md-offset-1 control-label">Stock</label>
                        <div class="col-md-9">
                            <input type="number" name="stock" id="stock" class="form-control" value="0"
                                required>
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
