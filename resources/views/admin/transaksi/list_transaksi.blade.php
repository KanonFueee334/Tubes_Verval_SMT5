@extends('admin.dashboard')
@section('content')
    <div class="container">
        <section class="ftco-section">
            <div class="container"><br>
                <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table id="dataTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="font-weight: bold">No</th>
                                        <th style="font-weight: bold">Nama Customer</th>
                                        <th style="font-weight: bold">Tanggal Transaksi</th>
                                        <th style="font-weight: bold">Total Transaksi</th>
                                        <th style="font-weight: bold">Status Transaksi</th>
                                        <th style="font-weight: bold">Deskripsi Transaksi</th>
                                        <th style="font-weight: bold">View</th>
                                        <th style="font-weight: bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trans as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->customer["nama_customer"] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item["tanggal_transaksi"])->format('d-m-Y') }}</td>
                                            <td>{{ App\CurrencyHelper::formatCurrency($item["total_transaksi"]) }}</td>
                                            @if ($item->status_transaksi == 1)
                                                <td>Menunggu Gudang</td>
                                            @elseif($item->status_transaksi == 2)
                                                <td>Menunggu Pembayaran</td>
                                            @elseif($item->status_transaksi == 3)
                                                <td>Selesai</td>
                                            @else
                                                <td>Batal</td>
                                            @endif
                                            <td>{{ $item["deskripsi"] }}</td>
                                            <td>
                                                <form action="{{ route('admin.transaksi.viewDetail', $item->id_transaksi_header) }}" method="get">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            @if ($item->status_transaksi != 0)
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Tombol Transaksi">
                                                        @if($item->status_transaksi == 2)
                                                            <button type="button" class="btn btn-success btn-bayar"
                                                                data-url="{{ route('admin.transaksi.bayar', $item->id_transaksi_header) }}">
                                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                            </button>
                                                        @elseif ($item->status_transaksi == 3)
                                                            <form action="{{ route('generate.invoice', $item->id_transaksi_header) }}" method="get">
                                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i></button>
                                                            </form>
                                                        @endif
                                                        <button type="button" class="btn btn-danger btn-batal"
                                                            data-url="{{ route('gudang.transaksi.batal', $item->id_transaksi_header) }}">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Konfirmasi Pembayaran
        document.querySelectorAll('.btn-bayar').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Konfirmasi Pembayaran',
                    text: 'Apakah Anda yakin ingin menyelesaikan pembayaran transaksi ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Bayar!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Pembayaran Berhasil!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 5000, // Durasi 5 detik
                                    showConfirmButton: true,
                                    willClose: () => {
                                        window.location.reload(); // Reload halaman setelah selesai
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: data.message || 'Terjadi kesalahan.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat memproses permintaan.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            console.error('Error:', error);
                        });
                    }
                });
            });
        });

        // Konfirmasi Pembatalan
        document.querySelectorAll('.btn-batal').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Konfirmasi Pembatalan',
                    text: 'Apakah Anda yakin ingin membatalkan transaksi ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Kembali'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                title: 'Pembatalan Berhasil!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat memproses pembatalan.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                    }
                });
            });
        });
    });
</script>
@endsection
