<?php

namespace App\Controllers;
use CodeIgniter\Session\Session;

class Home extends BaseController
{
    public function index(){        
        return view('login');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de la pagina principal
     * @return void
     */
    public function pagina_principal(){
        $this->vista('pagina_principal');
    } 

    /**
     * ? Funcion de prueba, para cargar la vista de Calendario
     * @return void
     */
    public function calendario(){
        $this->vista('calendario/calendario');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de analizadortextos
     * @return void
     */
    public function analizador_textos(){
        $this->vista('analizadortextos/analizador_textos');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de autoayuda
     * @return void
     */
    public function autoayuda(){
        $this->vista('autoayuda/auto_ayuda');
    }

    /**
     * ? Funcion de prueba, para cargar la vista de tests
     * @return void
     */
    public function tests(){
        $this->vista('/test/tests');
    }

}
