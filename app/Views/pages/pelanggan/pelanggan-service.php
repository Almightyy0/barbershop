<?= $this->extend('layout/product-page-layout') ?>

<?= $this->section('content') ?>
<!-- <main class="flex justify-center">
    <div class="container mt-4">
        <div
            class="w-full rounded-lg sticky top-4 shadow-sm flex justify-start items-center gap-4 py-4 bg-stone-900 mb-8">
            <a href="/">
                <button class="btn text-white bg-green-700 btn-success ms-4"><i
                        class="fa-solid fa-arrow-left text-white">
                    </i>Kembali</button>
            </a>
            <h1 class="text-white font-bold text-2xl">Layanan barber kami</h1>
        </div>
        <div class="rounded-lg bg-gray-100 shadow-sm">
            <div class="container card-group flex gap-8 justify-content-center flex-wrap">
                
                <div class="card bg-stone-900 text-white transition duration-200 ease-in-out  shadow hover:scale-105">
                    <figure><img class="bg-gray-200 object-cover product w-full" src="/img/mens.png" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title text-3xl text-white capitalize">Pangkas Rambut Anak <div
                                class="badge badge-secondary">populer</div>
                        </h2>
                        <p class="text-white  text-2xl">panggkas rambut untuk anak usia 15 - 10 tahun</p>
                        <div class="card-actions justify-between">
                            <h2 class="card-title text-3xl text-green-500">Rp. 15.000,00</h2>
                            <button class="btn btn-lg w-32 btn-success">Pesan</button>
                        </div>
                    </div>
                </div>
                <div class="card bg-stone-900 text-white transition duration-200 ease-in-out  shadow hover:scale-105">
                    <figure><img class="bg-gray-200 object-cover product w-full" src="/img/kids.png" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title text-3xl text-white capitalize">Pangkas Rambut Anak <div
                                class="badge badge-secondary">new</div>
                        </h2>
                        <p class="text-white  text-2xl">panggkas rambut untuk anak usia 15 - 10 tahun</p>
                        <div class="card-actions justify-between">
                            <h2 class="card-title text-3xl text-green-500">Rp. 15.000,00</h2>
                            <button class="btn btn-lg w-32 btn-success">Pesan</button>
                        </div>
                    </div>
                </div>
                <div class="card bg-stone-900 text-white transition duration-200 ease-in-out  shadow hover:scale-105">
                    <figure><img class="bg-gray-200 object-cover product w-full" src="/img/premium.png" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title text-3xl text-white capitalize">Pangkas Rambut Anak <div
                                class="badge badge-secondary">populer</div>
                        </h2>
                        <p class="text-white  text-2xl">panggkas rambut untuk anak usia 15 - 10 tahun</p>
                        <div class="card-actions justify-between">
                            <h2 class="card-title text-3xl text-green-500">Rp. 15.000,00</h2>
                            <button class="btn btn-lg w-32 btn-success">Pesan</button>
                        </div>
                    </div>
                </div>
                <div class="card bg-stone-900 text-white transition duration-200 ease-in-out  shadow hover:scale-105">
                    <figure><img class="bg-gray-200 object-cover product w-full" src="/img/regula.png" alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title text-3xl text-white capitalize">Pangkas Rambut Anak <div
                                class="badge badge-secondary">populer</div>
                        </h2>
                        <p class="text-white text-2xl">panggkas rambut untuk anak usia 15 - 10 tahun</p>
                        <div class="card-actions justify-between">
                            <h2 class="card-title text-3xl text-green-500">Rp. 15.000,00</h2>
                            <button class="btn btn-lg w-32 btn-success">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main> -->

<div class="w-full mx-auto pt-8 bg-white mb-24">
    <div
        class="w-10/12 rounded-md sticky z-50 top-2 bg-stone-900 mx-auto flex justify-start gap-4 text-white items-center">
        <a href="/"><button class="btn text-white ms-2 my-2 bg-green-600 hover:bg-green-500 font-sans"><i
                    class="fa-solid text-white fa-arrow-left"></i>Kembali</button></a>

        <h1 class="font-semibold">Layanan di barber kami</h1>
    </div>
    <div class="w-10/12 mx-auto gap-5 mt-8 flex justify-center flex-wrap">
        <?php foreach ($services as $service) : ?>
        <div
            class="card cursor-pointer border border-gray-400 bg-cover hover:scale-[101%] transition duration-300 ease-out w-full lg:w-[300px] bg-base-100 shadow-xl">
            <figure class="bg-gray-100 hover:brightness-75 transition ease-in-out duration-500"><img
                    src="img/<?= $service['foto']; ?>" class="object-cover h-48 w-full" alt="Shoes" />
            </figure>
            <div class="p-4">
                <h2 class="card-title text-gray-200">
                    <?= $service['nama']; ?>
                </h2>
                <p class="line-clamp-3 mb-2"><?= $service['deskripsi']; ?></p>
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-green-500">Rp. <?= $service['harga']; ?></h1>
                    <a href="<?= base_url('pesanan/'.$service['slug']); ?>"><button
                            class="btn bg-green-600 text-white hover:bg-green-500 active:bg-green-500">Pesan</button></a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</div>
<?= $this->endSection() ?>