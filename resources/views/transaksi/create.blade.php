@include('layouts.header')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white pb-1 mb-2">
                    <p>Pilih Produk</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('temp.store') }}" method="POST">
                        @csrf
                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="basic-default-fullname">Pelanggan</label>
                            <input type="text" class="form-control" name="pelanggan"
                                value="{{ $pelanggan->nama_pelanggan }}" readonly>
                        </div>
                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="basic-default-fullname">Pilih Produk</label>
                            <select name="id_produk" class="form-control text-center">
                                @foreach ($produk as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_produk }} | {{ $row->stok }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="basic-default-fullname">Jumlah</label>
                            <input type="number" class="form-control text-center" name="jumlah" required>
                        </div>
                        {{-- <div class="mb-3" bis_skin_checked="1">
                            <label class="form-label" for="basic-default-fullname">Tanggal</label>
                            <input type="datetime-local" class="form-control" name="tanggal" required>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header bg-primary pb-1 mb-3">
                    <h6 class="text-white">Keranjang Belanja</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap" bis_skin_checked="1">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th width="10%">No</th>
                                    <th>Produk</th>
                                    <th>Harga Satuan Rp.</th>
                                    <th>jumlah</th>
                                    <th>Subtotal Rp.</th>
                                    <th width="10%"><i class="bx bx-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($temp as $key => $row)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $row->produk->nama_produk }}</td>
                                        <td class="text-end">{{ number_format($row->produk->harga) }}</td>
                                        <td class="text-center">{{ $row->jumlah }}</td>
                                        <td class="text-end">{{ number_format($row->produk->harga * $row->jumlah) }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('temp.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    onclick="return confirm('Apakah anda yakin untuk menghapus dari keranjang ?')"
                                                    class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $row->produk->harga * $row->jumlah;
                                    @endphp
                                @endforeach
                                <form action="{{ route('transaksi.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_pelanggan" value="{{ $pelanggan->id }}">
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-end">Total Harga :</td>
                                        <td><input type="text" name="total_harga" class="form-control text-end" value="{{ $total }}" readonly></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-end">Bayar :</td>
                                        <td><input type="number" name="bayar" id="bayar" oninput="hitungKembalian()" value="" class="form-control text-end"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-end">Kembalian :</td>
                                        <td><input type="text" name="kembalian" id="kembalian" class="form-control text-end" readonly></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-end">Check out :</td>
                                        <td class="text-center"><button type="sunmit" class="btn btn-primary"> Checkout</button></td>
                                        <td></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@include('layouts.end')
<script>
    function hitungKembalian()
    {
        var totalHarga = parseFloat('{{ $total }}');
        var bayar = parseFloat(document.getElementById('bayar').value);
        var kembalian = bayar - totalHarga;
        document.getElementById('kembalian').value = kembalian;
    }
</script>