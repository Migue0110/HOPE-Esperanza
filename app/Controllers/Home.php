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
}
