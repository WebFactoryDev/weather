<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

class ProyectsController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadModel('Proyects');
    }
    public function sacaarray(){
        $this->autoRender = false;
        $listaclientes = $this->Proyects->getClientes();
        print_r($listaclientes);
    }
    //public function index(){}
    public function creaproyectos(){
        // Muestra la pantalla que servira para crear proyectos.
        
        // $this->autoRender=false;
        
        // Leer la informacion de Clientes, y ponerla en un
        // select, y un boton para agregar nuevo cliente.
        // Este es un array de id's y nombres de clientes.
        $listaclientes = $this->Proyects->getClientes();
        //$listaclientes = [[10,'BBVA Bancomer'],[11,'Google'],[12,'Pepe y Tonhio SA']];
        // Generar el select. Se está usando un str_replace
        $selclientes = "<select id='selclientes' name='selclientes'><Parse></select>";
        $opciones = "<option id='selc' value='-1' selected>selecciona un cliente</option>";
        foreach($listaclientes as $elem){
            $idc = $elem['id'];
            $nombrec = $elem['nombre_comercial'];
            $opciones .="<option id='selc$idc' value='$idc'>$nombrec</option>";;
        }
        $selclientes = str_replace("<Parse>",$opciones,$selclientes);
        // En versiones futuras seria bueno almacenar los tipos
        // de proyectos en la BD, o en un inicializador de modelo o
        // de este controlador.
        $tiposproy = $this->Proyects->getTipos();
        $chktipos = "";
        foreach($tiposproy as $k => $tp){
            $chktipos .="<input type='checkbox' id='chkt$k' name='checktipos[]' value='$k' />$tp<br>";
        }
        // Ahora los textarea que corresponden a las instrucciones.
        $instruc = "";
        foreach($tiposproy as $k => $tp){
            $instruc .="<br><label>Instrucciones para $tp</label><br>";
            $instruc .="<input type='textarea' id='instr$k' name='instr$k'  disabled/>";
        }
        // Ya estarían listas las variables para enviarlas a la vista.
        $this->set('Arreglo',['selclientes' => $selclientes,'tipos'  => $chktipos,'instr'  => $instruc]);
    }
    public function proyespecifica(){
        $this->autoRender = false;
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
    public function muestraproysactivos(){
        // Esta funcion muestra una tabla con proyectos
        // activos.
        
        // Para fines de depuracion rapida pongo esto:
        $this->autoRender = false;
        $proysactiv = $this->Proyects->getProys(true);
        
        // Confeccionar la tabla.
        $colsdb = ['id','nombre_comercial','tipo','f_inicio','f_final','estatus'];
        $colsvt = ['ID','Cliente','Tipo','Fecha Inicio','Fecha Final','Estatus'];
        $htmltabla = "<table id='latabla'>";
        // encabezado.
        $rngtabla = "<tr>";
        foreach($colsvt as $col){
            $rngtabla .= "<th>$col</th>";
        }
        $rngtabla .= "</tr>";
        $htmltabla .= $rngtabla;
        // datos.
        foreach($proysactiv as $regproy){
            $rngtabla = "<tr>";
            foreach($colsdb as $kc){
                $rngtabla .= "<td>".$regproy[$kc]."</td>";
            }
            $rngtabla .= "</tr>";
            $htmltabla .= $rngtabla;
            
        }
        $htmltabla .= "</table>";
        // este echo se va al template, quitando el autoRender
        echo $htmltabla;
    }
    public function muestraproys(){
        // Esta funcion muestra una tabla con proyectos
        // activos.
        
        // Para fines de depuracion rapida pongo esto:
        $this->autoRender = false;
        $proysactiv = $this->Proyects->getProys(false);
        
        // Confeccionar la tabla.
        $colsdb = ['id','nombre_comercial','tipo','f_inicio','f_final','estatus'];
        $colsvt = ['ID','Cliente','Tipo','Fecha Inicio','Fecha Final','Estatus'];
        $htmltabla = "<table id='latabla'>";
        // encabezado.
        $rngtabla = "<tr>";
        foreach($colsvt as $col){
            $rngtabla .= "<th>$col</th>";
        }
        $rngtabla .= "</tr>";
        $htmltabla .= $rngtabla;
        // datos.
        foreach($proysactiv as $regproy){
            $rngtabla = "<tr>";
            foreach($colsdb as $kc){
                $rngtabla .= "<td>".$regproy[$kc]."</td>";
            }
            $rngtabla .= "</tr>";
            $htmltabla .= $rngtabla;
            
        }
        $htmltabla .= "</table>";
        // este echo se va al template, quitando el autoRender
        echo $htmltabla;
    }
    public function nuevoclientefast(){
        // funcion rápida para agregar nuevo cliente.
        
    }
}
?>