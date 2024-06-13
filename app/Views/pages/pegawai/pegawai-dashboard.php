<?=$this->extend('layout/pegawai-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Dashboard </h1>
<div class="flex mt-0 lg:gap-3 gap-2 flex-grow-1 justify-between flex-wrap mx-4 pb-10">
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-cyan-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-table-list text-xl text-cyan-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$jmlAntrean;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Total antrean</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-green-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-check text-xl text-green-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$jmlTrxSuccess;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Antrean selesai</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-amber-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-triangle-exclamation text-amber-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$jmlTrxPending;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Belum di tanggapi</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-red-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-circle-xmark text-xl text-red-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$jmlTrxRejected;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Antrean ditolak</h1>
        </div>
    </div>

    <div class="lg:w-[68%] mt-3 rounded shadow-lg bg-white w-full h-[480px]">
        <h1 class="w-full py-4 bg-slate-100 ps-4 mb-4 text-xl border-b-2 text-green-500 font-semibold">Antrean
            Pesanan</h1>
        <div class="m-4">
            <div class="overflow-y-auto h-96">
                <table class="table w-full text-gray-600">
                    <!-- head -->
                    <thead>
                        <tr class="text-gray-600">
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Total</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <?php foreach ($antrean as $key): ?>
                        <tr>
                            <td><?=$key['pelanggan'];?></td>
                            <td><?=$key['layanan'];?></td>
                            <td>Rp. <?=$key['harga'];?></td>
                            <td><?=$key['status_pembayaran'];?></td>
                            <td><?=$key['status_pesanan'];?></td>
                            <td>
                                <?php if ($key['status_pesanan'] == 'diterima'): ?>
                                <div class="flex"><a
                                        href="<?=base_url('pegawai/selesai/' . $key['id_antrean']);?>"><button
                                            class="btn btn-info me-2 text-white btn-sm">Selesai</button></a><a
                                        href="<?=base_url('pegawai/tolak/' . $key['id_antrean']);?>"><button
                                            class="btn btn-error text-white btn-sm">Batalkan</button></a></div>
                                <?php else: ?>
                                <div class="flex"><a
                                        href="<?=base_url('pegawai/terima/' . $key['id_antrean']);?>"><button
                                            class="btn btn-success me-2 text-white btn-sm">Terima</button></a><a
                                        href="<?=base_url('pegawai/tolak/' . $key['id_antrean']);?>">
                                        <button class="btn btn-error text-white btn-sm">Tolak</button>
                                    </a></div>
                                <?php endif?>
                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="lg:w-[30.5%] w-full h-[480px]  mb-20 lg:mb-0">
        <div
            class="mt-3 rounded shadow-lg bg-gradient-to-r ps-4 text-white font-bold from-green-400 to-green-500 w-full h-[35%]">
            <?php if ($jadwal['status'] == 'ada'): ?>
            <h1>Anda ada jadwal hari ini</h1>
            <p class="font-normal text-gray-100 text-base mt-2 me-2">Anda sedang bekerja, klik keluar ketika anda
                selesai
                bekerja
            </p>
            <div class="flex justify-start gap-6 mt-4">
                <a href="<?=base_url('pegawai/keluar');?>">
                    <button class="btn btn-error bg-red-600 text-white">
                        Keluar</button>
                </a>
                <div class="flex gap-3 items-center rounded px-4 shadow-lg border-green-500">
                    <i class="fa-solid fa-check ps-1 text-white text-xl"></i>
                    <p class="text-base text-white me-2 px-1 pb-1"> Sedang bekerja
                    </p>
                </div>

            </div>
            <?php else: ?>
            <h1>Anda ada jadwal hari ini</h1>
            <p class="font-normal text-gray-200 text-base mt-2">anda belum masuk kerja silahkan klick masuk !</p>
            <div class="flex justify-start gap-6 mt-8">
                <a href="<?=base_url('pegawai/masuk');?>"><button
                        class="btn btn-success bg-green-600 text-white">Masuk</button></a>
                <div class="flex gap-3 items-center">
                    <i class="fa-solid fa-exclamation text-red-400 text-xl"></i>
                    <p class="text-base text-red-400 me-2 px-1 pb-1"> belum
                        masuk kerja
                    </p>
                </div>

            </div>
            <?php endif?>

        </div>
        <div class="mt-3 rounded shadow-lg bg-white w-full h-[62.5%]">
            <h1 class="w-full py-4 bg-slate-100 ps-4 text-xl border-b-2 text-green-500 font-semibold">Progres
                Pekerjaan</h1>
            <div>
                <div>
                    <div class="stat mb-4">
                        <div class="stat-figure text-primary">
                            <div class="stat-figure text-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block w-8 h-8 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-title text-gray-500">Total Pendapatan Bulan Ini</div>
                        <div class="stat-value text-primary">Rp. <?=$total;?>K</div>

                    </div>
                    <hr>
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="stat-title text-gray-500">Total Pelayanan Bulan Ini</div>
                        <div class="stat-value text-secondary"><?=$jmlAntreanSuccess;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?=$this->endSection()?>