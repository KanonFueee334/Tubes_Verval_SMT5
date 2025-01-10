@extends('super_admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <button id="btnUpdateStok" type="button" class="btn btn-primary">Ubah Stok</button>
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
                            <th style="font-weight: bold">Tanggal Masuk</th>
                            <th style="font-weight: bold">Nama Barang</th>
                            <th style="font-weight: bold">Harga Barang Awal</th>
                            <th style="font-weight: bold">Harga Barang Jual</th>
                            <th style="font-weight: bold">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stok as $index => $item)
                                <tr data-id="{{ $item->id_stok }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->po->header["tanggal_order"])->format('d-m-Y') }}</td>
                                    <td>{{ $item->barang["nama_barang"] }}</td>
                                    <td>{{ $item->po["harga_barang"] }}</td>
                                    <td>
                                        <input type="number" min="0" value="{{ $item->harga_barang_jual }}" class="form-control harga_barang_jual" data-index="{{ $index }}" name="harga_barang_jual" placeholder="0">
                                    </td>
                                    <td>
                                        <input type="number" min="0" value="{{ $item->po["jumlah_barang"] }}" class="form-control jumlah_barang" data-index="{{ $index }}" name="jumlah_barang" placeholder="0">
                                    </td>
                                    <input type="hidden" class="id_po" value="{{ $item->po["id_purchasing_order_detail"] }}">
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
	
@section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#btnUpdateStok').on('click', function() {
                var data = [];

                $('#dataTable tbody tr').each(function(index, tr) {
                    var rowData = {
                        'id': $(tr).data('id'),
                        'harga_barang_jual': $(tr).find('.harga_barang_jual').val(),
                        'jumlah_barang': $(tr).find('.jumlah_barang').val(),
                        'id_po': $(tr).find('.id_po').val()
                    };
                    data.push(rowData);
                });

                // Tampilkan konfirmasi SweetAlert
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data stok akan diperbarui!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, perbarui!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim data ke server menggunakan AJAX
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("super_admin.update_stok") }}',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'data': data
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                );
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat memperbarui data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
