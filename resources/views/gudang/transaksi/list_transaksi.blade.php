@extends('gudang.dashboard')
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
                                            <td>
                                                <form action="{{ route('gudang.transaksi.viewDetail', $item->id_transaksi_header) }}" method="get">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Tombol Transaksi">
                                                    @if ($item->status_transaksi == 1)
                                                        <button type="button" class="btn btn-success btn-konfirmasi"
                                                            data-url="{{ route('gudang.transaksi.konfirmasi', $item->id_transaksi_header) }}">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-batal"
                                                            data-url="{{ route('gudang.transaksi.batal', $item->id_transaksi_header) }}">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    @endif
                                                </div>
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
    </div>
@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Konfirmasi Transaksi
        document.querySelectorAll('.btn-konfirmasi').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Konfirmasi Transaksi',
                    text: 'Apakah Anda yakin ingin mengonfirmasi transaksi ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Konfirmasi!',
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
                                    title: 'Konfirmasi Berhasil!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 5000,
                                    showConfirmButton: true,
                                    willClose: () => {
                                        window.location.reload();
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
                                text: 'Terjadi kesalahan saat memproses konfirmasi.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                    }
                });
            });
        });

        // Pembatalan Transaksi
        document.querySelectorAll('.btn-batal').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const url = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Konfirmasi Pembatalan',
                    text: 'Apakah Anda yakin ingin membatalkan transaksi ini?',
                    icon: 'warning',
                    input: 'text',
                    inputLabel: 'Masukkan alasan pembatalan',
                    inputPlaceholder: 'Alasan pembatalan',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Anda harus memasukkan alasan pembatalan!';
                        }
                    },
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
                            },
                            body: JSON.stringify({
                                description: result.value
                            })
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
