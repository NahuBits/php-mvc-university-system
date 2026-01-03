<?php
class Pages extends BaseController {
    private $CarrerasModel;
    private $NovedadesModel;
    public function __construct() {
        $this->CarrerasModel = $this->model('CarrerasModel');
        $this->NovedadesModel = $this->model('NovedadesModel');
    }

    public function index() {
        $novedades = $this->NovedadesModel->ObtenerNoticiasSelecionadas();
        $data = [
            "title" => "Bienvenido",
            "novedades" => $novedades
        ];
        $this->view('pages/index', $data);
    }

    public function infoCursos() {
        $cursos = $this->CarrerasModel->obtenerCursos();

        $data['cursos'] = array_map(function($curso) {
            return [
                'titulo' => $curso->nombreCarrera,
                'descripcion' => $curso->descripcionMuestra,
                'imagen' => $curso->rutaImagenMuestra,
                'descripcionCompleta' => $curso->descripcionCompletaSideBar
            ];
        }, $cursos);

        $data['title'] = 'Cursos disponibles';

        $this->view('pages/infoCarreras/infoCursos', $data);
    }
    public function infoCarrerasDeGrado() {
    
        $carreras = $this->CarrerasModel->obtenerCarrerasDeGrado();
        $data['infoCarrerasDeGrado'] = array_map(function($carrera) {
            return [
                'titulo' => $carrera->nombreCarrera,  
                'descripcion' => $carrera->descripcionMuestra,
                'imagen' => $carrera->rutaImagenMuestra,
                'descripcionCompleta' => $carrera->descripcionCompletaSideBar
            ];
        }, $carreras);
    
        $data['title'] = 'Carreras de Grado';
    
       
        $this->view('pages/infoCarreras/infoCarrerasDeGrado', $data);
    }
    
    public function infoPostGrado() {
        
        $carreras = $this->CarrerasModel->obtenerCarrerasDePostGrado();
    
        $data['infoPostGrado'] = array_map(function($carrera) {
            return [
                'titulo' => $carrera->nombreCarrera, 
                'descripcion' => $carrera->descripcionMuestra,
                'imagen' => $carrera->rutaImagenMuestra,
                'descripcionCompleta' => $carrera->descripcionCompletaSideBar
            ];
        }, $carreras);
        
        $data['title'] = 'Carreras de Postgrado';
    
        $this->view('pages/infoCarreras/infoPostGrado', $data);
    }

    public function UsuarioMenu()
{
    // Asegurate de que la sesión esté iniciada
    if (!isset($_SESSION['tipoUsuario']) || !isset($_SESSION['Nombre'])) {
        // Redirigí al login o a una página de error si no hay sesión activa
        header('Location: ' . RUTA_URL . '/AuthController/login');
        exit;
    }

    $tipoUsuario = $_SESSION['tipoUsuario'];
    $nombre = $_SESSION['Nombre'];

    $data = [
        'tipoUsuario' => $tipoUsuario,
        'Nombre' => $nombre
    ];

    // Redirigí a la vista correspondiente según el tipo de usuario
    switch ($tipoUsuario) {
        case 'admin':
            $this->view('pages/admin/dashboard', $data);
            break;
        case 'Profesor':
            $this->view('pages/profesor/dashboard', $data);
            break;
        case 'Alumno':
            //$this->view('pages/alumno/dashboard', $data);
            header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
            break;
        default:
            // Si el tipo no es válido, podés redirigir a un error o logout
            header('Location: ' . RUTA_URL . '/AuthController/logout');
            exit;
    }
}



    
    //Funcion para Preguntas Frecuentes 
    public function preguntasFrecuentes() {
    $this->view('pages/infoCarreras/preguntasFrecuentes');

    }


    //Vistas Dashboard Profesor y enlaces.

    public function dashboard() {
    if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
        header('Location: ' . RUTA_URL . '/AuthController/login');
        exit;
    }

    require RUTA_APP . 'pages/profesor/dashboard';
}

// Dashboard Alumno
 public function dashboardAlumno() {
    $alumnoModel = $this->model('AlumnoModel');

    $grado = $alumnoModel->obtenerCarrerasGrado();
    $posgrado = $alumnoModel->obtenerCarrerasPosgrado();
    $cursos = $alumnoModel->obtenerCursos();

    $datos = [
        'grado' => $grado,
        'posgrado' => $posgrado,
        'cursos' => $cursos,
        'mensaje' => ''
    ];

    // Renderizar la vista con los datos
    $this->view('alumno/dashboard', $datos);
}

}


?>
