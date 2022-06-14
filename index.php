<?php
require_once "loadBandsFromJson.php";
?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link href="index.css" rel="stylesheet">

    <title>ČUČ Fest</title>
</head>

<body>
    <div id="content-main" class="mt-5 pt-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="text-white display-1">ČUČ Fest vol. 1</h1>
            </div>
            <div class="col-12">
                <h2 class="text-red display-2" id="timer"></h2>
            </div>
            <div class="col-12 text-white">
                <p>Benefiční akce pro <a href="https://autiscentrum.cz" class="text-red">Autis Centrum o.p.s.</a></p>
            </div>

            <div class="col-4 text-white">
                <p>28.6.2022</p>
            </div>

            <div class="col-4 text-red">
                <a href="https://zizkarna.cz" class="text-red">Žižkárna</a>
            </div>
            <div class="col-4 text-white">
                <p>vstup: kilo</p>
            </div>
        </div>
    </div>
    <div id="content-over" class="glare">
        <div id="carousel" class="carousel slide carousel-fade main" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                for ($i = 0; $i < count($bands); $i++) {
                    echo '<button type="button" data-bs-target="#carousel" data-bs-slide-to="' . $i . '" ' . ($i == 0 ? 'class="active" aria-current="true" ' : "") . '"aria-label="Slide ' . ($i + 1) . '"></button>';
                }
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                foreach ($bands as $key => $band) {
                    echo '<div class="carousel-item' . ($key === array_key_first($bands) ? " active" : "") . '">
                        <div class="carousel-page d-flex align-items-center justify-content-center" style="background-image: url(bands/' . $band["folderName"] . '/imgs/' . $band["promPic"] . ')">
                            <div class="carousel-content rounded-3 row d-flex align-items-center justify-content-center">
                                <div class="col-12">
                                    <h1 class="band-heading">' . $band["heading"] . '</h1>
                                    <p class="band-genre">' . $band["genre"] . '</p>
                                    <a class="btn btn-light" target="_blank" href=""><i class="bi bi-instagram"></i></a>
                                    <button class="btn btn-light openBandModalBtn" data-bs-toggle="modal" data-bs-target="#bandModal" data-band-id=' . $key . '>Chci víc</button>
                                    <a class="btn btn-light" target="_blank" href=""><i class="bi bi-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Předchozí</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Další</span>
            </button>
        </div>
    </div>

    <div class="modal fade" id="bandModal" tabindex="-1" aria-labelledby="bandModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bandModalTitle">Moontalks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".openBandModalBtn").click(function() {
                $.post("getBandData.php", {
                    bandId: $(this).data("bandId")
                }, function(data) {
                    var dataDecoded = JSON.parse(data);
                    console.log(dataDecoded);
                    $('#bandModal').modal('show');
                });
            });
        });

        var countDownDate = new Date("Jun 28, 2022 17:00:00").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</body>

</html>