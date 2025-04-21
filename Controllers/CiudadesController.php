<?php
require_once 'Models/Ciudades.php';
class CiudadesController{
    public function listar (){
        $ciudades =new Ciudades;
        echo json_encode($ciudades->getCiudades());
}
?>