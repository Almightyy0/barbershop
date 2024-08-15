<?=$this->extend('layout/admin-page-layout')?>

<?=$this->section('content')?>
<h1 class=" p-4 text-stone-600 text-xl"><i class="fa-solid text-xl fa-house mr-4"></i>Dashboard </h1>
<div class="flex mt-0 lg:gap-3 gap-2 flex-grow-1 justify-between flex-wrap mx-4 pb-10">
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-cyan-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-address-book text-xl text-cyan-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$totalPegawai;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Pegawai</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-green-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-newspaper text-xl text-green-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$totalLayanan;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Layanan</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-amber-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-users text-amber-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$totalPelanggan;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Pelanggan</h1>
        </div>
    </div>
    <div class="bg-white text-base flex items-center  rounded-md shadow-lg w-[185px] lg:w-[24%] h-24">
        <div class="flex w-12 h-12 ms-4 bg-blue-300 justify-center items-center rounded-full">
            <i class="fa-solid fa-table-list text-xl text-blue-900"></i>
        </div>

        <div class="h-full ms-4 flex justify-center items-start flex-col">
            <h1 class="text-gray-900 font-bold text-xl ms-2"><?=$totalTransaksi;?></h1>
            <h1 class="text-gray-600 text-base ms-2">Transaksi</h1>
        </div>
    </div>

    <div class="lg:w-[68%] mt-3 rounded shadow-lg bg-white w-full h-[480px]">
        <h1 class="w-full py-4 bg-slate-100 ps-4 mb-4 text-xl border-b-2 text-green-500 font-semibold">Statistik
            Pendapatan</h1>
        <div class="m-4">
            <canvas id="myChart"></canvas>
        </div>

    </div>
    <div class="lg:w-[30.5%] w-full h-[480px]  mb-20 lg:mb-0">

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
                        <div class="stat-title text-gray-500">Statistik Pendapatan Tahun Ini</div>
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
                        <div class="stat-title text-gray-500">Total Pelayanan</div>
                        <div class="stat-value text-secondary"><?=$totalTransaksi;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var penjualanPerBulan = <?=json_encode($penjualan);?>;
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ],
        datasets: [{
            label: 'Pendapatan tahun 2024',
            data: penjualanPerBulan,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<?=$this->endSection()?>