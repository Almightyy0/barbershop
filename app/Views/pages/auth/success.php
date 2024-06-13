<?= $this->extend('layout/auth-page-layout') ?>

<?= $this->section('content') ?>

<form class="flex flex-col w-full h-full pb-6 text-center bg-white rounded-3xl">
    <?= (session()->has('success') ? '<h3 class="mb-3 text-4xl font-extrabold text-stone-900">Register Berhasil</h3>' : '<h3 class="mb-3 text-4xl font-extrabold text-stone-900">Password berhasil diubah</h3>'); ?>

    <p class="mb-4 text-grey-700">Silahkan Login kembali</p>
    <div class="flex items-center mb-3">
        <hr class="h-0 border-b border-solid border-grey-500 grow">
    </div>
    <p class="text-sm leading-relaxed text-grey-900">Sudah punya akun ? <a href="/login"
            class="font-bold text-grey-700">Masuk</a></p>
</form>
<?= $this->endSection() ?>