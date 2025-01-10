@extends('super_admin.dashboard')
@section('content')
    <br>
    <div class="container">
        <div class="wrapper">
            <form method="POST" action="{{ route('super_admin.tambah_barang') }}" id="contactForm" name="contactForm" class="contactForm">
                @csrf
                <div class="row">
                    {{-- Input Kategori --}}
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="id_kategori">Kategori</label>
                            <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item['id_kategori'] }}" {{ old('id_kategori') == $item['id_kategori'] ? 'selected' : '' }}>
                                        {{ $item['nama_kategori'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Supplier --}}
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="id_supplier">Supplier</label>
                            <select class="form-control @error('id_supplier') is-invalid @enderror" name="id_supplier" id="id_supplier">
                                <option value="">Pilih Supplier</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item['id_supplier'] }}" {{ old('id_supplier') == $item['id_supplier'] ? 'selected' : '' }}>
                                        {{ $item['nama_supplier'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Input Nama Barang --}}
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="label" for="nama_barang">Nama</label>
                            <input 
                                type="text" 
                                class="form-control @error('nama_barang') is-invalid @enderror" 
                                name="nama_barang" 
                                id="nama_barang" 
                                placeholder="Nama Barang" 
                                value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Submit dan Batal --}}
                    <div class="col-md-8"><br>
                        <div class="form-group">
                            <input type="submit" value="Tambah" class="btn btn-primary">
                            <a href="{{ route('super_admin.barang') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
