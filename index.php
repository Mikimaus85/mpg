<?php
ini_set('display_errors', 'On');
require_once __DIR__ . '/dbcon.php';
require_once __DIR__ . '/controller.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
	<?php require_once __DIR__ . '/header.php'; ?>
	<title>Kontaktieren Sie uns!</title>
</head>

<body class="bg-dark text-white meinbody">
	<div class="container">
		<?php include('message.php'); ?>
		<div class="row">
			<div class="col-sm-10 offset-sm-1 p-3 mb-2 text-xl-center">
				<header>
					<span>
						<h1 class="meinh1">Kontaktformular <img src="img/logo.png" id="logo" /></h1>
					</span>
					<nav class="navbar navbar-dark bg-dark text-white meinnavtext">
						<a class="navbar-brand navbar-text-bold" href="database.php">Auflistung</a>
						<button class="navbar-toggler align-items-lg-end bg-white" title="Auflistung" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbartext" aria-expanded="false" aria-label="Toggle navigation"></button>
					</nav>
				</header>
				<hr />
				<div class="meinp">
					<div class="row g-2">
						<div class="col-md-6">
							<p>Kontaktieren Sie uns unsere Mitarbeiter, wir werden uns schnellstmöglich um Sie kümmern. Wir bedanken uns und verbleiben mit Freundlichen Grüßen</p>
							<p>Ihre mb solutions gmbH...</p>
						</div>
						<div class="col-md-6">
							<img class="rounded img-fluid mb-3" src="img/contact.jpg" id="contact" />
						</div>
					</div>
				</div>
				<form id="myform" action="controller.php" method="POST">
					<input type="hidden" name="action" value="create" />
					<div class="row g-2">
						<p class="text-start">* Pflichtfelder</p>
						<div class="col-sm-4 input-group w-50">
							<label for="fname" class="form-label"></label>
							<input class="form-control eingabe" id="fname" type="text" name="name" placeholder="* Name..." required />
						</div>
						<div class="col-sm-4 input-group w-50">
							<label for="fvorname" class="form-label"></label>
							<input class="form-control eingabe" id="fvorname" type="text" name="vorname" placeholder="* Vorname..." required />
						</div>
						<div class="col-sm-4 input-group w-50">
							<label for="ftel" class="form-label"></label>
							<span class="input-group-text" id="basic-addon1">
								<i class="bi bi-telephone-fill"></i>
							</span>
							<input class="form-control" id="ftel" type="tel" name="telefon" placeholder="Telefonnummer..." aria-label="Input group example" aria-describedby="basic-addon1" />
						</div>
						<div class="col-sm-4 input-group w-50">
							<label for="femail" class="form-label"></label>
							<span class="input-group-text" id="basic-addon1">
								<i class="bi bi-envelope-fill"></i>
							</span>
							<input class="form-control eingabe" id="femail" type="email" name="email" placeholder="* E-Mail..." aria-label="Input group example" aria-describedby="basic-addon1" required />
						</div>
						<div class="col-sm-4 input-group w-50">
							<label for="fplz" class="form-label"></label>
							<span class="input-group-text" id="basic-addon1">
								<i class="bi bi-geo-alt-fill"></i>
							</span>
							<input class="form-control" id="fplz" type="text" name="plz" pattern="[0-9]{5}" placeholder="Postleitzahl..." title="Bitte exakt 5 Ziffern eingeben!" />
						</div>
						<div class="col-sm-4 input-group w-50">
							<label for="fauswahl" class="form-label"></label>
							<span class="input-group-text" id="basic-addon1">
								<i class="bi bi-question-square-fill"></i>
							</span>
							<select class="form-select form-select col-md-6 eingabe" id="fauswahl" name="betreff" aria-label=".form-select-lg example" required>
								<option>Anfragen</option>
								<option>laufende Projekte</option>
								<option>Buchaltung</option>
								<option>Allgemein</option>
							</select>
						</div>
						<div class="col-12 input-group">
							<label for="ftext" class="form-label"></label>
							<textarea class="form-control eingabe" id="ftext" type="text" name="text" cols="100" rows="6" maxlength="500" placeholder="* Ihr Anliegen..." required></textarea>
						</div>
						<div>
							<input class="btn btn-primary float-end" id="absenden" title="Absenden" type="submit" value="Absenden" />
							<input class="btn btn-warning float-start" id="ausbessern" title="Ausbessern" type="reset" value="Zurücksetzen" />
						</div>
					</div>
					<hr />
				</form>
				<?php require_once __DIR__ . '/footer.php'; ?>
			</div>
		</div>
	</div>
	<?php require_once __DIR__ . '/after-footer.php'; ?>
</body>

</html>