<form action="/petugas/update/{{ $user->id }}" method="post">
    @csrf
    <div class="modal fade" id="ubahPetugasModal" tabindex="-1" aria-labelledby="ubahPetugasModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahPetugasModal">Ubah Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputname" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control @error('nama_edit') is-invalid @enderror" id="inputname" name="nama_edit" value="{{ old('nama_edit', $user->name) }}">
                            @error('nama_edit')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email_edit') is-invalid @enderror" id="inputemail_edit" name="email_edit" value="{{ old('email_edit', $user->email) }}">
                            @error('email_edit')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            @error('jk_edit')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-check">
                                <input class="form-check-input @error('jk_edit') is-invalid @enderror" type="radio" name="jk_edit" id="l" value="Laki-laki" @if($user->gender == 'Laki-laki') checked @endif>
                                <label class="form-check-label" for="l">
                                  Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jk_edit') is-invalid @enderror" type="radio" name="jk_edit" id="p" value="Perempuan" @if($user->gender == 'Perempuan') checked @endif>
                                <label class="form-check-label" for="p">
                                  Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputTelepon" class="form-label">Telepon</label>
                            <input type="tel" class="form-control @error('telepon_edit') is-invalid @enderror" id="inputTelepon" name="telepon_edit" value="{{ old('telepon_edit', $user->phone) }}">
                            @error('telepon_edit')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Petugas</label>
                            <input class="form-control @error('image_edit') is-invalid @enderror" type="file" id="formFile" name="image_edit">
                            @error('image_edit')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>