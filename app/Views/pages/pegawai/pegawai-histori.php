<?=$this->extend('layout/pegawai-page-layout')?>

<?=$this->section('content')?>
<h1 class="p-4 text-stone-600 text-xl"><i class="fa-solid fa-receipt text-xl mr-4"></i>Histori</h1>
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
                                    <td>tanggal</td>
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
<div class="h-5 bg-gray-200-100 mt-2"></div>
<?=$this->endSection()?>