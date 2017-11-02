<?php
	function pegarLinhas (){
		include("php/conexoes/user-access.php");
		$string = "";
		$caminho = "uploads/files/Produtos.txt";

		$blacklist = ["Código"];

		//$salvar = file_put_contents($caminho, $string)or die("Unable to save file!");
		$arquivo = file_get_contents($caminho, FILE_TEXT) or die("Unable to open file!");
		$texto = explode("\n", $arquivo);
		for($i=0; $i<count($texto)-1; $i++){
			$texto[$i] = str_replace("	", ";", $texto[$i]);

			$poscol01 = strpos($texto[$i], ";");
			$col01 = substr($texto[$i], 0, $poscol01);
			$texto[$i] = str_replace(substr($texto[$i], 0, $poscol01+1), "", $texto[$i]);

			$poscol02 = strpos($texto[$i], ";");
			$col02 = substr($texto[$i], 0, $poscol02);
			$texto[$i] = str_replace(substr($texto[$i], 0, $poscol02+1), "", $texto[$i]);

			if($col02 == ""){
				$tipo = $col01;
			}
			/*$postipo = strpos($col02, " ");
			$tipo = substr($col02, 0, $postipo);*/

			$poscol03 = strpos($texto[$i], ";");
			$col03 = substr($texto[$i], 0, $poscol03);
			$texto[$i] = str_replace(substr($texto[$i], 0, $poscol03+1), "", $texto[$i]);

			$poscol04 = strpos($texto[$i], ";");
			$col04 = substr($texto[$i], 0, $poscol04);
			$texto[$i] = str_replace(substr($texto[$i], 0, $poscol04+1), "", $texto[$i]);

			$poscol05 = strpos($texto[$i], ";");
			$col05 = substr($texto[$i], 0, $poscol05);
			$texto[$i] = str_replace(substr($texto[$i], 0, $poscol05+1), "", $texto[$i]);

			$col06 = substr($texto[$i], 0, strlen($texto[$i]));

			$codigo = $col01; $nome = $col02; $tipo = $tipo; $qntd = $col03; $tamanho = $col04; $prazo = $col05; $preco = $col06;

			if($col01 != $blacklist[0] and $col02 != ""){
				$dados = "INSERT INTO produtos VALUES ('$codigo', '$nome', '$tipo', '$qntd', '$tamanho', '$prazo', '$preco');";
				if($query = mysqli_query($conn, $dados)){
					//echo $dados."<br>";
					echo "Produto enviado com sucesso ($i)<br>";
				} else{
					echo "Erro: ".mysqli_error($conn);
				}
			} else{
				echo "Linhas não enviada";
			}
		}
	}
?>