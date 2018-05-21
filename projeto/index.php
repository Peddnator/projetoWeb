<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LosSantosCustoms</title>

	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	
	<div class="container" style="margin-top:30px;">
		
		<div id="tableManager" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Produto</h2>
					</div>

					<div class="modal-body">
                        <div id="editContent">
                            <input type="text" class="form-control" placeholder="Nome Produto" id="nome"><br>
                            <textarea class="form-control" id="qtd" placeholder="Quantidade"></textarea><br>
                            <textarea class="form-control" id="preco" placeholder="Preço"></textarea><br>
                            <input type="hidden" id="editRowID" value="0">
                        </div>


                        <div id="showContent" style="display:none;">
                            <h3>Quantidade</h3>
                            <div id="qtdView"></div>
                            <hr>
                            <h3>Preço</h3>
                            <div id="precoView" style="overflow-y: scroll; height: 300px;"></div>
                        </div>
					</div>

					<div class="modal-footer">
						<input type="button" id="manageBtn" onclick="manageData('addProd')" value="Salvar" class="btn btn-success">
					</div>
				</div>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-8 col-md-offset-2">
				<h2>Produtos</h2>
				<input type="button" class="btn btn-success" id="addProd" value="Add Prod" style="float: right">
				<br><br>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<td>ID</td>
							<td>Produto</td>
							<td>Quantidade</td>
							<td>Preço</td>
                            <td>Options</td>
						</tr>
					</thead>
                    <tbody>

                    </tbody>
				</table>
			</div>
		</div>
	</div>

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

        function deleteRow(rowID) {
            if (confirm('Você tem certeza')) {
                $.ajax({
                    url: 'ajax.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteRow',
                        rowID: rowID
                    }, success: function (response) {
                        $("#itens_"+rowID).parent().remove();
                        alert(response);
                    }
                });
            }
        }

        function viewORedit(rowID, type) {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    key: 'getRowData',
                    rowID: rowID
                }, success: function (response) {
                    if (type == "view") {
                        $("#showContent").fadeIn();
                        $("#editContent").fadeOut();
                        $("#precoView").html(response.preco);
                        $("#qtdView").html(response.qtd);
                        $("#manageBtn").fadeOut();
                        $("#closeBtn").fadeIn();
                    } else {
                        $("#editContent").fadeIn();
                        $("#editRowID").val(rowID);
                        $("#showContent").fadeOut();
                        $("#preco").val(response.preco);
                        $("#qtd").val(response.qtd);
                        $("#nome").val(response.nome);
                        $("#closeBtn").fadeOut();
                        $("#manageBtn").attr('value', 'Salvar Mudanças').attr('onclick', "manageData('updateRow')");
                    }

                    $(".modal-title").html(response.nome);
                    $("#tableManager").modal('show');
                }
            });
        }

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

		function manageData(key){
			var nome = $("#nome");
			var qtd = $("#qtd");
			var preco = $("#preco");
            var editRowID = $("#editRowID");

			if(isNotEmpty(nome)&&isNotEmpty(qtd)&&isNotEmpty(preco)){
				$.ajax({
					url :'ajax.php',
					method:'POST',
					dataType:'text',
					data:{
						key: key,
						nome: nome.val(),
						qtd: qtd.val(),
						preco:preco.val(),
                        rowID: editRowID.val()
					}, success: function (response) {
                        if (response != "success")
                            alert(response);
                        else {
                            $("#itens_"+editRowID.val()).html(nome.val());
                            nome.val('');
                            qtd.val('');
                            preco.val('');
                            $("#tableManager").modal('hide');
                            $("#manageBtn").attr('value', 'Add').attr('onclick', "manageData('addProd')");
                        }
                    }
				});
			}
		}

		function isNotEmpty(caller){
			if(caller.val()==''){
				caller.css('border','1px solid red');
				return false;
			}else
				caller.css('border','');	
			return true;
		}
	</script>
</body>
</html>