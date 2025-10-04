<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keywords" content="<?php echo $keywords;?>">


    <link rel="shortcut icon" href="<?php echo base_url() ?>/uploads/logo/<?php echo get_lebel_by_value_in_theme_settings('favicon');?>">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/theme_3/slick/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/theme_3/slick/slick-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="<?php echo base_url() ?>/assets/datatable/datatables.min.css" rel="stylesheet"  >
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme_3/details.min.css">

    <script src="<?php echo base_url() ?>/assets/theme_3/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/jquery.star-rating.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/theme_3/jquery-ui.min.js"></script>

    <?= $this->renderSection('php-code') ?>


</head>
<body>
<?= $this->renderSection('master-layout'); ?>
<?= $this->renderSection('java_script') ?>

</body>
</html>
