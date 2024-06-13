<?=$this->extend('layout/pegawai-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid fa-calendar-days text-xl mr-4"></i>Jadwal </h1>
<div class="lg:w-[98%] mx-auto mt-3 rounded shadow-lg bg-white w-full h-[560px]">
    <h1 class="w-full py-4 bg-slate-100 ps-4 mb-4 text-xl border-b-2 text-green-500 font-semibold">Jadwal Anda</h1>
    <div class="m-4">
        <div class="overflow-y-auto h-96">
            <table class="table w-full text-gray-600">
                <!-- head -->
                <thead>
                    <tr class="text-gray-600">
                        <th>Nama</th>
                        <th>Tanggal Mulai Bekerja</th>
                        <th>Tanggal Terakhir Bekerja</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal as $key): ?>
                    <tr>
                        <td><?=$barber['nama'];?></td>
                        <td><?=$key['tgl_awal'];?></td>
                        <td><?=$key['tgl_akhir'];?></td>
                        <td><?=$key['status'];?></td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="h-16 bg-gray-200">

</div>

<?=$this->endSection()?>