<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="<?=csrf_token()?>" content="<?=csrf_hash()?>">
    <title><?=$title;?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/img/favicon.ico');?>">

    <!-- Impor Tailwind CSS terlebih dahulu -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />


    <!-- Impor Font Awesome CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/icons/Font-Awesome/css/all.min.css')?>">

    <!-- Impor DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
    <!-- Impor Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <?=($title == 'Histori') ? '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">' : ''?>
    <link rel="stylesheet" href="<?=base_url('assets/css/tailwind.css')?>">

</head>

<body class="bg-gray-100 h-auto">
    <?=$this->include('component/sidebar')?>

    <div class="lg:ml-[300px]">
        <div class="hidden shadow-sm lg:block">
            <div class="w-full flex items-center shadow-md text-stone-600 gap-4 justify-end bg-white h-[60px]">
                <div class="avatar my-2">
                    <div class="w-[38px] rounded-full">
                        <img src="<?=base_url('img/' . $barber['foto']);?>" />
                    </div>
                </div>
                <h1 class="mr-8"><?=$barber['nama'];?></h1>
            </div>
        </div>
        <?=$this->renderSection('content');?>
    </div>

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
    <script type="text/javascript">
    function Open() {
        document.querySelector('.sidebar').classList.toggle('left-[-250px]');
    }

    $(document).ready(function() {
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';

        var table = $('#user-table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('pegawai/histori-server') ?>",
                "type": "POST",
                "data": function(d) {
                    d[csrfName] = csrfHash;
                },
                "complete": function() {
                    csrfName = '<?= csrf_token() ?>'; // Dapatkan CSRF token baru
                    csrfHash = '<?= csrf_hash() ?>';
                }
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }],
            "scrollX": true, // Menambahkan opsi scrollX
            "scrollCollapse": true // Menambahkan opsi scrollCollapse jika Anda ingin tabel menyusut jika ada sedikit data
        });
    });
    </script>
</body>

</html>