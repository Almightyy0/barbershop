<?= $this->extend('layout/auth-page-layout') ?>

<?= $this->section('content') ?>
<form id="contactForm" onSubmit="onSubmit(event)" action="<?= base_url('/register'); ?>" method="post"
    class="flex flex-col w-full h-full pb-6 text-center -3xl">
    <?= csrf_field() ?>
    <h3 class="mb-3 text-4xl font-extrabold text-stone-900">Register</h3>
    <p class="mb-4 text-grey-700">Masukkan informasi tentang kamu</p>
    <div class="flex items-center mb-3">
        <hr class="h-0 border-b border-solid border-grey-500 grow">
    </div>
    <label for="name" class="mb-2 text-sm text-start text-grey-900">Nama</label>
    <?= isset($error['name']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">'. $error['name'] .'</p>' : ''; ?>
    <input type="text" placeholder="John Doe" required name="name"
        value="<?= isset($input['name']) ? $input['name'] : '' ?>"
        class="flex border-red-600 items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <label for="email" class="mb-2 text-sm text-start text-grey-900">Email</label>
    <?= isset($error['email']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">'. $error['email'] .'</p>' : ''; ?>
    <input type="email" placeholder="example@gmail.com" required name="email"
        value="<?= isset($input['email']) ? $input['email'] : '' ?>"
        class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <label for="no_hp" class="mb-2 text-sm text-start text-grey-900">No Whatsapp</label>
    <?= isset($error['no_hp']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">'. $error['no_hp'] .'</p>' : ''; ?>
    <input type="text" placeholder="08xxxx" required name="no_hp"
        value="<?= isset($input['no_hp']) ? $input['no_hp'] : '' ?>"
        class="flex items-center w-full px-5 py-4 mr-2 text-sm font-medium outline-none focus:bg-grey-400 mb-7 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <label for="password" class="mb-2 text-sm text-start text-grey-900">Password</label>
    <?= isset($error['password']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">'. $error['password'] .'</p>' : ''; ?>
    <input type="password" placeholder="********" required name="password"
        value="<?= isset($input['password']) ? $input['password'] : '' ?>"
        class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-200 text-dark-grey-900 rounded-2xl" />
    <label for="confirm-password" class="mb-2 text-sm text-start text-grey-900">Confirm Password</label>
    <?= isset($error['password']) ? '<p class="text-start text-red-600 font-sans mb-2 text-sm">'. $error['password'] .'</p>' : ''; ?>
    <input type="password" placeholder="********" required name="repassword"
        class="flex items-center w-full px-5 py-4 mb-5 mr-2 text-sm font-medium outline-none focus:bg-grey-400 placeholder:text-grey-700 bg-grey-100 text-dark-grey-900 rounded-2xl" />
    <input type="hidden" id="recaptcha_response" name="recaptcha_response" value="">

    <div class="flex flex-row justify-between mb-8">

    </div>
    <button
        class="w-full px-6 py-5 mb-5 text-sm font-bold leading-none text-white transition duration-300 md:w-96 rounded-2xl hover:bg-green-600 focus:ring-4 focus:ring-purple-blue-100 bg-green-700">Register</button>
    <p class="text-sm leading-relaxed text-grey-900">Sudah punya akun ? <a href="/login"
            class="font-bold text-grey-700">Masuk</a></p>
</form>
<?= $this->endSection() ?>