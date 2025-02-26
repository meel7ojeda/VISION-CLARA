<?php
function ListarMarca($vConexion) {

    $Listado=array();

    $SQL = "SELECT m.Id_Marca, m.Marca FROM Marca m";

     $rs = mysqli_query($vConexion, $SQL);
        
    
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['IDMARCA'] = $data['Id_Marca'];
            $Listado[$i]['MARCADESC'] = $data['Marca'];
            $i++;
    }


    return $Listado;

}
?>