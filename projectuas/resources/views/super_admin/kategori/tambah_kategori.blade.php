@extends('super_admin.dashboard')
@section('content')
    <br>
    <div class="container">
        <div class="wrapper">
            <form method="POST" action="/super_admin/kategori/tambah" id="contactForm" name="contactForm" class="contactForm">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="nama_kategori">Nama</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori"
                                value="{{ old('nama_kategori') }}">
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8"><br>
                        <div class="form-group">
                            <input type="submit" value="Tambah" name="tambah" class="btn btn-primary">
                            <a href="{{ route('super_admin.kategori') }}" class="btn btn-danger">Batal</a>
                            <div class="submitting"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
