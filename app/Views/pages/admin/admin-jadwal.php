<?=$this->extend('layout/admin-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Jadwal</h1>
<div class="lg:w-[98%] mx-auto mt-1 rounded shadow-lg bg-white w-full h-[auto]">
    <!-- Container untuk tabel dengan namespace bootstrap -->
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Jadwal Barber
                    </div>
                    <div class="card-body ">
                        <table id="user-table" class="table table-striped table-bordered table-hover overflow-x-auto">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>id Jadwal/td>
                                    <td>Awal Masuk Kerja</td>
                                    <td>Akhir Masuk Kerja</td>
                                    <td>Status</td>
                                    <td>id barber</td>
                                    <td>barber</td>
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
<div class="h-5 bg-gray-200-100 mt-2"></div>

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
    var csrfName = '<?=csrf_token()?>';
    var csrfHash = '<?=csrf_hash()?>';

    var table = $('#user-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('admin/jadwal-server') ?>",
            "type": "POST",
            "data": function(d) {
                d[csrfName] = csrfHash;
            },
            "complete": function() {
                csrfName = '<?=csrf_token()?>'; // Dapatkan CSRF token baru
                csrfHash = '<?=csrf_hash()?>';
            }
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
        "scrollX": true, // Menambahkan opsi scrollX
        "scrollCollapse": true // Menambahkan opsi scrollCollapse jika Anda ingin tabel menyusut jika ada sedikit data
    });
});
</script>
<?=$this->endSection()?>