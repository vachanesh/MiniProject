<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mini mvc</title>
    <!-- bootstrap -->
    <link href="<?= URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    <link href="<?= URL; ?>public/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= URL; ?>public/js/jquery.min.js"></script>
    <script>
        var BASE_URL = "<?= URL; ?>";
    </script>
    <style>
        .text-center{
            text-align: center;
        }
        .form-div{
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px; 
        }
        label.error{
            color: red;
            font-size: 13px;
            font-weight: inherit;
        }
    </style>
</head>

<body>
    <div class="container">

