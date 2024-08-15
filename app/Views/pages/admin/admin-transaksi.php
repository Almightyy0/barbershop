<?=$this->extend('layout/admin-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Transaksi</h1>
<div class="lg:w-[98%] mx-auto mt-1 rounded shadow-lg bg-white w-full h-[auto]">
    <!-- Container untuk tabel dengan namespace bootstrap -->
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Histori Layanan Anda
                    </div>
                    <div class="card-body ">
                        <table id="user-table" class="table table-striped table-bordered table-hover overflow-x-auto">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>id transaksi</td>
                                    <td>tanggal . . . .</td>
                                    <td>id layanan</td>
                                    <td>layanan</td>
                                    <td>id pelanggan</td>
                                    <td>pelanggan</td>
                                    <td>id barber</td>
                                    <td>barber</td>
                                    <td>metode pembayaran</td>
                                    <td>status</td>
                                    <td>total</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    var table = $('#user-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('admin/transaksi-server') ?>",
            "type": "POST",

        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
        "scrollX": true, // Menambahkan opsi scrollX
        "scrolly": true, // Menambahkan opsi scrollX
        "scrollCollapse": true // Menambahkan opsi scrollCollapse jika Anda ingin tabel menyusut jika ada sedikit data
    });
});
</script>
<?=$this->endSection()?>