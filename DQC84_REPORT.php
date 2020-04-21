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
		$arquivo = 'DQC84_REPORT.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5" align="center"><b>Planilha de Listagem da Tabela DQC84<b></tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td align="center"><b>FAT PART NO</b></td>';
		$html .= '<td align="center"><b>MODEL</b></td>';
		$html .= '<td align="center"><b>TOTAL LOCATION</b></td>';
		$html .= '<td align="center"><b>UPDATE DT</b></td>';
		$html .= '<td align="center"><b>CREATE DT</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$sql = "select * from dqc84 inner join dqcmodel on dqc84.MODEL=dqcmodel.ID;";
		$resultado = mysqli_query($conn , $sql);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td align="center">'.$row["FAT_PART_NO"].'</td>';
                        $html .= '<td align="center">'.$row["MODEL"].'</td>';
			$html .= '<td align="center">'.$row["TOTAL_LOCATION"].'</td>';
			$html .= '<td align="center">'.$row["UPDATE_DT"].'</td>';
                        $html .= '<td align="center">'.$row["CREATE_DT"].'</td>';
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

