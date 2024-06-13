<?= $this->extend('layout/auth-page-layout') ?>

<?= $this->section('content') ?>
<form id="contactForm" onSubmit="onSubmit(event)" action="<?= base_url('/login'); ?>" method="post"
    class="flex flex-col w-full h-full pb-6 text-center -3xl">
    <?= csrf_field() ?>

    <h3 class="mb-3 text-4xl font-extrabold text-stone-900">Masuk</h3>
    <p class="mb-4 text-grey-700">Masukkan email dan password kamu</p>
    <div class="flex items-center mb-3">
        <hr class="h-0 border-b border-solid border-grey-500 grow">
    </div>
    <?= session()->has('validation_errors') ?  '<p class="p-2 text-red-900 my-2 rounded-md bg-red-200">'. implode('<br>', session('validation_errors')) .'</p>' : '' ?>
    <?= (session()->has('error')) ? '<p class="p-2 text-red-900 my-2 rounded-md bg-red-200">' . session('error') . '</p>' : '' ?>
    <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
    <input id="email" type="email" placeholder="mail@loopple.com" name="email"
        class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <label for="password" class="mb-2 text-sm text-start text-grey-900">Password</label>
    <input id="password" type="password" placeholder="Enter a password" name="password"
        class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <input type="hidden" id="recaptcha_response" name="recaptcha_response" value="">
    <div class="flex flex-row justify-between mb-8">
        <label class="relative inline-flex items-center mr-3 cursor-pointer select-none">
            <input type="checkbox" checked value="" class="sr-only peer">
            <div
                class="w-5 h-5 bg-white border-2 rounded-sm border-grey-500 peer peer-checked:border-0 peer-checked:bg-purple-blue-500">
                <img class=""
                    src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/icons/check.png"
                    alt="tick">
            </div>
            <span class="ml-3 text-sm font-normal text-grey-900">Biarkan saya tetap masuk</span>
        </label>
        <a href="/forget-password" class="mr-4 text-sm font-medium text-purple-blue-500">Lupa password?</a>
    </div>
    <button type="submit"
        class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-green-700 focus:ring-4 focus:ring-purple-blue-100 bg-green-600">Masuk</button>
    <p class="text-sm leading-relaxed text-grey-900">Belum punya akun ? <a href="/register"
            class="font-bold text-grey-700">Buat akun</a></p>
</form>
<?= $this->endSection() ?>