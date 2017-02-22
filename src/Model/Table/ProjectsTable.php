<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class ProjectsTable extends Table
{
    //public function initialize(){}
    
    public function getClientes(){
        //$lc = [[10,'BBVA Bancomer'],[11,'Google'],[12,'Pepe y Tonhio SA']];
        $tabla = ConnectionManager::get('default');
        $lc = $tabla->execute("SELECT id,nombre_comercial FROM clientes")->fetchAll('assoc');
        //$lc = TableRegistry::get('Clientes')->find()->toArray();
        return $lc;
    }
    public function getClienteId($id){
        
        $tabla = ConnectionManager::get('default');
        $nombre = $tabla->execute("SELECT nombre_comercial FROM clientes WHERE id=$id")->fetchAll('assoc');
        
        return $nombre;
    }
    public function getTipos(){

        $tabla = ConnectionManager::get('default');
        $tipos = $tabla->execute("SELECT id,tipo FROM tipos")->fetchAll('assoc');
        return $tipos;
    }
    public function dartabla(){
        // Funcion solo para pruebas.
        $latabla = [];
        $latabla[] = ['id'=> 1,'nombre_comercial'=> 'Google','tipo'=> 'Clima','f_inicio'=> '2017-01-01','f_final'=> '2017-03-05','estatus'=> 'Diseñando'];
        $latabla[] = ['id'=> 2,'nombre_comercial'=> 'Bancomer','tipo'=> 'Clima|Liderazgo|Competencias','f_inicio'=> '2016-11-30','f_final'=> '2017-02-22','estatus'=> 'listo'];
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
    public function insertacl($ncomercial){
        $tabla = ConnectionManager::get('default');
        // Saber si ya existe esa razon comercial.
        $reg = $tabla->execute("SELECT * FROM Clientes WHERE nombre_comercial='$ncomercial'")->fetchAll('assoc');
        if(count($reg)>0){
            // Ya existe ese nombre
            return -$reg[0]['id'];
        } else {
            // Buscar el maximo id. Esto porque no
            // hemos puesto AUTO_INCREMENT en el id.
            $id0 = $tabla->execute("SELECT MAX(id) AS m_id FROM clientes")->fetchAll('assoc');
            $id0 = $id0[0]['m_id'];
            $id0++;
            
            // Ahora si lo va a insertar.
            $tabla->execute("INSERT INTO 'clientes'('id', 'nombre_comercial', 'razon_social', 'rfc') VALUES ($id0,'$ncomercial','','');");
        }
        return $id0;
    }

    public function insertProject($project, $tipo, $instrucciones)
    {

        $tabla = ConnectionManager::get('default');


        try {

            $tabla->insert('proyectos', [
                        'f_inicio' => $project->f_inicio,
                        'f_final' => $project->f_final,
                        'estatus' => $project->estatus,
                        'clave' => $project->clave,
                        'random' => $project->random,
                        'clientes_id' => $project->clientes_id

                    ]);

            $id = $tabla->execute("SELECT MAX(id) AS m_id FROM proyectos")->fetchAll('assoc');
            $id_pro = $id[0]['m_id'];
            for ($i=0; $i < count($tipo) ; $i++) { 

                $tabla->insert('tipos_proyectos', [
                        'proyectos_id' => $id_pro,
                        'tipos_id' => $tipo[$i],
                        'instrucciones' => $instrucciones[$i]

                    ]);
             
            }

            return 1;
            
        } catch (Exception $e) {
            
            return 0;
        }
       
    }
    public function getajaxclientes($term){
        $tabla = ConnectionManager::get('default');
        $reg = $tabla->execute("SELECT id,nombre_comercial FROM clientes WHERE LCASE(nombre_comercial) LIKE '%$term%'")->fetchAll('assoc');
        //$reg = $tabla->execute("SELECT id,nombre_comercial,LCASE(nombre_comercial) AS nclower FROM Clientes WHERE nclower LIKE '%$term%'")->fetchAll('assoc');
        //$reg = $tabla->execute("SELECT id,nombre_comercial FROM Clientes")->fetchAll('assoc');
        return $reg;
    }
}
?>
