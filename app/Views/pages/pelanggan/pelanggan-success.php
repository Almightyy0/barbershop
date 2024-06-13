<?=$this->extend('layout/product-page-layout')?>

<?=$this->section('content')?>
<div class="relatieve w-full flex justify-center mx-auto mb-24 ">
    <div class="w-96 flex flex-col mt-32 rounded border border-gray-200 shadow-md">
        <div
            class="rounded-full w-60 h-60 mt-8 border border-gray-200 mx-auto shadow-md flex items-center justify-center">
            <i class="fa-solid text-[150px] text-green-600 fa-check-to-slot"></i>
        </div>
        <h1 class="text-green-600 font-bold text-3xl mt-4 text-center">Success</h1>
        <h2 class="text-lg font-semibold mt-2 text-gray-600 text-center">Pesanan berhasil dibuat silahkan tunggu barber
            untuk
            menanggapi
            pesanan</h2>


        <p class="my-8 text-center text-gray-600">Kembali ke halaman utama ? <a class="font-semibold cursor-pointer"
                href="/">Klik disini</a></p>
    </div>
</div>

<?=$this->endSection()?>