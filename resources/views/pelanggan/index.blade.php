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
                    <h5 class="">Data Pelanggan</h5>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah
                        Data</a>
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
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th width="10%"><i class="bx bx-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pelanggan as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td class="text-center">{{ $row->telepon }}</td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a href="{{ route('pelanggan.edit', $row->id) }}" class="btn btn-sm btn-warning"><i
                                                class="bx bx-pencil"></i></a>
                                        <form action="{{ route('pelanggan.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apakah anda yakin mengapus ?')"
                                                class="btn btn-danger btn-sm ms-1"><i class="bx bx-trash"></i></button>
                                        </form>
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

@include('layouts.end')
