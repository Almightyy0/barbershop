<?=$this->extend('layout/product-page-layout')?>

<?=$this->section('content')?>
<div class="bg-gray-100">
    <div
        class="w-[90%] rounded-md sticky z-50 top-2 bg-stone-900 mx-auto flex justify-start gap-4 text-white items-center">
        <a href="/"><button class="btn text-white ms-2 my-2 bg-green-600 hover:bg-green-500 font-sans"><i
                    class="fa-solid text-white fa-arrow-left"></i>Kembali</button></a>

        <h1 class="font-semibold">Profil Anda</h1>
    </div>
    <div class="w-[90%] mx-auto">
        <div
            class="bg-gray-100 mt-8 h-screen lg:justify-center lg:flex-row flex-col flex lg:items-start items-center gap-5">
            <div class="bg-white w-[90%] lg:w-[26%] h-auto shadow-md flex items-center flex-col">
                <div class="w-full  flex justify-end tra me-2 mt-2 cursor-pointer"> <i onClick="modalEdit()"
                        class="fa-solid fa-pen hover:bg-gray-200 transition-all p-2 rounded-lg absolute"></i>
                </div>

                <img class="w-[280px] mt-4 rounded" src=" <?=base_url('img/' . $pelanggan['foto']);?>" alt="">
                <h1 class="font-bold mt-4 text-gray-400"><?=$pelanggan['nama'];?></h1>
                <hr class="bg-solid w-full my-2 bg-gray-600">
                <div class="w-full ms-16 flex justfy-start text-gray-600">
                    <i class="fa-solid fa-address-book text-xl me-8"></i>
                    <p><?=$akun['no_hp'];?></p>
                </div>
                <hr class="bg-solid w-full my-2 bg-gray-600">
            </div>
            <div class="bg-white w-[90%] mt-8 lg:mt-0  lg:w-[70%] h-[200px] shadow-md">
                <div class="w-full  flex justify-end tra me-2 cursor-pointer"> <i
                        class="fa-solid fa-pen hover:bg-gray-200 transition-all p-2 rounded-lg absolute"></i>
                </div>
                <div class="w-full h-12 bg-slate-100 flex items-center">
                    <h1 class="text-xl ms-4 font-semibold text-green-600">Profil Pelanggan</h1>
                </div>
                <div class="w-full mt-2 ms-4 grid grid-cols-4 gap-4 text-gray-600">
                    <p>Status</p>
                    <p class="col-span-3  font-semibold text-gray-500">: <?=$akun['status'];?></p>
                </div>
                <hr class="bg-solid w-full my-2 bg-gray-600">
                <div class="w-full mt-2 ms-4 grid grid-cols-4 gap-4 text-gray-600">
                    <p>Email</p>
                    <p class="col-span-3 font-semibold text-gray-500">: <?=$akun['email'];?></p>
                </div>
                <hr class="bg-solid w-full my-2 bg-gray-600">
                <div class="w-full ms-4 grid grid-cols-4 gap-4 text-gray-600">
                    <p>Password</p>
                    <p class="col-span-3  font-semibold text-gray-500">: ********</p>
                </div>
                <hr class="bg-solid w-full my-2 bg-gray-600">

            </div>
        </div>
    </div>

</div>

<?=$this->endSection()?>