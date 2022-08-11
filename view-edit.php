<?php
//session_start();
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/dbcon.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php require_once __DIR__ . '/header.php'; ?>
    <title>Eintrag im Detail</title>
</head>

<body class="bg-dark text-white meinbody">
    <div class="container">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-sm-10 offset-sm-1 p-3 mb-2">
                <div class="text-xl-center">
                    <header>
                        <span>
                            <h1 class="meinh1">Datensatz Detailansicht <img src="img/logo.png" id="logo" /></h1>
                        </span>
                    </header>
                    <hr />
                    <div class="card bg-muted text-xl-start">
                        <div class="card-header text-black">
                            <h4>Zurück zur Auflistung
                                <a href="database.php" class="btn btn-danger float-end" title="zurück">Zurück</a>
                            </h4>
                        </div>
                        <div class="card-body text-black">
                            <?php
                            if (isset($_SESSION['result'])) {
                                $values = $_SESSION['result'][0];
                                //var_dump($_SESSION['result']);
                                //error_reporting(E_ALL);
                            ?>
                                <div class="row text-left">
                                    <form action="controller.php" method="POST">
                                        <input type="hidden" name="action" value="edit" />
                                        <input type="hidden" name="id" value="<?= $values['id']; ?>" />
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="<?= htmlentities($values['name']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Vorname</label>
                                            <input class="form-control" type="text" name="vorname" value="<?= htmlentities($values['vorname']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>PLZ</label>
                                            <input class="form-control" type="text" name="plz" value="<?= htmlentities($values['plz']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Telefon</label>
                                            <input class="form-control" type="text" name="telefon" value="<?= htmlentities($values['telefon']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" value="<?= htmlentities($values['email']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Betreff</label>
                                            <input class="form-control" type="text" name="betreff" value="<?= htmlentities($values['betreff']); ?>" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Text</label>
                                            <textarea class="form-control" cols="100" rows="6" maxlength="500" type="text" name="text" value="<?= htmlentities($values['text']); ?>"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" name="ändern" type="submit" title="Ändern" onclick="return confirm('Soll der Datensatz wirklich geändert werden?');" value="edit">Eintrag ändern</button>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            } else {
                                echo "<h4>Keinen Eintrag mit dieser ID gefunden</h4>";
                            }
                            ?>
                        </div>
                    </div>
                    <hr />
                    <?php require_once __DIR__ . '/footer.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once __DIR__ . '/after-footer.php'; ?>
</body>

</html>