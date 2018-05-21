<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LosSantosCustoms</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">





</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" >
	<div class="container-fluid">
		<a class="navbar-brand" href="#"><img src="imagens/logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
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
		</div>	
		</div>
	</nav>


    <div class="row padding"style="margin-left:30px;>
        <div class="text-center col-md-8 col-md-offset-2">
            <h2>Produtos</h2>
            <br><br>
            <table class="table table-hover table-bordered text-center">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Produto</td>
                    <td>Quantidade</td>
                    <td>Preço</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>>
	

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
        $(document).ready(function(){
            $("#addProd").on('click',function(){
                $("#tableManager").modal('show');
            });

            getExistingData(0,10);
        });


        function getExistingData(start, limit) {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'getExistingData',
                    start: start,
                    limit: limit
                }, success: function (response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                        start += limit;
                        getExistingData(start, limit);
                    }else{
                        $(".table").DataTable();
                    }
                }
            });
        }
    </script>
	
</body>
</html>