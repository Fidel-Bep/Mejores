<?php
class CabeceraController{
    public function mostrarCabecera(){
        require_once 'views/cabecera.php';
    }

    public function mostrarCabeceraMetas(){
        require_once 'cabecera_e.php';
    }
}