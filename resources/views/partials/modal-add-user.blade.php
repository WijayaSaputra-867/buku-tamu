<form action="/petugas/create" method="post">
    @csrf
    <div class="modal fade" id="tambahPetugasModal" tabindex="-1" aria-labelledby="tambahPetugasModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahPetugasModal">Tambah Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputname" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputname" name="nama" value="{{ old('nama') }}">
                            @error('nama')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                            @error('email')     
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
                            <label for="inputTelepon" class="form-label">Telepon</label>
                            <input type="tel" class="form-control @error('telepon') is-invalid @enderror" id="inputTelepon" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Petugas</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                            @error('image')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" value="{{ old('password') }}">
                            @error('password')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordKonfirmasi" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control " id="inputPasswordKonfirmasi" name="password_confirmation">
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