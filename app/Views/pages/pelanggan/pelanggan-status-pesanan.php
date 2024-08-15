<?=$this->extend('layout/product-page-layout')?>

<?=$this->section('content')?>


<div class="container mx-auto pt-4 bg-white mb-24">
    <div
        class="lg:w-full w-[95%] mx-auto rounded-md sticky z-50 top-2 bg-stone-900 flex justify-start gap-4 text-white items-center">
        <a href="/"><button class="btn text-white ms-2 my-2 bg-green-600 hover:bg-green-500 font-sans"><i
                    class="fa-solid text-white fa-arrow-left"></i>Kembali</button></a>

        <h1 class="font-semibold">Pesanan Anda</h1>
    </div>

    <div
        class="lg:w-full w-[95%] shadow-md bg-gray-200 px-2 py-4 mx-auto mt-4 flex items-center gap-4 font-semibold text-sm text-green-600">
        <i class="fa-solid fa-circle-exclamation text-2xl"></i> Note : Datang 10 menit sebelum antrean anda !
    </div>
    <?php if (session()->has('success')): ?>
    <div id="alert"
        class="bg-green-600 flex lg:w-full w-[95%] mx-auto text-white alert rounded-lg border-none transition-all ease-in-out duration-500 opacity-100 mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span><?=session()->getFlashdata('success');?></span>
    </div>
    <?php endif;?>
    <?php if (session()->has('error')): ?>
    <div id="alert"
        class="bg-red-600 flex lg:w-full w-[95%] mx-auto text-white alert rounded-lg border-none transition-all ease-in-out duration-500 opacity-100 mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span><?=session()->getFlashdata('error');?></span>
    </div>
    <?php endif;?>
    <h1 class="font-bold text-gray-600 mt-4 ms-3 text-xl">Layanan Yang Anda Pesan</h1>
    <div
        class="lg:w-full w-[95%] flex-wrap mx-auto mt-4 justify-between flex shadow-md bg-gray-100 rounded lg:min-h-[450px]">
        <div class="lg:w-[69%] w-[98%]">
            <?php foreach ($antrean as $item): ?>
            <div class="bg-white ms-2 rounded my-2 shadow-md">
                <div class="flex w-full">
                    <img class="m-2 rounded bg-gray-200 w-24 h-24" src="<?=base_url('img/' . $item['foto']);?>" alt="">
                    <div class="my-2">
                        <h1 class="font-semibold truncate text-gray-700 w-32 lg:w-[610px] lg:text-clip">
                            <?=$item['nama-layanan'];?></h1>
                        <p class="text-gray-600 text-sm">Antrean : <?=$item['wkt_tunggu'];?></p>
                        <div class="mt-4">
                            <button
                                onClick="modalDetail('<?=$item['nama-layanan'];?>', '<?=$item['barber'];?>', '<?=$item['wkt_tunggu'];?>', '<?=$item['status_pembayaran'];?>', '<?=$item['harga'];?>')"
                                class="font-semibold text-green-600 "><i
                                    class="fa-solid fa-receipt rounded-full hover:bg-gray-200 p-2 active:bg-gray-200"></i></button>
                            <button
                                onClick="modalDelete('<?=$item['id_antrean'];?>', '<?=$item['id_pelanggan'];?>', '<?=$item['id-barber'];?>', '<?=$item['harga'];?>')"
                                class="font-semibold  text-red-500"><i
                                    class="fa-solid fa-trash p-2 rounded-full hover:bg-gray-200 active:bg-gray-200"></i></button>
                        </div>
                    </div>
                    <div>
                        <p class="mt-2 ms-3 text-green-600 font-semibold me-2">Rp. <?=$item['harga'];?></p>
                        <P class="text-end text-gray-600 mt-10 me-2 capitalize"><?=$item['status_pembayaran'];?></P>
                    </div>
                </div>
            </div>
            <?php endforeach?>
            <?php if (empty($antrean)): ?>
            <div class="bg-white ms-2 rounded my-2 shadow-md">
                <div class="flex w-full">

                    <div class="my-2 w-full flex justify-center flex-col items-center h-[450px]">
                        <img src="<?=base_url('img/empty.jpg');?>" class="w-[300px]" alt="empty-img">
                        <h1 class="text-gray-600 font-semibold text-2xl text-center">Tidak ada pesanan untuk sekarang
                        </h1>
                    </div>

                </div>
            </div>
            <?php endif?>
        </div>
        <div class="lg:w-[30%] w-[95%] mx-auto mt-2 mb-2 lg:me-2 h-[210px] bg-white shadow-md">
            <div>
                <h1 class="font-bold text-xl lg:ms-12 ms-2 mt-2 text-gray-600">Ringkasan Pesanan</h1>
                <table class="lg:ms-12 ms-2 mt-2 table-fixed">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" text-gray-600 w-36 h-7">Jumlah Pesanan</td>
                            <td>:</td>
                            <td class=" text-gray-600 ps-8"><?=$rincian['jml_pesanan'];?></td>
                        </tr>
                        <tr>
                            <td class=" text-gray-600 w-36 h-7">Sudah dibayar</td>
                            <td>:</td>
                            <td class=" text-gray-600 ps-8"><?=$rincian['jml_sudah_bayar'];?></td>
                        </tr>
                        <tr>
                            <td class=" text-gray-600 w-36 h-7">Belum dibayar</td>
                            <td>:</td>
                            <td class=" text-gray-600 ps-8"><?=$rincian['jml_belum_bayar'];?></td>
                        </tr>

                    </tbody>
                </table>
                <hr class="mt-4 shadow-md">
                <div class="flex justify-between mt-4">
                    <h1 class="ms-12 font-bold text-xl text-gray-600">Total</h1>
                    <h1 class="text-green-600 text-xl font-semibold me-8">Rp. <?=$rincian['total'];?></h1>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-detail"
        class="fixed left-0 hidden top-0 z-50 bg-opacity-50 w-screen justify-center items-center h-screen bg-black">
        <div class="bg-white border  border-gray-400 mx-auto mt-[40px] h-auto rounded-md w-[350px]">
            <div class="w-full py-2 items-center flex justify-between">
                <h1 class="ms-4 text-xl font-bold text-green-600">Detail Pesanan</h1>
                <i onClick="modalDetail()" class="fa-solid fa-xmark text-2xl me-4 cursor-pointer"></i>
            </div>
            <hr class="my-2 shadow-md">
            <table class="ms-6 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28">Layanan</td>
                        <td id="layanan" class="h-auto w-full capitalize"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Barber</td>
                        <td id="barber" class="h-auto capitalize"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Antrean</td>
                        <td id="antrean" class="capitalize"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Pembayaran</td>
                        <td id="pembayaran" class="capitalize"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td id="harga">Rp. </td>
                    </tr>
                </tbody>
            </table>
            <hr class="text-gray-600 mt-4 mb-4">
            <table class="ms-6 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28 font-bold">Total</td>
                        <td id="total" class="h-auto w-full font-bold">Rp. </td>
                    </tr>
                </tbody>
            </table>
            <form action="<?=base_url('/pesanan');?>" method="POST" id="form">
                <?=csrf_field();?>
                <input type="hidden" id="layanan-id" name="id-layanan" value="">
                <input type="hidden" id="estimasi" name="estimasi" value="">
                <input type="hidden" id="barber-id" name="id-barber" value="">
                <input type="hidden" id="pelanggan-id" name="id-pelanggan" value="">
                <input type="hidden" id="payment-input" name="payment" value="">
                <input type="hidden" id="jadwal-id" name="jadwal-id" value="">
            </form>
            <div class="w-full flex justify-center">
                <button id="pay-button"
                    class="btn-md btn disabled:opacity-80 disabled:bg-green-600 disabled:text-white border border-gray-400 hover:border-gray-400 mt-8 hover:bg-green-500 active:bg-green-500 bg-green-600 text-white w-4/5 mb-4">
                    Bayar
                </button>
            </div>
        </div>
    </div>
    <div id="modal-hapus"
        class="fixed hidden left-0 top-0 z-50 bg-opacity-50 w-screen justify-center h-screen bg-black">
        <div
            class="w-96 transition ease-in-out duration-500 flex items-center bg-white flex-col mt-12 h-[240px] rounded border border-gray-200 shadow-md">
            <div class="w-full py-2 items-center flex justify-between">
                <h1 class="ms-4 text-xl font-bold text-green-600">Batalkan Pesanan</h1>
                <i onClick="modalDelete()" class="fa-solid fa-xmark text-2xl me-4 cursor-pointer"></i>
            </div>
            <hr class="shadow-md">
            <h2 class="mx-4 mt-2 text-gray-600 text-justify">Jika anda terlalu sering membatalkan
                pasanan akun anda akan di nonaktifkan, silahkan hubungi admin untuk pengembalian dana anda jika anda
                sudah melakukan pembayaran!!</h2>
            <form class="w-full flex justify-center" action="<?=base_url('/batalkan-pesanan');?>" method="POST"
                id="form-hapus">
                <?=csrf_field();?>
                <input type="hidden" id="id-antrean" name="id-antrean" value="">
                <button
                    class="bg-green-600 active:scale-[1.01] hover:scale-[1.01] hover:bg-green-500 hover:shadow-md active:bg-green-500  transition ease-in-out duration-700 rounded mt-6 p-2 text-white font-bold w-[90%]">Batalkan</button>
            </form>

        </div>
    </div>

