<form action="/guest/create" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="tambahTamuModal" tabindex="-1" aria-labelledby="tambahTamuModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahTamuModal">Tambah Tamu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputname" class="form-label">Nama Tamu</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputname" name="nama">
                            @error('nama')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputInstansi" class="form-label">Asal Instansi</label>
                            <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="inputInstansi" name="instansi">
                            @error('instansi')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            @error('jk')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-check">
                                <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" id="l" value="Laki-laki">
                                <label class="form-check-label" for="l">
                                  Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" id="p" value="Perempuan">
                                <label class="form-check-label" for="p">
                                  Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputKeperluan" class="form-label">Keperluan Tamu</label>
                            <input type="text" class="form-control @error('keperluan') is-invalid @enderror" id="inputKeperluan" name="keperluan">
                            @error('keperluan')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputBertemu" class="form-label">Bertemu</label>
                            <input type="text" class="form-control @error('bertemu') is-invalid @enderror" id="inputBertemu" name="bertemu">
                            @error('bertemu')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputTelepon" class="form-label">Telepon</label>
                            <input type="tel" class="form-control @error('telepon') is-invalid @enderror" id="inputTelepon" name="telepon">
                            @error('telepon')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Tamu</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                            @error('image')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>