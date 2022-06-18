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
                <img src="imgs/title.png" class="img-fluid" style="height: 40vh" />
            </div>
            <div class="col-12 my-3">
                <h1 class="text-danger display-2" id="timer"></h1>
            </div>
            <div class="col-12 mb-5">
                <h2 class="text-dark"><span class="text-danger">!</span>Benefiční akce pro <a href="https://autiscentrum.cz" class="text-light" target="_blank">Autis Centrum o.p.s.</a></h2>
            </div>
            <div class="col-4">
                <h3 class="text-light">28.6.2022</h3>
            </div>
            <div class="col-4">
                <h3><a href="https://zizkarna.cz" class="link-danger" target="_blank">Žižkárna</a></h3>
            </div>
            <div class="col-4">
                <h3 class="text-light">vstup: kilo</h3>
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
                                    <h1 class="display-2 text-uppercase text-danger">' . $band["heading"] . '</h1>
                                    <p class="display-6 band-genre">' . $band["genre"] . '</p>
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
        <div class="text-center">
            <div class="page-section p-5">
                <h1 class="display-2 text-light">O projektu</h1>
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <p style="font-size: 1.3em;">ČUČ Fest je nový převážně <span class="text-danger">studentský multižánorvý festival</span> s lokálními <span class="text-danger">benefičními účely</span>. Snažíme se „<span class="text-danger">čučet</span>“ kolem sebe a dělat to, co umíme <span class="text-light">pro ty, co nemohou</span>.</p>
                        <!-- TODO socky btns -->
                    </div>
                    <div class="col-6">
                        <figure class="figure">
                            <img src="imgs/poster_6_22.png" class="figure-img img-fluid" />
                            <figcaption class="figure-caption text-end">poster vol. 1</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="page-section p-5" style="background-color:red">
                <h1 class="display-2 text-light">Autis Centrum o.p.s.</h1>
            </div>
            <div class="page-section p-5">
                <h1 class="display-2 text-light">Pořadatelé<span class="text-danger">(?)</span></h1>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bandModal" tabindex="-1" aria-labelledby="bandModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-danger text-uppercase" id="bandModalTitle"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bandModalContent">
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
                    $('#bandModalTitle').text(dataDecoded["heading"]);
                    $('#bandModalContent').load('bands/' + dataDecoded["folderName"] + '/modalBody.html');
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