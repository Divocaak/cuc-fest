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
                <img src="imgs/title.png" class="img-fluid" />
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
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <p>ČUČ Fest je nový převážně <span class="text-danger">studentský multižánorvý festival</span> s lokálními <span class="text-danger">benefičními účely</span>. Snažíme se „<span class="text-danger">čučet</span>“ kolem sebe a dělat to, co umíme <span class="text-light">pro ty, co nemohou</span>.</p>
                        <div class="row">
                            <div class="col-4">
                                <a href="https://www.instagram.com/cucfest/" class="btn btn-light" target="_blank"><i class="bi bi-instagram pe-2"></i>Instagram</a>
                            </div>
                            <div class="col-4">
                                <a href="https://www.facebook.com/cucfest/" class="btn btn-light" target="_blank"><i class="bi bi-facebook pe-2"></i>Facebook</a>
                            </div>
                            <div class="col-4">
                                <a href="https://fb.me/e/1Es9xsVXz" class="btn btn-light" target="_blank"><i class="bi bi-calendar-event pe-2"></i>FB událost</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <figure class="figure">
                            <img src="imgs/poster_6_22.png" class="figure-img img-fluid" />
                            <figcaption class="figure-caption text-end">poster vol. 1</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="page-section p-5">
                <h1 class="display-2 text-light">Autis Centrum o.p.s.</h1>
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <img src="https://autiscentrum.cz/wp-content/themes/autiscentrum/images/ico/logo.svg" class="img-fluid" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-muted">Z webu Autis Centra:</p>
                        <p>Jsme <span class="text-danger">nestátní nezisková organizace</span>, která poskytuje sociální služby lidem s autismem a jejich rodinám.</p>
                        <p>Autis Centrum, o.p.s. vzniklo v roce <span class="text-danger">2014</span> z několika důvodů:
                        <ul class="text-start">
                            <li>Dětem a dospělým s autismem a jejich rodinám se v Českých Budějovicích a širokém okolí <span class="text-danger">nedostávalo ani zdaleka takové péče</span>, jakou by si zasloužili. <span class="text-danger">Chyběly sociální služby</span>, které by jim pomáhaly v každodenním životě.</li>
                            <li><span class="text-danger">Nedostatečná osvěta</span> laické a odborné veřejnosti, včetně poskytovatelů sociálních služeb a školských zařízení.</li>
                        </ul>
                        </p>
                        <p>Tyto věci <span class="text-light">chceme změnit</span></p>
                        <div class="row">
                            <div class="col-4">
                                <a href="https://autiscentrum.cz/o-nas/o-nas/" class="btn btn-light" target="_blank"><i class="bi bi-globe2 pe-2"></i>Více informací</a>
                            </div>
                            <div class="col-4">
                                <a href="https://www.instagram.com/autiscentrum/" class="btn btn-light" target="_blank"><i class="bi bi-instagram pe-2"></i>Instagram</a>
                            </div>
                            <div class="col-4">
                                <a href="https://www.facebook.com/autiscentrum" class="btn btn-light" target="_blank"><i class="bi bi-facebook pe-2"></i>Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-section p-5" style="height: 200vh;">
                <h1 class="display-2 text-light">Pořadatelé<span class="text-danger">(?)</span></h1>
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <img src="imgs/toncek_sqr.png" class="img-fluid rounded-circle" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h1 class="text-light">Antonín Talafous</h1>
                        <p>Hlava celého projektu, přišel s nápadem, sehnal většinu kapel a pustil se do toho. Basa pro Zkoušku Rázem. <span class="text-warning">[věk]</span> let, studuje <span class="text-warning">[rok]</span> rokem <span class="text-warning">[škola]</span>.</p>
                        <div class="row">
                            <div class="col-6">
                                <a href="https://www.instagram.com/tonda_talafous/" class="btn btn-light" target="_blank"><i class="bi bi-instagram pe-2"></i>Instagram</a>
                            </div>
                            <div class="col-6">
                                <a href="https://www.facebook.com/tonda.talafous/" class="btn btn-light" target="_blank"><i class="bi bi-facebook pe-2"></i>Facebook</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 d-sm-none mt-4">
                        <img src="imgs/divocak_sqr.png" class="img-fluid rounded-circle" />
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h1 class="text-light">Vojtěch Divoký</h1>
                        <p>Technické vybavení a místo festivalu, sociální sítě a web. Basa pro Mortuus Pancreate. 2O let, v září nastupuje na FIT VUT v Brně.</p>
                        <div class="row">
                            <div class="col-4">
                                <a href="http://divokyvojtech.cz" class="btn btn-light" target="_blank"><i class="bi bi-globe2 pe-2"></i>Web</a>
                            </div>
                            <div class="col-4">
                                <a href="https://www.instagram.com/divokyvojta/" class="btn btn-light" target="_blank"><i class="bi bi-instagram pe-2"></i>Instagram</a>
                            </div>
                            <div class="col-4">
                                <a href="https://www.facebook.com/divokyv/" class="btn btn-light" target="_blank"><i class="bi bi-facebook pe-2"></i>Facebook</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                        <img src="imgs/divocak_sqr.png" class="img-fluid rounded-circle" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bandModal" tabindex="-1" aria-labelledby="bandModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-danger text-uppercase" id="bandModalTitle"></h3>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
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