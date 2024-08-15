<?=$this->extend('layout/admin-page-layout')?>

<?=$this->section('content')?>

<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Jadwal</h1>
<div class="lg:w-[98%] mx-auto mt-1 rounded shadow-lg bg-white w-full h-[auto]">
    <!-- Container untuk tabel dengan namespace bootstrap -->
    <button onClick="showDialog()"
        class="p-2 ms-4 rounded-md mt-4 bg-green-600 text-white hover:bg-green-500 focus:outline-none cursor-pointer"><i
            class="fa-solid fa-plus me-2"></i>Tambah
        Jadwal</button>
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
                        Jadwal Barber
                    </div>
                    <div class="card-body flex justify-between">
                        <table id="user-table" class="table table-striped table-bordered table-hover overflow-x-auto"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>id Jadwal</td>
                                    <td>Awal Masuk Kerja</td>
                                    <td>Akhir Masuk Kerja</td>
                                    <td>Status</td>
                                    <td>id barber</td>
                                    <td>barber</td>
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
                <h1 class="text-2xl font-semibold text-green-600 ">Tambah Jadwal</h1>
                <i onClick="hideDialog()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" action="<?=base_url('/admin/tambah-jadwal');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="tgl-awal">Tanggal Awal</label>
                        <?=session()->has('error') ? '<span class="text-red-500 text-sm">tanggal awal tidak boleh melebihi tanggal akhir</span>' : '';?>
                        <input name="tgl-awal" required class=" bg-gray-100 text-black rounded h-12 input input-bordered
                            <?=session()->has('error') ? 'outline outline-offset-1 outline-1 outline-red-600' : '';?>"
                            type="date">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="tgl-akhir">Tanggal Akhir</label>
                        <input name="tgl-akhir" class=" bg-gray-100 rounded h-12 input input-bordered" required
                            type="date">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="">Barber</label>
                        <?=session()->has('error-barber') ? '<span class="text-red-500 text-sm">Barber sudah digunakan dijadwal lain, hapus jadwal atau ganti barber</span>' : '';?>
                        <select
                            class="bg-gray-100 rounded h-12 outline-neutral-700  <?=session()->has('error-barber') ? 'outline outline-offset-1 outline-1 outline-red-600' : '';?>"
                            name="barber" s required>
                            <?php foreach ($barber as $key): ?>
                            <option value="<?=$key['id_barber'];?>"><?=$key['nama'];?></option>

                            <?php endforeach?>
                        </select>
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
                <h1 class="text-2xl font-semibold text-green-600 ">Edit Jadwal</h1>
                <i onClick="hideEditJadwal()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" action="<?=base_url('/admin/edit-jadwal');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="tgl-awal">Tanggal Awal</label>
                        <?=session()->has('error-edit') ? '<span class="text-red-500 text-sm">tanggal awal tidak boleh melebihi tanggal akhir</span>' : '';?>
                        <input id="tgl-awal" name="tgl-awal" required
                            class="bg-gray-100 text-black rounded h-12 input input-bordered  <?=session()->has('error') ? 'outline outline-offset-1 outline-1 outline-red-600' : '';?>"
                            type="date">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="tgl-akhir">Tanggal Akhir</label>
                        <input id="tgl-akhir" name="tgl-akhir" class="bg-gray-100 rounded h-12 input input-bordered"
                            required type="date">
                    </div>
                    <div class=" flex flex-col my-2 justify-center w-[95%]">
                        <label for="">Barber</label>
                        <?=session()->has('error-barber-edit') ? '<span class="text-red-500 text-sm">Barber sudah digunakan dijadwal lain, hapus jadwal atau ganti barber</span>' : '';?>
                        <select
                            class="bg-gray-100 rounded h-12 outline-neutral-700  <?=session()->has('error-barber') ? 'outline outline-offset-1 outline-1 outline-red-600' : '';?>"
                            name="barber" id="barber" required>
                            <?php foreach ($barber as $key): ?>
                            <option value="<?=$key['id_barber'];?>"><?=$key['nama'];?></option>

                            <?php endforeach?>
                        </select>
                        <input type="hidden" name="id-jadwal" id="id-jadwal">
                        <input type="hidden" name="status" id="status">
                        <input type="hidden" name="id-old" id="barber-old">
                        <div class="mt-4 ms-4 flex justify-between">

                            <button class="bg-gray-600 text-white rounded-md px-4 focus:outline-none py-2"
                                onClick="hideEditJadwal()" type="button">Keluar</button>`
                            <button class="bg-green-600 text-white rounded-md focus:outline-none px-4 py-2"
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
                <i onClick="hideDeleteJadwal()"
                    class="fa-solid ml-12 cursor-pointer text-4xl hover:text-grey-400 text-gray-400 fa-xmark me-3 hover:bg-gray-200 px-2 rounded-lg"></i>
            </div>

            <hr>
            <div class="bg-white pb-2 mb-[-10px]">
                <form method="post" action="<?=base_url('/admin/delete-jadwal');?>"
                    class=" w-full flex flex-col items-center">
                    <?=csrf_field();?>
                    <input type="hidden" name="id-jadwal" id="id-jadwal-delete">
                    <div class=" flex flex-col my-2 items-center justify-center w-[95%]">
                        <i class="fa-solid fa-circle-exclamation  mt-12 text-red-600 text-[100px]"></i>
                        <h1 class="font-semibold text-xl mt-6 text-gray-600">Yakin menghapus jadwal ini ?</h1>
                    </div>
                    <div class="mt-4 ms-4 flex justify-between w-[90%]">
                        <button class="bg-blue-600 text-white rounded-md px-4 focus:outline-none py-2"
                            onClick="hideDeleteJadwal()" type="button">Keluar</button>`
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
            "url": "<?php echo site_url('admin/jadwal-server') ?>",
            "type": "POST",

        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
        "scrollX": true, // Menambahkan opsi scrollX
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


function editJadwal(data) {
    let dialog = document.getElementById("edit-dialog");
    dialog.classList.remove("hidden");
    setTimeout(() => {
        dialog.classList.add("opacity-100");
    }, 100);
    document.getElementById('id-jadwal').value = data.id_jadwal;
    document.getElementById('tgl-awal').value = data.tgl_awal;
    document.getElementById('tgl-akhir').value = data.tgl_akhir;
    document.getElementById('status').value = data.status;
    document.getElementById('barber').value = data.id_barber;
    document.getElementById('barber-old').value = data.id_barber;


}

function hideEditJadwal() {
    let dialog = document.getElementById("edit-dialog");
    dialog.classList.add("opacity-0");
    setTimeout(() => {
        dialog.classList.remove("opacity-100");

    }, 300);
    setTimeout(() => {
        dialog.classList.add("hidden");;

    }, 600);

}

function deleteJadwal(id) {
    let dialog = document.getElementById("delete-dialog");
    dialog.classList.remove("hidden");
    setTimeout(() => {
        dialog.classList.add("opacity-100");
    }, 100);
    document.getElementById('id-jadwal-delete').value = id;
}

function hideDeleteJadwal() {
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