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
		$arquivo = 'DQC841_REPORT.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7" align="center"><b>Planilha de Listagem da Tabela DQC841<b></tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td align="center"><b>FAT PART NO</b></td>';
		$html .= '<td align="center"><b>PARTS NO</b></td>';
		$html .= '<td align="center"><b>UNT USG</b></td>';
		$html .= '<td align="center"><b>DESCRIPTION</b></td>';
		$html .= '<td align="center"><b>REF DESIGNATOR</b></td>';
                $html .= '<td align="center"><b>UPDATE DT</b></td>';
                $html .= '<td align="center"><b>CREATE DT</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$sql = "select *,dqc841.UPDATE_DT as UPDATEDT from dqc841 inner join dqc84 on dqc841.FAT_PART_NO=dqc84.ID;";
		$resultado = mysqli_query($conn , $sql);
		
		while($row = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$html .= '<td align="center">'.$row["FAT_PART_NO"].'</td>';
			$html .= '<td align="center">'.$row["PARTS_NO"].'</td>';
			$html .= '<td align="center">'.$row["UNT_USG"].'</td>';
			$html .= '<td align="center">'.$row["DESCRIPTION"].'</td>';
                        $html .= '<td align="center">'.$row["REF_DESIGNATOR"].'</td>';
                        $html .= '<td align="center">'.$row["UPDATEDT"].'</td>';
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

