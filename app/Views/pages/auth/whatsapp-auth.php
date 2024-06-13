<?= $this->extend('layout/auth-page-layout') ?>

<?= $this->section('content') ?>

<form id="contactForm" onSubmit="onSubmit(event)" action="<?= base_url('/whatsapp-auth'); ?>" method="post"
    class="flex flex-col w-full h-full pb-6 text-center -3xl">
    <?= csrf_field() ?>
    <h3 class="mb-3 text-4xl font-extrabold text-stone-900">Lupa Password</h3>
    <p class="mb-4 text-grey-700">Masukkan no WhatsApp</p>
    <div class="flex items-center mb-3">
        <hr class="h-0 border-b border-solid border-grey-500 grow">
    </div>
    <?= session()->has('validation_errors') ?  '<p class="p-2 text-red-900 my-2 rounded-md bg-red-200">'. implode('<br>', session('validation_errors')) .'</p>' : '' ?>
    <?= (session()->has('error')) ? '<p class="p-2 text-red-900 my-2 rounded-md bg-red-200">' . session('error') . '</p>' : '' ?>
    <label for="whatsapp" class="mb-2 text-sm text-start text-grey-900">No whatsapp</label>
    <input id="whatsapp" type="text" placeholder="08xxxxxxx" name="whatsapp"
        class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <input type="hidden" id="recaptcha_response" name="recaptcha_response" value="">
    <button type="submit"
        class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-green-700 focus:ring-4 focus:ring-purple-blue-100 bg-green-600">Selanjutnya</button>
    <p class="text-sm leading-relaxed text-grey-900">Lupa no whatsapp ? <a href="/forget-password"
            class="font-bold text-grey-700">gunakan email</a></p>
</form>
<?= $this->endSection() ?>