<?php
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title><?php if (!empty($title)) echo $title . ' | ' . PROJECT_TITLE; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?=base_url("assets/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
     <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <!--
    Custom styles for this template-->
    <link href="<?=base_url("assets/css/sb-admin-2.min.css");?>" rel="stylesheet">
    <?php echo $css; ?>
    <!-- EOF CSS INCLUDE -->
</head>
<body class="">
<?php echo $content; ?>

<?php echo $js; ?>
</body>
</html>
