@extends('super_admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <form style="text-align: right" action="/super_admin/supplier/tambah" method="get">
                        <button type="submit" name="tambah_supplier">Tambah supplier</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold">No</th>
                                    <th style="font-weight: bold">Nama supplier</th>
                                    <th style="font-weight: bold">Alamat supplier</th>
                                    <th style="font-weight: bold">Email supplier</th>
                                    <th style="font-weight: bold">Telp supplier</th>
                                    <th style="font-weight: bold">Status</th>
                                    <th style="width: 20%; font-weight: bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_supplier }}</td>
                                        <td>{{ $item->alamat_supplier }}</td>
                                        <td>{{ $item->email_supplier }}</td>
                                        <td>{{ $item->telp_supplier }}</td>
                                        @if ($item->status_supplier == 1)
                                            <td>Aktif</td>
                                        @else
                                            <td>Non-Aktif</td>
                                        @endif
                                        <td style="text-align: center">
                                            <a href="{{ route('super_admin.supplier.order', $item->id_supplier) }}"
                                                class="btn btn-warning" style="margin-right: 10px">Order</a>
                                            <a href="{{ route('super_admin.ubah_supplier', $item->id_supplier) }}"
                                                class="btn btn-primary" style="margin-right: 10px"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @if ($item->status_supplier == 1)
                                                <form id="delete-form-{{ $item->id_supplier }}" action="{{ route('supplier.destroy', $item->id_supplier) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger delete-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>                                            
                                            @else
                                                <form action="{{ route('supplier.restore', $item->id_supplier) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Success",
                    text: "{{ session('success') }}",
                    icon: "success",
                    timer: 3000
                });
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tombol delete
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form'); // Form yang sesuai dengan tombol
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit form jika konfirmasi
                        }
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