</div>
</div>

<script>
function modalDetail(layanan = '', barber = '', antrean = '', pembayaran = '', harga = '') {
    let modal = document.getElementById('modal-detail');
    let layananElement = document.getElementById('layanan');
    let barberElement = document.getElementById('barber');
    let antreanElement = document.getElementById('antrean');
    let pembayaranElement = document.getElementById('pembayaran');
    let hargaElement = document.getElementById('harga');
    let total = document.getElementById('total');
    layananElement.innerHTML = layanan;
    barberElement.innerHTML = barber;
    antreanElement.innerHTML = antrean;
    pembayaranElement.innerHTML = pembayaran;
    hargaElement.innerHTML = harga;
    total.innerHTML = harga;
    modal.classList.toggle('hidden');
}

function modalDelete(id = '', idPelanggan = '', idBarber = '', total = '') {
    let modal = document.getElementById('modal-hapus');
    let elementId = document.getElementById('id-antrean');
    elementId.value = id;
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');

}

setTimeout(() => {
    let element = document.getElementById('alert');

    if (element) {
        element.classList.remove('opacity-100');
        element.classList.add('opacity-0');
        setTimeout(() => {
            element.classList.add('h-0');
            element.classList.add('mt-[-30px]');
        }, 200);
    }

}, 2000);
</script>


<?=$this->endSection()?>