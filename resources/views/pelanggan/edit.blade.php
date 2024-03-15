@include('layouts.header')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4" bis_skin_checked="1">
        <div class="card-header d-flex justify-content-between align-items-center" bis_skin_checked="1">
            <h5 class="mb-0">Edit Pelanggan</h5>
        </div>
        <div class="card-body" bis_skin_checked="1">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-fullname">Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}"
                        required>
                </div>
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-company">Alamat</label>
                    <textarea class="form-control" name="alamat" cols="20">{{ $pelanggan->alamat }}</textarea>
                </div>
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-company">Telepon</label>
                    <input type="number" class="form-control" name="telepon" value="{{ $pelanggan->telepon }}"
                        required>
                </div>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-warning"><i class="bx bx-arrow-to-left"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="bx bx-plus"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->

@include('layouts.end')
