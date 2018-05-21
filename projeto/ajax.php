<?php 
	if (isset($_POST['key'])) {

		$conn = new mysqli("localhost", "root", "", "lossantos");

        if ($_POST['key'] == 'getRowData') {
            $rowID = $conn->real_escape_string($_POST['rowID']);
            $sql = $conn->query("SELECT nome, qtd, preco FROM itens WHERE idItens ='$rowID'");
            $data = $sql->fetch_array();
            $jsonArray = array(
                'nome' => $data['nome'],
                'qtd' => $data['qtd'],
                'preco' => $data['preco'],
            );

            exit(json_encode($jsonArray));
        }

		if ($_POST['key'] == 'getExistingData') {
            $start = $conn->real_escape_string($_POST['start']);
            $limit = $conn->real_escape_string($_POST['limit']);

            $sql = $conn->query("SELECT idItens, nome, qtd, preco FROM itens LIMIT $start, $limit");
            if ($sql->num_rows > 0) {
                $response = "";
                while($data = $sql->fetch_array()) {
                    $response .= '
						<tr>
							<td>'.$data["idItens"].'</td>
							<td id="itens_'.$data["idItens"].'">'.$data["nome"].'</td>
							<td id="itens_'.$data["qtd"].'">'.$data["qtd"].'</td>
							<td id="itens_'.$data["preco"].'">'.$data["preco"].'</td>
							<td>
								<input type="button" onclick="viewORedit('.$data["idItens"].', \'edit\')" value="Edit" class="btn btn-primary">
								<input type="button" onclick="viewORedit('.$data["idItens"].', \'view\')" value="View" class="btn">
								<input type="button" onclick="deleteRow('.$data["idItens"].')" value="Delete" class="btn btn-danger">
							</td>
						</tr>
					';
                }
                exit($response);
            } else
                exit('reachedMax');
        }

        $rowID = $conn->real_escape_string($_POST['rowID']);

        if ($_POST['key'] == 'deleteRow') {
            $conn->query("DELETE FROM itens WHERE idItens='$rowID'");
            exit('Item foi Deletado!');
        }

        $nome = $conn->real_escape_string($_POST['nome']);
		$qtd = $conn->real_escape_string($_POST['qtd']);
		$preco = $conn->real_escape_string($_POST['preco']);


        if ($_POST['key'] == 'updateRow') {
            $conn->query("UPDATE itens SET nome='$nome', qtd='$qtd', preco='$preco' WHERE idItens='$rowID'");
            exit('success');
        }


		if ($_POST['key'] =='addProd') {
            $sql = $conn->query("SELECT idItens FROM itens WHERE nome = '$nome'");
            if ($sql->num_rows > 0)
                exit("Produto ja esta Cadastrado!");
            else {
                $conn->query("INSERT INTO itens(nome,qtd,preco)
					VALUES('$nome','$qtd','$preco')");
                exit("Produto cadastrado!");
            }

        }
	}
