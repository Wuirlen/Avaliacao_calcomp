<?php
	session_start();
	include './Conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	<head>
	<body>
		<?php
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'DQCMODEL_REPORT.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="1" align="center"><b>Planilha de Listagem da Tabela DQCMODEL<b></tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td align="center"><b>MODEL</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$sql = "SELECT * FROM dqcmodel";
		$resultado = mysqli_query($conn , $sql);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td align="center">'.$row["MODEL"].'</td>';
			$html .= '</tr>';
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html><?php

