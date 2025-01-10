@extends('super_admin.dashboard')
@section('content')
<div class="container">
    <div class="wrapper">
        <form method="POST" action="{{ route('super_admin.ubah_supplier', $supplier->id_supplier) }}" id="contactForm" name="contactForm" class="contactForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="nama_supplier">Nama</label>
                        <input 
                            type="text" 
                            class="form-control @error('nama_supplier') is-invalid @enderror" 
                            name="nama_supplier" 
                            id="nama_supplier" 
                            value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                        >
                        @error('nama_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="alamat_supplier">Alamat</label>
                        <input 
                            type="text" 
                            class="form-control @error('alamat_supplier') is-invalid @enderror" 
                            name="alamat_supplier" 
                            id="alamat_supplier" 
                            value="{{ old('alamat_supplier', $supplier->alamat_supplier) }}"
                        >
                        @error('alamat_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="email_supplier">Email</label>
                        <input 
                            type="text" 
                            class="form-control @error('email_supplier') is-invalid @enderror" 
                            name="email_supplier" 
                            id="email_supplier" 
                            value="{{ old('email_supplier', $supplier->email_supplier) }}"
                        >
                        @error('email_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="telp_supplier">Telp</label>
                        <input 
                            type="text" 
                            class="form-control @error('telp_supplier') is-invalid @enderror" 
                            name="telp_supplier" 
                            id="telp_supplier" 
                            value="{{ old('telp_supplier', $supplier->telp_supplier) }}"
                        >
                        @error('telp_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8"><br>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                        <a href="{{ route('super_admin.supplier') }}" class="btn btn-danger">Batal</a>
                        <div class="submitting"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
