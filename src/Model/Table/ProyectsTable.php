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
}
?>