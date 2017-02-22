<?php
namespace App\Controller;
use App\Controller\AppController;
/**
 * Project Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
	public function initialize(){
        parent::initialize();
        //$this->loadModel('Projects');
    }
	public function nuevo()
    {
    	$listaclientes = $this->Projects->getClientes();
        /*$listaclientes = [['id'=> 0,'nombre_comercial'=> 'Bimbo'],
                          ['id'=> 1,'nombre_comercial'=> 'Aceros TAMSA'],
                          ['id'=> 2,'nombre_comercial'=> 'Google'],
                          ['id'=> 3,'nombre_comercial'=> 'HP'],
                          ['id'=> 4,'nombre_comercial'=> 'La Michoacana']];*/
    	$listaclientes = json_decode(json_encode($listaclientes,JSON_PRETTY_PRINT));
        
    	//$tipos_projects = $this->Projects->getTipos();
        $tipos_projects = [['id' => 0, 'tipo' => 'Clima Organizacional'],
                           ['id' => 1, 'tipo' => 'Liderazgo'],
                           ['id' => 2, 'tipo' => 'Competencias']];
    	$tipos_projects = json_decode(json_encode($tipos_projects,JSON_PRETTY_PRINT));
    	$this->set('clientes',$listaclientes);
    	$this->set('tipos',$tipos_projects);
        $this->render();
    }
    public function creaProyectos__(){
    	$this->autoRender = false;
        //echo json_encode($_POST);
        //echo "<pre>";
        print_r($_POST);
        //echo "</pre>";
    }
    public function creaProyectos()
    {
    	$this->autoRender = false;
    	$project = $this->Projects->newEntity();
        $tipos = $_POST['ck'];
    	$instrucciones=[];
    	
    	$cliente="";
    	$i=0;
    	if($this->request->is('post'))
    	{
    		// print_r($_POST);
    		if(isset($_POST["cliente_id"]))
            {
            	/*$cliente = explode("*", $_POST["cliente"]);
                $project->clientes_id=$cliente[0];*/
                //$_POST["cliente"];
                $project->clientes_id=$_POST["cliente_id"];
            }
            for($i=0;$i<count($tipos);$i++){
                $tipon = $tipos[$i];
                $instrucciones[] = $_POST["tx$tipon"];
            }
            /*if(isset($_POST["ckClima"]))
            {
                $tipos[$i]=$_POST["ckClima"];
                if(isset($_POST["txClima"]))
	            {
	                $instrucciones[$i]=$_POST["txClima"];
	            }
	            $i++;
            }
            if(isset($_POST["ckLider"]))
            {
                $tipos[$i]=$_POST["ckLider"];
                if(isset($_POST["txLider"]))
	            {
	                $instrucciones[$i]=$_POST["txLider"];
	            }
	            $i++;
            }
            if(isset($_POST["ckCompetencia"]))
            {
                $tipos[$i]=$_POST["ckCompetencia"];
                if(isset($_POST["txCompetencia"]))
	            {
	                $instrucciones[$i]=$_POST["txCompetencia"];
	            }
	            $i++;
            }*/
            if(isset($_POST["clave"]))
            {
            	if ($_POST["clave"]=="corto")
            	{
            		//$project->clave = $cliente[1];
            		$project->clave = $_POST["cliente_clv"];
            	}
            	else if ($_POST["clave"]=="personalizado")
            	{
            		$project->clave=$_POST["txClave"];
            	}
                
            }
            if(isset($_POST["desde"]))
            {
                $project->f_inicio=$_POST["desde"];
            }
            if(isset($_POST["hasta"]))
            {
                $project->f_final=$_POST["hasta"];
            }
            if(isset($_POST["random"]))
            {
                $project->random=$_POST["random"];
            }
            else if (!isset($_POST["random"]))
            {
            	$project->random="no";
            }
            $project->estatus = "nuevo";
           	//$return = $this->Projects->insertProject($project,$tipos,$instrucciones);
           
           	echo $return;
     
    	}
    	
    }
    public function obtenclientes(){
        $this->autoRender = false;
        /*$datos = ["ActionScript","AppleScript","Asp","BASIC","C","C++","Clojure","COBOL","ColdFusion","Erlang","Fortran","Groovy","Haskell","Java","JavaScript","Lisp","Perl","PHP","Python","Ruby","Scala","Scheme"];*/
        // En lugar de esto, hay que obtenerlo del modelo como un
        // SELECT * FROM ___ WHERE nombre_comercial LIKE '%$term%'
        /*$datos = [['label' => 'Bimbo', 'value'=> 0, 'clave' =>'Bimbo'],
                  ['label' => 'Comercial Mexicana', 'value'=> 1, 'clave' =>'COMER'],
                  ['label' => 'La michoacana', 'value'=> 2, 'clave' =>'mich']];
        $elget = strtolower($this->request->query('term'));
        $datos1 = [];
        foreach($datos as $key => $val) {
            $stringv = strtolower($val['label']);
            if (strpos($stringv, $elget) !== FALSE)
                $datos1[] = $val;
        }*/
        // Este obtiene los datos del GET
        $term = $this->request->query('term');
        $term = strtolower($term);
        $datos = $this->Projects->getajaxclientes($term);
        $datos1 = [];
        foreach($datos as $dt){
            $datos1[] = ['label'=> $dt['nombre_comercial'],'value'=>$dt['id'],'clave'=> $dt['nombre_comercial']];
        }
        echo json_encode($datos1);
    }
    public function darloscampospr(){
        $this->autoRender = false;
        // Esta serviría para dar los campos en formato json.
        // ignoro si es util o puede quitarse.
        $colsdb = ['id','nombre_comercial','tipo','f_inicio','f_final','estatus'];
        echo json_encode($colsdb);
    }
    public function muestrajsonact(){
        $this->autoRender = false;
        $proysactiv = $this->Projects->getProys(true);
        
        // escribir el json de #proysactiv.
        // DataTables.js pide un prefijo, que por ejemplo, si
        // es 'proyectos', entonces lo pediria asi:
        /*$(document).ready(function() {
            $('#example').DataTable( {
                "ajax": "weather/projects/muestrajsonact",
                "columns": [
                    { "proyectos": "id" },
                    { "proyectos": "nombre_comercial" },
                    { "proyectos": "tipo" },
                    { "proyectos": "f_inicio" },
                    { "proyectos": "f_final" },
                    { "proyectos": "estatus" }
                ]
            } );
        } );
        */
        // ese es el ejemplo de lectura.
        echo json_encode(['proyectos' => $proysactiv]);
    }
}
?>