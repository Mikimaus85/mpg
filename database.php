<?php
require_once __DIR__ . '/dbcon.php';
require_once __DIR__ . '/controller.php';

if (isset($_SESSION['search'])) {
    $values = $_SESSION['search'];
} else {
    $sqlcommand = "SELECT * FROM contactlist";
    $query = $connect->prepare($sqlcommand);
    $query->execute();
    $values = $query->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php require_once __DIR__ . '/header.php'; ?>
    <title>Auflistung</title>
</head>

<body class="bg-dark text-white meinbody">
    <div class="container">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 p-3 mb-2 text-xl-center">
                <div class="col-12">
                    <header>
                        <span>
                            <h1 class="meinh1">Auflistung der Kontakte <img src="img/logo.png" id="logo" /></h1>
                        </span>
                        <nav class="navbar navbar-dark bg-dark text-white meinnavtext">
                            <span>
                                <a class="navbar-brand navbar-text-bold" href="index.php">Kontaktformular</a>
                                <a class="btn btn-light text-xl-center" data-bs-toggle="collapse" title="Zurück zum Formular" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="bi bi-card-list"></i> Liste öffnen...</a>
                            </span>
                            <button class="navbar-toggler align-items-lg-end bg-white" type="button" title="Öffnen Sie" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbartext" aria-expanded="false" aria-label="Toggle navigation"></button>
                        </nav>
                    </header>
                    <hr />
                    <div class="col-md-12">
                        <div class="card-header text-start">
                            <h4>Wünschen Sie einen neuen Eintrag dann bitte rechts klicken!
                                <a href="index.php" class="btn btn-secondary btn-sm float-end" title="Wünschen Sie einen neuen Eintrag?">Neuer Eintrag</a>
                            </h4>
                            <form action="controller.php" method="POST">
                                <input type="hidden" name="action" value="search" />
                                <input type="text" name="search" placeholder="Begriff" id="suchbegriff" title="bitte eingeben!" />
                                <button class="btn btn-light btn-sm float-left" type="submit" name="submit-search">Suchen</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 collapse multi-collapse text-dark meineausgabe" id="multiCollapseExample1">
                        <div class="row">
                            <?php foreach ($values as $elements) {
                                echo ' 
                            <div class="col-md-4">
                                <div class="card text-bg-light mb-3">
                                    <div class="row">
                                       <form class="col-6" name="theForm" action="controller.php" method="POST" >
                                            <input type="hidden" name="action" value="view" />
                                            <input type="hidden" name="id" value="' . $elements["id"] . '" />
                                            <input class="btn btn-success btn-sm float-left" id="btndetail" title="Ändern" type="submit" value="Detail" /> 
                                        </form>
                                        <form class="col-6" name="theForm" action="controller.php" method="POST" >
                                            <input type="hidden" name="action" value="delete" />
                                            <input type="hidden" name="id" value="' . $elements["id"] . '" />
                                            <input class="btn btn-danger btn-sm float-right" id="loeschen" title="Löschen" type="submit" onclick="submitF()" value="Löschen" />
                                        </form>
                                        <div class="card-header text-md-start">
                                            <h5 class="card-title"><b> ' . htmlentities($elements["name"]) . ' ' . htmlentities($elements["vorname"]) . '</b></h5>
                                            <p class="card-text"><b>PLZ ' . htmlentities($elements["plz"]) . '<p>Kontakt</p>' . htmlentities($elements["telefon"]) . '</b></p>
                                            <p class="card-text"><b> ' . htmlentities($elements["email"]) . '<p>Betreff</p>' . htmlentities($elements["betreff"]) . '</b></p>
                                        </div>
                                        <div class="card-body text-md-start">
                                            <p class="card-text"> ' . htmlentities($elements["text"]) . '</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            }; ?>
                        </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <?php require_once __DIR__ . '/footer.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once __DIR__ . '/after-footer.php'; ?>
</body>

</html>