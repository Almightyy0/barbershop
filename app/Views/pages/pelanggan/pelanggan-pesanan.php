<?=$this->extend('layout/product-page-layout')?>

<?=$this->section('content')?>
<div class="relatieve w-full mx-auto pt-8 bg-white mb-24">
    <div
        class="w-10/12 rounded-md sticky z-50 top-2 bg-stone-900 mx-auto flex justify-start gap-4 text-white items-center">
        <a href="/layanan"><button class="btn text-white ms-2 my-2 bg-green-600 hover:bg-green-500 font-sans"><i
                    class="fa-solid fa-arrow-left"></i>Kembali</button></a>

        <h1 class="font-semibold">Pesanan anda</h1>
    </div>
    <div class="w-10/12 mx-auto mt-8 flex flex-wrap gap-4 justify-between">
        <div class="bg-gray-300 w-full overflow-hidden rounded-md lg:w-[350px] h-2/5">
            <figure><img src="<?=base_url('img/' . $service['foto']);?>" alt="Shoes" />
            </figure>
        </div>
        <div class="w-full lg:w-[620px] rounded-md">
            <h1 class="text-2xl antialiased text-gray-700 font-semibold"><?=$service['nama'];?></h1>
            <h1 class="text-lg mt-2 text-green-600 font-bold">Rp. <?=$hargaRupiah?></h1>
            <hr class="mb-4 mt-4 bg-gray-400">
            <h1 class="text-green-600 font-semibold">Detail</h1>
            <div id="overflow" class="transition-all h-12 overflow-hidden ease-out duration-700">
                <p class="text-justify text-gray-800"><?=$service['deskripsi'];?>.</p>
            </div>
            <h1 id="btnTriger" onClick="showOverflow()"
                class="text-green-600 font-semibold cursor-pointer hover:text-green-600">
                Selengkapnya...</h1>
            <hr class="mb-4 mt-4 bg-gray-400">
            <h1 class="font-bold text-green-600">Pilih barber</h1>
            <div onClick="openModal()"
                class="py-2 mt-2 w-full border flex justify-between items-center border-gray-400 rounded-md transition ease-in-out duration-500 cursor-pointer hover:bg-gray-100 active:bg-gray-300">
                <h1 id="barber" class="ms-2 font-semibold text-gray-600">Pilih barber yang ingin anda pesan...</h1>
                <i class="fa-solid fa-chevron-down me-2"></i>
            </div>
            <div id="modal"
                class="w-[340px] border cursor-pointer bg-white z-50 border-gray-400 rounded-md hidden mt-2 max-h-56 absolute overflow-scroll lg:w-[630px] overflow-x-hidden">
                <?php foreach ($jadwal as $item): ?>
                <div onClick="changeBarber('<?=$item['nama'];?>', '<?=$item['antrean'];?>', '<?=$item['id_barber'];?>', '<?=session()->get('id_user');?>', '<?=$item['id_jadwal'];?>')"
                    class="flex justify-between hover:bg-gray-100 active:bg-gray-300 transition duration-700">
                    <div class="mt-2 ms-2">
                        <h1 class="text-gray-800 font-semibold"><?=$item['nama'];?></h1>
                        <p class="text-gray-600 text-sm">Antrean : <?=$item['jml_antrean'];?></p>
                    </div>
                    <div class="me-2">
                        <h1 class="text-green-600 font-semibold">Estimasi waktu tunggu</h1>
                        <p class="text-gray-600"><?=$item['antrean'];?></p>
                    </div>
                </div>
                <hr class="shadow-md">
                <?php endforeach?>
                <?php if (count($jadwal) < 1): ?>
                <div class="flex justify-between hover:bg-gray-100 active:bg-gray-300 transition duration-700">
                    <div class="mt-2 ms-2">
                        <h1 class="text-red-600 font-semibold">Tidak ada barber yang tersedia</h1>
                        <p class="text-gray-600 text-sm">Antrean : 0</p>
                    </div>
                    <div class="me-2">
                        <h1 class="text-green-600 font-semibold">Estimasi waktu tunggu</h1>
                        <p class="text-gray-600">00 : 00 Menit</p>
                    </div>
                </div>
                <hr class="shadow-md">
                <?php endif?>

            </div>
            <hr class="mb-4 mt-4 bg-gray-400">
            <h1 class="font-bold text-green-600">Pilih metode pembayaran</h1>
            <div onClick="openModalPayment()"
                class="py-2 mt-2 w-full border flex justify-between items-center border-gray-400 rounded-md transition ease-in-out duration-500 cursor-pointer hover:bg-gray-100 active:bg-gray-300">
                <h1 id="payment-method" class="ms-2 font-semibold text-gray-600">Pilih metode pembayaran</h1>
                <i id="payment-chevron" class="fa-solid fa-chevron-down me-2"></i>
            </div>
            <div id="modalpayment"
                class="w-[340px] border bg-white border-gray-400 cursor-pointer rounded-md hidden mt-2 absolute lg:w-[620px]">
                <div onClick="changePayment('Bayar ditempat')"
                    class="flex justify-start py-2 gap-6 items-center hover:bg-gray-100 active:bg-gray-300 transition duration-700">
                    <div class="ms-2 text-gray-600">
                        <i class="fa-solid fa-cash-register"></i>
                    </div>
                    <div class="me-2 text-gray-600">
                        <h1 class="text-grey-600 font-semibold">Bayar ditempat</h1>
                    </div>
                </div>
                <div onClick="changePayment('Transfer')"
                    class="flex justify-start py-2 gap-6 items-center hover:bg-gray-100 active:bg-gray-300 transition duration-700">
                    <div class="ms-2 text-gray-600">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <div class="me-2 text-gray-600">
                        <h1 class="text-grey-600 font-semibold">Transfer</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-400 h-auto rounded-md w-full lg:w-[250px]">
            <h1 class="ms-2 text-2xl font-bold text-green-600">Rincian</h1>
            <hr class="my-2 shadow-md">
            <table class="ms-2 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28">Layanan</td>
                        <td id="layanan" class="h-auto w-full"><?=$service['nama'];?></td>
                    </tr>
                    <tr>
                        <td class="align-top">Barber</td>
                        <td id="barber-rincian" class="h-auto"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Antrean</td>
                        <td id="antrean"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Pembayaran</td>
                        <td id="pembayaran"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td id="harga">Rp. <?=$hargaRupiah;?></td>
                    </tr>
                </tbody>
            </table>
            <hr class="text-gray-600 mt-4 mb-4">
            <table class="ms-2 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28 font-bold">Total</td>
                        <td id="total" class="h-auto w-full font-bold">Rp. <?=$hargaRupiah;?></td>
                    </tr>
                </tbody>
            </table>
            <div class="w-full flex justify-center">
                <button onClick="openModalConfirm()" id="btn-confirm"
                    class="btn-md btn disabled:opacity-80 disabled:bg-green-600 disabled:text-white border border-gray-400 hover:border-gray-400 mt-8 hover:bg-green-500 active:bg-green-500 bg-green-600 text-white w-4/5 mb-4">
                    Pesan
                </button>
            </div>
        </div>
    </div>
    <div id="modalconfirm"
        class="fixed hidden top-0 z-50 bg-opacity-50 w-screen justify-center items-center h-screen bg-black">
        <div class="bg-white border border-gray-400 mx-auto mt-[40px] h-auto rounded-md w-[350px]">
            <div class="w-full py-2 items-center flex justify-between">
                <h1 class="ms-4 text-xl font-bold text-green-600">Konfirmasi Pesanan</h1>
                <i onClick="openModalConfirm()" class="fa-solid fa-xmark text-2xl me-4 cursor-pointer"></i>
            </div>
            <hr class="my-2 shadow-md">
            <table class="ms-4 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28">Layanan</td>
                        <td id="layanan" class="h-auto w-full"><?=$service['nama'];?></td>
                    </tr>
                    <tr>
                        <td class="align-top">Barber</td>
                        <td id="barber-rincian-confirm" class="h-auto"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Antrean</td>
                        <td id="antrean-confirm"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Pembayaran</td>
                        <td id="pembayaran-confirm"></td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td id="harga">Rp. <?=$hargaRupiah;?></td>
                    </tr>
                </tbody>
            </table>
            <hr class="text-gray-600 mt-4 mb-4">
            <table class="ms-4 text-gray-700 w-[95%] table-fixed">
                <tbody>
                    <tr>
                        <td class="align-top w-28 font-bold">Total</td>
                        <td id="total" class="h-auto w-full font-bold">Rp. <?=$hargaRupiah;?></td>
                    </tr>
                </tbody>
            </table>
            <form action="<?=base_url('/pesanan');?>" method="POST" id="form">
                <?=csrf_field();?>
                <input type="hidden" id="layanan-id" name="id-layanan" value="<?=$service['id_layanan'];?>">
                <input type="hidden" id="estimasi" name="estimasi" value="<?=$service['estimasi'];?>">
                <input type="hidden" id="barber-id" name="id-barber" value="">
                <input type="hidden" id="pelanggan-id" name="id-pelanggan" value="<?=session()->get('id_pelanggan');?>">
                <input type="hidden" id="payment-input" name="payment" value="">
                <input type="hidden" id="jadwal-id" name="jadwal-id" value="">
            </form>
            <div class="w-full flex justify-center">
                <button id="pay-button"
                    class="btn-md btn disabled:opacity-80 disabled:bg-green-600 disabled:text-white border border-gray-400 hover:border-gray-400 mt-8 hover:bg-green-500 active:bg-green-500 bg-green-600 text-white w-4/5 mb-4">
                    Pesan
                </button>
            </div>
        </div>
    </div>
