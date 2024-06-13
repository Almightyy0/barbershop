<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/img/favicon.ico');?>">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="<?=base_url('assets/css/tailwind.css')?> ">
    <link rel="stylesheet" href="<?=base_url('assets/icons/Font-Awesome/css/all.min.css')?>">
    <?=($title == 'Histori' || $title == 'Layanan' || $title == 'Barber' || $title == 'Jadwal') ? '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">' : ''?>
    <link rel="stylesheet" href="<?=base_url('assets/css/tailwind.css')?>">

</head>

<body class="bg-gray-100">
    <?=$this->include('component/admin-sidebar')?>

    <div class="lg:ml-[300px]">
        <div class="hidden shadow-sm lg:block">
            <div class="w-full flex items-center shadow-md  text-stone-600 gap-4 justify-end bg-white h-[60px]">
                <div class="avatar my-2">
                    <div class="w-[38px] rounded-full">
                        <img src="<?=base_url('img/' . $admin['foto']);?>" />
                    </div>
                </div>
                <h1 class="mr-8"><?=$admin['nama'];?></h1>
            </div>
        </div>
        <?=$this->renderSection('content');?>
    </div>

    <script type="text/javascript">
    function Open() {
        document.querySelector('.sidebar').classList.toggle('left-[-250px]');
    }
    </script>
</body>

</html>