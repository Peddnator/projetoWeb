<?php

        if (isset($_SESSION['loggedIN'])){
            header('Location: hidden.php');
            exit();
        }

        if (isset($_POST['login'])){
            $conn = new mysqli('localhost','root','','lssantos');

            $email = $conn->real_escape_string($_POST['emailPHP']);
            $password = md5($conn->real_escape_string($_POST['passwordPHP']));

            $data = $conn->query("SELECT idUser FROM users WHERE email='$email' AND password='$password'");
            if ($data->num_rows>0){
                $_SESSION['loggedIN']='1';
                $_SESSION['email']= $email;

                exit('Login efetuado com sucesso!!');
            }else

                exit('Login Falhou!!');
        }
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LosSantosCustoms</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
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
				<li class="nav-item ">
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
				<li class="nav-item active">
					<a class="nav-link" href="login.php">Login/Casdastro</a>
				</li>
			</ul>
		</div>	
		</div>
	</nav>
	<div class="container padding">
		<div class="login-form col-md-4 offset-md-4">
			<h1 class="title">Login</h1>
			<form method = "post" action="login.php">
				<div class="form-group">
					<label>Usuario</label>
					<input type="text"id="email" placeholder="email ...."  class="form-control">
				</div>
				<div class="form-group">
					<label>Senha</label>
					<input type="passoword" id="password" placeholder="senha.." class="form-control">
				</div>
				<div class="form-group">
					<input type="checkbox" > Lembrar-me
				</div>
				<button class="btn btn-primary btn-block">Login</button>
				<a href="cadastro.php">Clique aqui</a> caso não possua cadastro

			</form>
		
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#login").on('click', function () {
                var email = $("email").val();
                var password = $("password").val()

                if (email == "" || password == "")
                    alert('Porfavor cheque suas credenciais');
                else {
                    $.ajax({
                        url: 'login.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            login: 1,
                            emailPHP: email,
                            passwordPHP: password
                        },
                        success: function (response) {
                            $("#response").html(response);
                            if (response.indefOf('success') >= 0) {
                                window.location = 'hidden.php';
                            }
                        }
                    });
                }
            });
        });
    </script>
	
</body>
</html>