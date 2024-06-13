<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <script src="https://www.google.com/recaptcha/api.js?render=<?= getenv('GOOGLE_RECAPTCHAV3_SITEKEY') ?>"></script>
    <script type="text/javascript">
    function onSubmit(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute("<?= getenv('GOOGLE_RECAPTCHAV3_SITEKEY') ?>", {
                action: 'submit'
            }).then(function(token) {
                // Store recaptcha response
                document.getElementById("recaptcha_response").value = token;
                // Submit form
                document.getElementById("contactForm").submit();
            });
        });
    }
    </script>
</head>

<body class="bg-white py-2">
    <div class="container h-auto flex flex-col mx-auto bg-white rounded-lg pt-12 my-5">
        <div class="flex justify-center w-full h-full my-auto xl:gap-14 lg:justify-normal md:gap-5 draggable">
            <div class="flex items-center justify-center w-full lg:p-12">
                <div class="flex items-center xl:p-10">

                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>