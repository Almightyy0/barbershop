<?=$this->extend('layout/product-page-layout')?>

<?=$this->section('content')?>
<div>
    <div
        class="w-[90%] rounded-md sticky z-50 top-2 bg-stone-900 mx-auto flex justify-start gap-4 text-white items-center">
        <a href="/"><button class="btn text-white ms-2 my-2 bg-green-600 hover:bg-green-500 font-sans"><i
                    class="fa-solid text-white fa-arrow-left"></i>Kembali</button></a>

        <h1 class="font-semibold">Histori</h1>
    </div>
    <div class="h-12"></div>
    <div class="lg:w-full rounded flex justify-center bg-white lg:h-[690px] h-[660px]">
        <div class="w-[90%] border-2 rounded-md">
            <h1 class="w-full py-4 bg-slate-100 ps-4 mb-4 text-xl border-b-2 text-green-500 font-semibold">Histori
                Pesanan
                Anda</h1>
            <div class="m-4">
                <div class="overflow-y-auto w-full h-[600px]">
                    <table class="table w-full text-gray-600">
                        <!-- head -->
                        <thead class="bg-gray-200">
                            <tr class="text-gray-600">
                                <th>No</th>
                                <th>Id Transaksi</th>
                                <th>Tanggal</th>
                                <th>Layanan</th>
                                <th>Barber</th>
                                <th>Pelanggan</th>
                                <th>Metode Pembayaran</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1?>
                            <?php foreach ($histori as $key): ?>
                            <tr class="<?=$a % 2 === 0 ? 'bg-gray-100' : '';?>">
                                <td><?=$a++;?></td>
                                <td><?=$key['id_transaksi'];?></td>
                                <td><?=$key['tanggal'];?></td>
                                <td><?=$key['nama_layanan'];?></td>
                                <td><?=$key['nama_barber'];?></td>
                                <td><?=$key['nama_pelanggan'];?></td>
                                <td><?=$key['metode_pembayaran'];?></td>
                                <td><?=$key['status'];?></td>
                                <td><?=$key['total'];?></td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="h-12"></div>

<?=$this->endSection()?>