</div>
<div id="result-json"></div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ZJnR9NzsjL_sDdwV"></script>
<script>
document.getElementById('pay-button').onclick = function() {
    let layanan = document.getElementById('payment-input')
    console.log(layanan.value);
    if (layanan.value === 'Transfer') {
        snap.pay('<?=$snapToken?>', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    } else {
        let form = document.getElementById('form')
        form.submit()
    }
    // SnapToken acquired from previous step
};

setInterval(() => {
    let barber = document.getElementById('barber-id')
    let payment = document.getElementById('payment-input')
    let tombol = document.querySelector('#btn-confirm')
    if (barber.value != '' && payment.value != '') {
        tombol.disabled = false
    } else {
        tombol.disabled = true
    }
}, 100);

function changeBarber(nama, antrean, idBarber, idPelanggan, idJadwal) {
    let chevron = document.querySelector('.fa-chevron-down')
    let modal = document.querySelector('#modal')
    let barberRincian = document.getElementById('barber-rincian')
    let barberRincianConfirm = document.getElementById('barber-rincian-confirm')
    let barber = document.getElementById('barber')
    let antreanRincian = document.getElementById('antrean')
    let antreanRincianConfirm = document.getElementById('antrean-confirm')
    let barberId = document.getElementById('barber-id')
    let pelangganId = document.getElementById('pelanggan-id')
    let tombol = document.querySelector('#pay-button')
    let jadwalId = document.getElementById('jadwal-id')
    barberId.value = idBarber
    pelangganId.value = idPelanggan
    jadwalId.value = idJadwal
    barber.innerText = nama
    antreanRincian.innerText = antrean
    antreanRincianConfirm.innerText = antrean
    barberRincian.innerText = nama
    barberRincianConfirm.innerText = nama
    var antreann = new Date(antrean);
    // Menghitung selisih waktu dalam detik
    var selisihDetik = Math.round((antreann.getTime() - new Date().getTime()) / 60000);
    console.log(selisihDetik);
    modal.classList.toggle('hidden')
    chevron.classList.toggle('rotate-180')
}

function changePayment(payment) {
    let chevron = document.querySelector('#payment-chevron')
    let modal = document.querySelector('#modalpayment')
    let pembayaran = document.querySelector('#pembayaran')
    let pembayaranConfirm = document.querySelector('#pembayaran-confirm')
    let paymentMethod = document.getElementById('payment-method')
    let paymentInput = document.getElementById('payment-input')
    paymentMethod.innerText = payment
    paymentInput.value = payment
    pembayaran.innerText = payment
    pembayaranConfirm.innerText = payment
    modal.classList.toggle('hidden')
    chevron.classList.toggle('rotate-180')
}


function openModal() {
    let chevron = document.querySelector('.fa-chevron-down')
    let modal = document.querySelector('#modal')
    chevron.classList.toggle('rotate-180')
    modal.classList.toggle('hidden')

}

function openModalConfirm() {
    let modal = document.querySelector('#modalconfirm')
    modal.classList.toggle('hidden')


}

function openModalPayment() {
    let chevron = document.querySelector('#payment-chevron')
    let modal = document.querySelector('#modalpayment')
    chevron.classList.toggle('rotate-180')
    modal.classList.toggle('hidden')

}

function showOverflow() {
    let overflow = document.getElementById("overflow");
    let btnTriger = document.getElementById("btnTriger");
    if (overflow.classList.contains("h-12")) {
        overflow.classList.remove("h-12");
        btnTriger.innerText = "Lebih sedikit...";
        setTimeout(() => {
            overflow.classList.add("h-auto");
            overflow.classList.remove("overflow-hidden");

        }, 200);
    } else {
        overflow.classList.remove("h-auto");
        overflow.classList.add("overflow-hidden");
        setTimeout(() => {
            overflow.classList.add("h-12");
            btnTriger.innerText = "Selanjutnya...";
        }, 100)
    }

}
</script>
<?=$this->endSection()?>