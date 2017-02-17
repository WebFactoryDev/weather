<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class ProyectsTable extends Table
{
    //public function initialize(){}
    
    public function getClientes(){
        //$lc = [[10,'BBVA Bancomer'],[11,'Google'],[12,'Pepe y Tonhio SA']];
        $tabla = ConnectionManager::get('default');
        $lc = $tabla->execute("SELECT id,nombre_comercial FROM Clientes")->fetchAll('assoc');
        //$lc = TableRegistry::get('Clientes')->find()->toArray();
        return $lc;
    }
    public function getTipos(){
        $tipos = ['Clima Organizacional','Liderazgo','Competencias'];
        return $tipos;
    }
    public function dartabla(){
        // Funcion solo para pruebas.
        $latabla = [];
        $latabla[] = ['id'=> 1,'nombre_comercial'=> 'Google','tipo'=> 'Clima','f_inicio'=> '2017-01-01','f_final'=> '2017-03-05','estatus'=> 'Diseñando'];
        $latabla[] = ['id'=> 2,'nombre_comercial'=> 'Bancomer','tipo'=> 'M_Cli_Lider_Comp','f_inicio'=> '2016-11-30','f_final'=> '2017-02-22','estatus'=> 'listo'];
        $latabla[] = ['id'=> 3,'nombre_comercial'=> 'Actinver','tipo'=> 'Competencias','f_inicio'=> '2016-12-01','f_final'=> '2017-02-03','estatus'=> 'listo'];
        $latabla[] = ['id'=> 4,'nombre_comercial'=> 'Bodega Aurrera','tipo'=> 'Liderazgo','f_inicio'=> '2017-01-01','f_final'=> '2017-03-05','estatus'=> 'Ejecución'];
        return $latabla;
    }
    public function getProys($activo = false){
        $fecha = date("Y-m-d");
        $latabla = $this->dartabla();
        $cond = "";
        if($activo==true){
            $cond = "WHERE f_final <= $fecha";
            // Emularemos tal busqueda.
            $tabla1 = [];
            foreach($latabla as $reg){
                // Comparar las fechas como cadenas.
                if(strcmp($fecha,$reg['f_final'])<=0)
                    $tabla1[] = $reg;
            }
        } else {
            $tabla1 = $latabla;
        }
        return $tabla1;
    }
}
?>