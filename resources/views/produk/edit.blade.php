@include('layouts.header')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4" bis_skin_checked="1">
        <div class="card-header d-flex justify-content-between align-items-center" bis_skin_checked="1">
          <h5 class="mb-0">Edit Produk</h5>
        </div>
        <div class="card-body" bis_skin_checked="1">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @method('PUT')
            @csrf
              <div class="mb-3" bis_skin_checked="1">
                  <label class="form-label" for="basic-default-fullname">Produk</label>
                  <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}" required>
              </div>
              <div class="mb-3" bis_skin_checked="1">
                  <label class="form-label" for="basic-default-company">Harga</label>
                  <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}" required>
              </div>
              <div class="mb-3" bis_skin_checked="1">
                  <label class="form-label" for="basic-default-company">Stok</label>
                  <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}" required>
              </div>
              <a href="{{ route('produk.index') }}" class="btn btn-warning"><i class="bx bx-arrow-to-left"></i> Kembali</a>
              <button type="submit" class="btn btn-primary"><i class="bx bx-plus"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->

@include('layouts.end')
