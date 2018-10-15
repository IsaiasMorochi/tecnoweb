<?php 

include("/usr/share/php/adodb/adodb.inc.php");
 $db = NewADOConnection('postgres');
 $db->Connect("mail.ficct.uagrm.edu.bo", "grupo03sa", "grupo03grupo03", "db_grupo03sa");
 $result = $db->Execute("SELECT * FROM amigo");
 if ($result === false) die("failed");  
echo "Pablo la Putita de Redes"
echo "<table border=1>\n";
 while (!$result->EOF) {
	echo "\t<tr>\n";
		for ($i=0, $max=$result->FieldCount(); $i < $max; $i++)
			   print $result->fields[$i].' ';
		$result->MoveNext();
		print "<br>\n";
	echo "\t</tr>\n";
 } 
echo "</table>\n";
?>
