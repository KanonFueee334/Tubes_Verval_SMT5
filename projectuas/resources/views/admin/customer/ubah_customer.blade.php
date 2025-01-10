@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="wrapper">
        <form method="POST" action="{{ route('admin.ubah_customer', $customer->id_customer) }}" id="contactForm" name="contactForm" class="contactForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="nama_customer">Nama</label>
                        <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" 
                            name="nama_customer" id="nama_customer" value="{{ old('nama_customer', $customer->nama_customer) }}">
                        @error('nama_customer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="alamat_customer">Alamat</label>
                        <input type="text" class="form-control @error('alamat_customer') is-invalid @enderror" 
                            name="alamat_customer" id="alamat_customer" value="{{ old('alamat_customer', $customer->alamat_customer) }}">
                        @error('alamat_customer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="email_customer">Email</label>
                        <input type="text" class="form-control @error('email_customer') is-invalid @enderror" 
                            name="email_customer" id="email_customer" value="{{ old('email_customer', $customer->email_customer) }}">
                        @error('email_customer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="label" for="telp_customer">Telp</label>
                        <input type="text" class="form-control @error('telp_customer') is-invalid @enderror" 
                            name="telp_customer" id="telp_customer" value="{{ old('telp_customer', $customer->telp_customer) }}">
                        @error('telp_customer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-8"><br>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                        <a href="{{ route('admin.customer') }}" class="btn btn-danger">Batal</a>
                        <div class="submitting"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection