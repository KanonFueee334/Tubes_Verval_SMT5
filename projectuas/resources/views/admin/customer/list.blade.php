@extends('admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <form style="text-align: right" action="/admin/customer/tambah" method="get">
                        <button type="submit" name="tambah">Tambah customer</button>
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
                                    <th style="font-weight: bold">Nama customer</th>
                                    <th style="font-weight: bold">Alamat customer</th>
                                    <th style="font-weight: bold">Email customer</th>
                                    <th style="font-weight: bold">Telp customer</th>
                                    <th style="font-weight: bold">Status</th>
                                    <th style="width: 20%; font-weight: bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_customer }}</td>
                                        <td>{{ $item->alamat_customer }}</td>
                                        <td>{{ $item->email_customer }}</td>
                                        <td>{{ $item->telp_customer }}</td>
                                        @if ($item->status_customer == 1)
                                            <td>Aktif</td>
                                        @else
                                            <td>Non-Aktif</td>
                                        @endif
                                        <td style="text-align: center">
                                            <a href="{{ route('admin.ubah_customer', $item->id_customer) }}"
                                                class="btn btn-primary" style="margin-right: 10px"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            @if ($item->status_customer == 1)
                                                <button class="btn btn-danger delete-button"
                                                    data-id="{{ $item->id_customer }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            @else
                                                <form action="{{ route('customer.restore', $item->id_customer) }}"
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
            // SweetAlert untuk tombol hapus
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.dataset.id;

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
                            const url = `{{ route('customer.destroy', ':id') }}`.replace(':id', id);
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = url;
                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
