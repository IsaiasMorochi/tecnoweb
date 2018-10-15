<?php
   echo "DATOS QUE QUIERO MOSTRAR EN EL TEMPLATE <br><br>";
   $nombre="Datos Extraidos de ARREGLOS";
   
   $amigos=array(
    array("per_idi" => "1", "per_nom" => "Evans Balcazar Veizaga"  , "per_tel" => "710-76685"),
    array("per_idi" => "2", "per_nom" => "Milton Sandoval Zabala"  , "per_tel" => "770-73615"),
    array("per_idi" => "3", "per_nom" => "Shirley Perez Delgadillo", "per_tel" => "709-34360"),
    array("per_idi" => "4", "per_nom" => "Erick Ureña Inarra"      , "per_tel" => "77382601"),
                 );

   echo "Datos del Arreglo <br>";
   echo "<pre>";
   print_r($amigos);
   echo "</pre>";
   
   require '/usr/share/php/Smarty/Smarty.class.php'; 
   
   #Crear Instancia de smarty y asignar variables
   #valores que se mostraran en el template
   $smarty = new Smarty;
   $smarty->compile_check = true;
   $smarty->debugging = true;
   $smarty->assign("var1",$nombre);
   $smarty->assign("var2",$amigos);
   #Visualizar la informacion en el TEMPLATE
   $smarty->display('listar_adm.html');
      
   // list_adm.html debe estar almacena en el directorio templates
   // y el directorios templates_c de estar con atributos de lectura/escritura
   // osea el comando chmod 777 -r templates_c


   include("/usr/share/php/adodb/adodb.inc.php");
   
   $db = NewADOConnection('postgres');
   $db->Connect("mail.ficct.uagrm.edu.bo", "grupo03sa", "grupo03grupo03", "db_grupo03sa");
   $db->debug=true;
   $result = $db->Execute("SELECT * FROM amigo;");
   $contactos=$result->GetArray();
   
   $titulo="Datos Extraidos de la Base de Datos AMIGO";
   echo "Datos de:".titulo."<br>";
   echo "<pre>";
   print_r($contactos);
   echo "</pre>";
   
   $smarty2 = new Smarty;
   $smarty2->compile_check = true;
   $smarty2->debugging = true;
   $smarty2->assign("var1",$titulo);
   $smarty2->assign("var2",$contactos);
   #Visualizar la informacion en el TEMPLATE
   $smarty2->display('listar_contact.html');
  


?>
   
