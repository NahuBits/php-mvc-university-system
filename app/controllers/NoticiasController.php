<?php

class NoticiasController extends BaseController {
    private $NoticiasModel;
    public function __construct() {
        $this->NoticiasModel=$this->model('NovedadesModel');
    }
    public function gestionNoticias(){

    }
    public function AdminNoticias(){
    $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
        $data = [
        'error' => '',
        'mensaje' => '',
        'novedades' => $novedades
        ];
        $this->view('pages/admin/AdminNoticias', $data);

    }

    public function CrearNoticia(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Titulo = $_POST['titulo'];
            $Descripcion = $_POST['descripcion'];
            $Activo = isset($_POST['activo']) ? 1 : 0;
            $Selecionado = isset($_POST['seleccionado']) ? 1 : 0;
            if ($Titulo === '' || $Descripcion === '') {
                $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
                $data = ['novedades' => $novedades, 'error' => 'Los campos son obligatorios'];
                return $this->view('pages/admin/AdminNoticias', $data);
            }
            if ($this->NoticiasModel->NoticiaTituloExiste($Titulo, null)) {
                $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
                $data = ['novedades' => $novedades, 'error' => 'Ya existe una noticia con este titulo.'];
                return $this->view('pages/admin/AdminNoticias', $data);
            }

            if($this->NoticiasModel->CrearNoticias($Titulo, $Descripcion, $Activo, $Selecionado)){
                $data = ['mensaje' => 'Noticia creada.'];
            }else{
                $data = ['error' => 'No fue posible crear la noticia'];
            }
            
            
            $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
            $data = ['novedades' => $novedades];
            return $this->view('pages/admin/AdminNoticias', $data);    
        }
            $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
            $data = ['novedades' => $novedades];
         $this->view('pages/admin/AdminNoticias', $data);
    }





     public function ActualizarSeleccionado(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $Selecionado = $_POST['seleccionado'];
                $id = $_POST['idNovedad'];
                if($this->NoticiasModel->ActualizarSelecionado($id, $Selecionado)){
                    $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
                    
                    
                    $data = [
                    'error' => '',
                    'mensaje' => 'Seleccion modficada',
                    'novedades' => $novedades
                    ];
                    return $this->view('pages/admin/AdminNoticias', $data);
                }
                $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
                    
                    
                    $data = [
                    'error' => '',
                    'mensaje' => 'Seleccion modficada',
                    'novedades' => $novedades
                    ];
            $this->view('pages/admin/AdminNoticias', $data);
            }
        }
    public function EditarNoticiaVista(){
            if (!isset($_GET['id'])) {
            // Redirigí o mostrá error si no viene ID
            die("ID no proporcionado");
            }
            $id = $_GET['id'];        
            $novedades = $this->NoticiasModel->ObtenerNoticiaPorId($id);
            $data = [
            'error' => '',
            'mensaje' => '',
            'novedades' => $novedades
            ];
        $this->view('pages/admin/EditarNoticias', $data);
    }
    public function EditarNoticia(){
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $Titulo = $_POST['titulo'];
            $Descripcion = $_POST['descripcion'];
            $Activo = isset($_POST['activo']) ? 1 : 0;
            $Selecionado = isset($_POST['seleccionado']) ? 1 : 0;
            if ($Titulo === '' || $Descripcion === '') {
                $novedades = $this->NoticiasModel->ObtenerNoticiaPorId($id);
                $data = ['novedades' => $novedades, 'error' => 'Los campos son obligatorios'];
                return $this->view('pages/admin/EditarNoticias', $data);
            }
            if ($this->NoticiasModel->NoticiaTituloExiste($Titulo, $id)) {
                $novedades = $this->NoticiasModel->ObtenerNoticiaPorId($id);
                $data = ['novedades' => $novedades, 'error' => 'Ya existe una noticia con este titulo.'];
                return $this->view('pages/admin/EditarNoticias', $data);
            }

            if($this->NoticiasModel->EditarNoticia($id, $Titulo, $Descripcion, $Activo, $Selecionado)){
                $novedades = $this->NoticiasModel->ObtenerNoticiaPorId($id);
                $data = ['novedades' => $novedades, 'mensaje' => 'Noticia editada.'];
                return $this->view('pages/admin/EditarNoticias', $data); 
            }else{
                $novedades = $this->NoticiasModel->ObtenerNoticiaPorId($id);
                $data = ['novedades' => $novedades, 'error' => 'No fue posible editar esta noticia.'];
                return $this->view('pages/admin/EditarNoticias', $data); 
            }
            
               
        }
            $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
            $data = ['novedades' => $novedades];
             $this->view('pages/admin/AdminNoticias', $data);
    }
    

    public function EliminarNoticia(){
        if (!isset($_GET['id'])) {
            // Redirigí o mostrá error si no viene ID
            die("ID no proporcionado");
        }
        $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
        $id = $_GET['id'];
        if($this->NoticiasModel->EliminarNoticias($id)){
            
            $novedades = $this->NoticiasModel->ObtenerTodasLasNoticias();
            $data = [
                    'mensaje' =>  'Noticia Eliminada.',
                    'novedades' => $novedades
                ];
        }else{
            $data = [
                    'mensaje' =>  'Error la noticia.',
                    'novedades' => $novedades
                ];
        }
        return $this->view('pages/admin/AdminNoticias', $data);
    }


}



?>