<?=$this->extend('layout/admin-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Layanan</h1>
<div class="lg:w-[98%] mx-auto mt-1 rounded shadow-lg bg-white w-full h-[auto]">
    <!-- Container untuk tabel dengan namespace bootstrap -->
    <button onClick="showDialog()"
        class="p-2 ms-4 rounded-md mt-4 bg-green-600 text-white hover:bg-green-500 focus:outline-none cursor-pointer"><i
            class="fa-solid fa-plus me-2"></i>Tambah
        Layanan</button>
    <?php if (session()->getFlashdata('success')): ?>
    <div id="alert"
        class="alert w-[97%] ms-4 bg-green-200 border mb-[-10px] border-green-400 text-green-700 px-4 py-3 mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span><?=session()->getFlashdata('success');?></span>
    </div>
    <?php endif?>
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        Daftar Layanan
                    </div>
                    <div class="card-body flex justify-between">
                        <table id="user-table" class="table table-striped table-bordered table-hover overflow-x-auto"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>ID Layanan</td>
                                    <td>nama</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>foto</td>
                                    <td>slug</td>
                                    <td>estimasi</td>
                                    <td>deleted</td>
                                    <td>aksi</td>
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
<div class="w-full absolute">
    <div id="dialog"
        class="fixed w-full h-screen top-0 start-0 z-50  bg-black bg-opacity-50 opacity-0 hidden transition-opacity duration-700 ">
        <div class="bg-gray-100 overflow-hidden rounded-md mx-auto w-[600px] mt-8 z-50">
            <div class="my-2 ms-4 flex justify-between">
                <h1 class="text-2xl font-semibold text-green-600 ">Tambah Layanan</h1>
                <i onClick="hideDialog()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" enctype="multipart/form-data" action="<?=base_url('/admin/tambah-layanan');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="nama">Nama Layanan</label>
                        <?=session()->has('error') ? '<span class="text-red-500 text-sm">tanggal awal tidak boleh melebihi tanggal akhir</span>' : '';?>
                        <input name="nama" required class="bg-gray-100 text-black rounded h-12 input input-bordered"
                            type="text">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class=" bg-gray-100 rounded h-24 input input-bordered" required
                            type="date"></textarea>
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="harga">Harga</label>
                        <input name="harga" class=" bg-gray-100 rounded h-12 input input-bordered" required
                            type="number">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="foto">Foto</label>
                        <?=isset($error['name']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">' . $error['name'] . '</p>' : '';?>
                        <input name="foto" class=" bg-gray-100 rounded h-12 file-input input-bordered" required
                            type="file">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="estimasi">Estimasi</label>
                        <input name="estimasi" class=" bg-gray-100 rounded h-12 input input-bordered" required
                            type="number">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <div class="mt-4 ms-4 flex justify-between">
                            <button class="bg-gray-600 text-white rounded-md px-4 py-2 focus:outline-none"
                                onClick="hideDialog()" type="button">Keluar</button>`
                            <button class="bg-green-600 text-white rounded-md px-4 py-2 focus:outline-none"
                                type="submit">Simpan</button>
                        </div>
                </form>
            </div>

        </div>
    </div>

</div>
<div class="w-full absolute">
    <div id="edit-dialog"
        class="fixed w-full h-screen top-0 start-0 z-50  bg-black bg-opacity-50 opacity-0 hidden transition-opacity duration-700 ">
        <div class="bg-gray-100 overflow-hidden rounded-md mx-auto w-[600px] mt-8 z-50">
            <div class="my-2 ms-4 flex justify-between">
                <h1 class="text-2xl font-semibold text-green-600 ">Edit Layanan</h1>
                <i onClick="hideEditLayanan()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" enctype="multipart/form-data" action="<?=base_url('/admin/edit-layanan');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="nama">Nama Layanan</label>
                        <?=session()->has('error') ? '<span class="text-red-500 text-sm">tanggal awal tidak boleh melebihi tanggal akhir</span>' : '';?>
                        <input name="nama" required class="bg-gray-100 text-black rounded h-12 input input-bordered"
                            id="nama-edit" type="text">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class=" bg-gray-100 rounded h-24 input input-bordered"
                            id="deskripsi-edit" required type="date"></textarea>
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="harga">Harga</label>
                        <input name="harga" class=" bg-gray-100 rounded h-12 input input-bordered" id="harga-edit"
                            required type="number">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="foto">Foto</label>
                        <?=isset($error['name']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">' . $error['name'] . '</p>' : '';?>
                        <input name="foto" class=" bg-gray-100 rounded h-12 file-input input-bordered" type="file">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="estimasi">Estimasi</label>
                        <input name="estimasi" class=" bg-gray-100 rounded h-12 input input-bordered" required
                            id="estimasi-edit" type="number">
                    </div>
                    <input type="hidden" name="foto-edit" id="foto-edit">
                    <input type="hidden" name="id_layanan" id="id-edit">
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <div class="mt-4 ms-4 flex justify-between">
                            <button class="bg-gray-600 text-white rounded-md px-4 py-2 focus:outline-none"
                                onClick="hideDialog()" type="button">Keluar</button>`
                            <button class="bg-green-600 text-white rounded-md px-4 py-2 focus:outline-none"
                                type="submit">Simpan</button>
                        </div>
                </form>
            </div>

        </div>
    </div>

</div>
<div class="w-full absolute">
    <div id="delete-dialog"
        class="fixed w-full h-screen top-0 start-0 z-50  bg-black bg-opacity-50 opacity-0 hidden transition-opacity duration-700 ">
        <div class="bg-gray-100 overflow-hidden rounded-md mx-auto w-[400px] mt-8 z-50">
            <div class="my-2 ms-4 flex justify-between">
                <h1 class="text-2xl font-semibold text-green-600 ">Hapus Jadwal</h1>
                <i onClick="hideDeleteLayanan()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" action="<?=base_url('/admin/delete-layanan');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <input type="hidden" name="id-layanan" id="id-layanan-delete">
                    <div class=" flex flex-col my-2 items-center justify-center w-[95%]">
                        <i class="fa-solid fa-circle-exclamation  mt-12 text-red-600 text-[100px]"></i>
                        <h1 class="font-semibold text-xl mt-6 text-gray-600">Yakin menghapus Layanan ini ?</h1>
                    </div>
                    <div class="mt-4 ms-4 flex justify-between w-[90%]">
                        <button class="bg-blue-600 text-white rounded-md px-4 focus:outline-none py-2"
                            onClick="hideDeleteLayanan()" type="button">Keluar</button>`
                        <button class="bg-red-600 text-white rounded-md focus:outline-none px-4 py-2"
                            type="submit">Hapus</button>
                    </div>
                </form>
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
            "url": "<?php echo site_url('admin/layanan-server') ?>",
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

function showDialog() {
    let dialog = document.getElementById("dialog");
    dialog.classList.remove("hidden");
    setTimeout(() => {
        dialog.classList.add("opacity-100");
    }, 100);

}

function hideDialog() {
    let dialog = document.getElementById("dialog");
    dialog.classList.add("opacity-0");
    setTimeout(() => {
        dialog.classList.remove("opacity-100");

    }, 300);
    setTimeout(() => {
        dialog.classList.add("hidden");;

    }, 600);

}

<?php if (session()->getFlashdata('error') || session()->getFlashdata('error-barber')): ?>
showDialog();
<?php endif;?>

<?php if (session()->getFlashdata('error-edit') || session()->getFlashdata('error-barber-edit')): ?>
editJadwal(<?=session()->getFlashdata('list')?>);
<?php endif;?>


function editLayanan(data) {
    console.log(data);
    let dialog = document.getElementById("edit-dialog");
    dialog.classList.remove("hidden");
    setTimeout(() => {
        dialog.classList.add("opacity-100");
    }, 100);
    document.getElementById('id-edit').value = data.id_layanan;
    document.getElementById('nama-edit').value = data.nama;
    document.getElementById('deskripsi-edit').value = data.deskripsi;
    document.getElementById('estimasi-edit').value = data.estimasi;
    document.getElementById('foto-edit').value = data.foto;
    document.getElementById('harga-edit').value = data.harga;


}

function hideEditLayanan() {
    let dialog = document.getElementById("edit-dialog");
    dialog.classList.add("opacity-0");
    setTimeout(() => {
        dialog.classList.remove("opacity-100");

    }, 300);
    setTimeout(() => {
        dialog.classList.add("hidden");;

    }, 600);

}

function deleteLayanan(id) {
    let dialog = document.getElementById("delete-dialog");
    dialog.classList.remove("hidden");
    setTimeout(() => {
        dialog.classList.add("opacity-100");
    }, 100);
    document.getElementById('id-layanan-delete').value = id;
}

function hideDeleteLayanan() {
    let dialog = document.getElementById("delete-dialog");
    dialog.classList.add("opacity-0");
    setTimeout(() => {
        dialog.classList.remove("opacity-100");

    }, 300);
    setTimeout(() => {
        dialog.classList.add("hidden");;

    }, 600);

}


setTimeout(() => {
    let element = document.getElementById('alert');

    if (element) {
        element.classList.remove('opacity-100');
        element.classList.add('opacity-0');
        setTimeout(() => {
            element.classList.add('h-0');
            element.classList.add('mt-[-50px]');
        }, 200);
    }

}, 2000);
</script>


<?=$this->endSection()?>