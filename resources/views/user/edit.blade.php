@include('layouts.header')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4" bis_skin_checked="1">
        <div class="card-header d-flex justify-content-between align-items-center" bis_skin_checked="1">
            <h5 class="mb-0">Edit User</h5>
        </div>
        <div class="card-body" bis_skin_checked="1">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="password" value="{{ $user->password }}">
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-fullname">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                        required>
                </div>
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-company">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                        required>
                </div>
                <div class="mb-3" bis_skin_checked="1">
                    <label class="form-label" for="basic-default-company">Level</label>
                    <select name="level" class="form-control">
                        <option value="0" class="form-control" {{ $user->level == '0' ? 'selected' : '' }}>Kasir</option>
                        <option value="1" class="form-control" {{ $user->level == '1' ? 'selected' : '' }}>Admin</option>
                    </select>
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
