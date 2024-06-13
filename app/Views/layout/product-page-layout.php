<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?=$title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/img/favicon.ico');?>">


    <!-- CSS here -->
    <link rel="stylesheet" href="<?=base_url('assets/css/css-pages/' . $style);?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/tailwind.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/icons/Font-Awesome/css/all.min.css');?>">


</head>

<body class="bg-white">

    <div>
        <?=$this->renderSection('content');?>
    </div>

    <div>
        <?=$this->include('component/footer')?>
    </div>
</body>

</html>