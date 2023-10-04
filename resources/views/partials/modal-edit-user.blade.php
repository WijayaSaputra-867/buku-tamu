<form action="/petugas/update/{{ $user->id }}" method="post">
    @csrf
    <div class="modal fade" id="ubahPetugasModal" tabindex="-1" aria-labelledby="ubahPetugasModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahPetugasModal">Tambah Tamu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputname" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputname" name="nama" value="{{ $user->name }}">
                            @error('nama')     
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ $user->email }}">
                            @error('email')     
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