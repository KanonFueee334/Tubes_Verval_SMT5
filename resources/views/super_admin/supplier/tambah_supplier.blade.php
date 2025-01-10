@extends('super_admin.dashboard')
@section('content')
    <br>
    <div class="container">
        <div class="wrapper">
            <form method="POST" action="/super_admin/supplier/tambah" id="contactForm" name="contactForm" class="contactForm">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="nama_supplier">Nama</label>
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror"
                                name="nama_supplier" id="nama_supplier" placeholder="Nama supplier"
                                value="{{ old('nama_supplier') }}">
                            @error('nama_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="alamat_supplier">Alamat</label>
                            <input type="text" class="form-control @error('alamat_supplier') is-invalid @enderror"
                                name="alamat_supplier" id="alamat_supplier" placeholder="Alamat supplier"
                                value="{{ old('alamat_supplier') }}">
                            @error('alamat_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="email_supplier">Email</label>
                            <input type="text" class="form-control @error('email_supplier') is-invalid @enderror"
                                name="email_supplier" id="email_supplier" placeholder="Email supplier"
                                value="{{ old('email_supplier') }}">
                            @error('email_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="telp_supplier">Telepon</label>
                            <input type="text" class="form-control @error('telp_supplier') is-invalid @enderror"
                                name="telp_supplier" id="telp_supplier" placeholder="Telepon supplier"
                                value="{{ old('telp_supplier') }}">
                            @error('telp_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8"><br>
                        <div class="form-group">
                            <input type="submit" value="Tambah" name="tambah" class="btn btn-primary">
                            <a href="{{ route('super_admin.supplier') }}" class="btn btn-danger">Batal</a>
                            <div class="submitting"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
