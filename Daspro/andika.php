<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Andika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>

<body style="background-color: aqua;">
    <center class="mt-5">
        <h1> Program Card Biodata </h1>
        <div class="card mt-5" style="width: 18rem;">
            <div style="box-shadow: 2px 2px 3px black;border-radius: 10px;" class="card-body">
                <h5 class="card-title">Biodata</h5>
                <?php
                $nama = "andika";
                $nim = "F1G118011";
                ?>
                <?php { ?>
                    <p class="card-text"><?= $nama ?></p>
                    <p class="card-text"><?= $nim ?></p>
                <?php } ?>
            </div>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>