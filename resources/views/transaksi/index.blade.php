@include('layouts.header')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card" bis_skin_checked="1">
        <div class="card-header">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert" bis_skin_checked="1">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-md-6">
                    <h5 class="">Data Transaksi</h5>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transaksi">
                        <i class="bx bx-plus"></i> Tambah Transaksi
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap" bis_skin_checked="1">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr align="center">
                            <th width="10%">No</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th width="10%"><i class="bx bx-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($transaksi as $key => $row)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $row->pelanggan->nama_pelanggan }}</td>
                                <td class="text-end">{{ number_format($row->total_harga) }}</td>
                                <td class="text-center">{{ $row->created_at }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Modal -->
<div class="modal modal-top fade" id="transaksi" tabindex="-1" bis_skin_checked="1" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" bis_skin_checked="1">
        <form class="modal-content">
            <div class="modal-header" bis_skin_checked="1">
                <h5 class="modal-title" id="modalTopTitle">Pilih Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" bis_skin_checked="1">
              <div class="table-responsive text-nowrap" bis_skin_checked="1">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr align="center">
                            <th width="10%">No</th>
                            <th>Pelanggan</th>
                            <th>Alamat</th>
                            <th width="10%"><i class="bx bx-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pelanggan as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a href="{{ route('transaksi.show', $row->id) }}" class="btn btn-sm btn-primary">pilih</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            <div class="modal-footer" bis_skin_checked="1">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </form>
    </div>
</div>
</div>

@include('layouts.end')
