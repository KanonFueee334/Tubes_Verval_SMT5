@extends('super_admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <form style="text-align: right" action="/super_admin/kategori/tambah" method="get">
                        <button type="submit" name="tambah_kategori">Tambah Kategori</button>
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
                                    <th style="font-weight: bold">Nama Kategori</th>
                                    <th style="font-weight: bold">Status</th>
                                    <th style="width: 20%; font-weight: bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        @if ($item->status == 1)
                                            <td>Aktif</td>
                                        @else
                                            <td>Non-Aktif</td>
                                        @endif
                                        <td style="text-align: center">
                                            <a href="{{ route('super_admin.ubah_kategori', $item->id_kategori) }}"
                                                class="btn btn-primary" style="margin-right: 10px"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @if ($item->status == 1)
                                                <form id="delete-form-{{ $item->id_kategori }}"
                                                    action="{{ route('kategori.destroy', $item->id_kategori) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger delete-button">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('kategori.restore', $item->id_kategori) }}"
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
@endsection
