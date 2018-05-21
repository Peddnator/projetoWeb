
<?php
if (isset($_POST["register"])) {
    $connection = new mysqli("localhost", "root", "", "lssantos");

    $firstName = $connection->real_escape_string($_POST["first_name"]);
    $lastName = $connection->real_escape_string($_POST["last_name"]);
    $email = $connection->real_escape_string($_POST["email"]);
    $password = md5($connection->real_escape_string($_POST["password"]));

    $data = $connection->query("INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')");

    if ($data === false)
        echo "Connection error!";
    else
        echo "Your have been signed up - please now Log In";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LosSantosCustoms</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">




</head>
<body id="llogin">
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" >
	<div class="container-fluid">
		<a class="navbar-brand" href="#"><img src="imagens/logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pecas.php">Peças</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carros.php">Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="login.php">Login/Casdastro</a>
                    </li>
			</ul>
		</div>	
		</div>
	</nav>
	<div class="container padding">
		<div class="row centered-form">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Cadastro</h3>
					</div>
					<div class=" panel-body">
						<form role="form">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="Nome">
									</div>
								</div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Sobrenome">
									</div>
								</div>

							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password"
										id="password" class="form-control input-sm" placeholder="Senha">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="re-password"
										id="re-password" class="form-control input-sm" placeholder=" Digite novamente a Senha">
									</div>
								</div>
							</div>
							<input type="submit" name="Cadastrar" class="btn btn-primary btn-block" value="Cadastrar">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	

	<div class="container-fluid padding">
		<div class="text-center padding">
			<div class="col-12">
				<h2>Redes Sociais</h2>
			</div>
			<div class="col-12 social padding">
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-google-plus-g"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>
			</div>
		</div>
	</div>
	
	<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-4">
					<img src="imagens/logo.png">
					<hr class="light">
					<p>1234-1234</p>
					<p>12345@seuemail.com</p>
					<p>Rua Santos , 1234</p>
					<p>Santos, Santos, 12345-123</p>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<h5>Funcionamento</h5>
					<hr class="light">
					<p>Segundas as Sextas : 9am - 6pm</p>
					<p>Finais de Semana : 10am - 6pm</p>
					<p>Feriados: 1pm - 5pm</p>
				</div>
				<div class="col-md-4">
					<hr class="light">
					<h5>Regiões</h5>
					<hr class="light">
					<p>Santos, Santos</p>
					<p>Santos, Santos</p>
					<p>Santos, Santos</p>
					<p>Santos, Santos</p>
				</div>
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy;Los Santos Customs</h5>
				</div>
			</div>
		</div>
	</footer>
	
</body>
</html>