<?php
$id = intval($_GET['code']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TDR | Impresión ticket</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/master.css">
    <script type="text/javascript" src="jquery-qrcode-0.14.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <div style="margin-top:20px;" id="qrcode"></div>
                <br>
                <?php echo "<h4 style='margin-top:-20px;'>$id  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SAE</h4>"; ?>
                <p>TDR Ciudad Juaréz</p>
            </div>
        </div>
    </div>
    <?php
    echo '<script type="text/javascript">';
    echo "$('#qrcode').qrcode({";
    echo "text: 'http://proyectoalis.com/tdr/detail.php?code=".$id."',";
    echo "});";
    echo '</script>'
     ?>

</body>
</html>
