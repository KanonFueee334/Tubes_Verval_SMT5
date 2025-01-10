@extends('admin.dashboard')
@section('content')
    <section class="ftco-section">
        <div class="container"><br>
            <div class="row">
                <div class="col-12">
                    <button id="btnPesan" type="button" class="btn btn-primary">Pesan</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="customer">Pilih Customer:</label>
                    <select class="form-control" id="customer" name="customer">
                        <option value="">Pilih Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id_customer }}">{{ $customer->nama_customer }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="font-weight: bold">No</th>
                                    <th style="font-weight: bold">Nama Barang</th>
                                    <th style="font-weight: bold">Stok</th>
                                    <th style="font-weight: bold">Harga Barang</th>
                                    <th style="font-weight: bold">Qty</th>
                                    <th style="font-weight: bold">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stok as $index => $item)
                                    <tr data-id="{{ $item->id_stok }}">
                                        <td style="text-align: right">
                                            <input type="checkbox" class="form-check-input pesan" data-index="{{ $index }}">
                                        </td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->barang["nama_barang"] }}</td>
                                        <td class="stok">{{ $item->po["jumlah_barang"] }}</td>
                                        <td>{{ $item->harga_barang_jual }}</td>
                                        <td>
                                            <input type="number" min="0" class="form-control qty" data-index="{{ $index }}" name="qty" placeholder="0" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control subtotal" data-index="{{ $index }}" placeholder="Subtotal" readonly>
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
        // Checkbox toggle untuk Qty
        $('.pesan').on('change', function() {
            var index = $(this).data('index');
            var qtyInput = $('.qty[data-index="' + index + '"]');
            var subtotalInput = $('.subtotal[data-index="' + index + '"]');

            if ($(this).is(':checked')) {
                qtyInput.prop('disabled', false);
            } else {
                qtyInput.prop('disabled', true).val('');
                subtotalInput.val('');
            }
        });

        // Perhitungan subtotal berdasarkan Qty
        $('.qty').on('input', function() {
            var index = $(this).data('index');
            var qty = parseFloat($(this).val()) || 0;
            var stok = parseFloat($(this).closest('tr').find('.stok').text());
            var hargaJual = parseFloat($(this).closest('tr').find('td:eq(4)').text());
            var subtotalInput = $('.subtotal[data-index="' + index + '"]');

            if (qty > stok) {
                Swal.fire({
                    title: 'Stok Tidak Cukup!',
                    text: `Stok hanya tersedia ${stok}`,
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                $(this).val(stok);
                qty = stok;
            }

            var subtotal = qty * hargaJual;
            subtotalInput.val(subtotal);
        });

        // Fungsi untuk menghitung total semua subtotal
        function hitungTotalSubtotal() {
            var totalSubtotal = 0;
            $('.subtotal').each(function() {
                var subtotal = parseFloat($(this).val()) || 0;
                totalSubtotal += subtotal;
            });
            return totalSubtotal;
        }

        // Konfirmasi transaksi dengan SweetAlert
        $('#btnPesan').on('click', function() {
            var customer = $('#customer').val();
            if (!customer) {
                Swal.fire({
                    title: 'Pilih Customer!',
                    text: 'Anda harus memilih customer sebelum melanjutkan.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            var pesanan = [];
            $('.pesan:checked').each(function(index, checkbox) {
                var rowIndex = $(checkbox).data('index');
                var qty = $('.qty[data-index="' + rowIndex + '"]').val();
                var idPo = $('.id_po[data-index="' + rowIndex + '"]').val();
                var idStok = $(checkbox).closest('tr').data('id');
                var subtotal = $('.subtotal[data-index="' + rowIndex + '"]').val();

                pesanan.push({
                    id_stok: idStok,
                    id_po: idPo,
                    qty: qty,
                    subtotal: subtotal
                });
            });

            var totalSubtotal = hitungTotalSubtotal();

            Swal.fire({
                title: 'Konfirmasi Pesanan',
                text: `Total transaksi: Rp ${totalSubtotal.toLocaleString('id-ID')}`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Pesan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("admin.buat_pesanan") }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'pesanan': pesanan,
                            'customer': customer,
                            'totalSubtotal': totalSubtotal
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.assign("/admin/transaksi/temp");
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat memproses pesanan.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
