<?php
class ProfesorController extends BaseController {
    private $profesorModel;
    private $usuarioModel;

    public function __construct() {
        $this->profesorModel = $this->model('UsuarioModel');
        $this->usuarioModel = $this->model('UsuarioModel');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function dashboard() {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
            $this->view('pages/auth/login');
            return;
        }

        $idProfesor = $_SESSION['idUsuario'];
        $clases = $this->profesorModel->obtenerClasesPorProfesor($idProfesor);

        $datos = [
            'clases' => $clases,
            'Nombre' => $_SESSION['Nombre']
        ];

        $this->view('pages/profesor/dashboard', $datos);
    }

    public function gestionAlumnos() {
    if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
        $this->view('pages/auth/login');
        return;
    }

    $idProfesor = $_SESSION['idUsuario']; 
    $alumnosRaw = $this->usuarioModel->obtenerAlumnosAgrupadosPorMateria($idProfesor);

    // Agrupar alumnos por materia
    $alumnosPorMateria = [];
    foreach ($alumnosRaw as $alumno) {
    $idMateria = $alumno->idMateria;
    if (!isset($alumnosPorMateria[$idMateria])) {
        $alumnosPorMateria[$idMateria] = [
            'nombreMateria' => $alumno->nombreMateria,
            'nombreCarrera' => $alumno->nombreCarrera, // 👈 Añadido aquí
            'alumnos' => []
        ];
    }

    $alumnosPorMateria[$idMateria]['alumnos'][] = $alumno;
}


    $datos = [
        'alumnosPorMateria' => $alumnosPorMateria
    ];

    $this->view('pages/profesor/gestionAlumnos', ['datos' => $datos]);
    }



   public function materias() {
    if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
        $this->view('pages/auth/login');
        return;
    }

    $idProfesor = $_SESSION['idUsuario'];
    $clases = $this->profesorModel->obtenerClasesPorProfesor($idProfesor);

    $materiasPorTipo = [
        'Grado' => [],
        'Posgrado' => [],
        'Curso' => []
    ];

    $materiasVistas = []; // Para evitar repetidas

    foreach ($clases as $clase) {
        $tipo = $clase->tipoCarrera;
        $idMateria = $clase->idMateria;

        // Evitamos duplicados
        if (!isset($materiasVistas[$idMateria])) {
            $materiasVistas[$idMateria] = true;
            $materiasPorTipo[$tipo][] = $clase;
        }
    }

    $datos = [
        'materiasPorTipo' => $materiasPorTipo,
        'Nombre' => $_SESSION['Nombre']
    ];

    $this->view('pages/profesor/materias', $datos);
}




    public function calendario() {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] !== 'Profesor') {
            $this->view('pages/auth/login');
            return;
        }

        $idProfesor = $_SESSION['idUsuario'];

        $clases = $this->profesorModel->obtenerClasesPorProfesor($idProfesor);


        $datos = ['clases' => $clases];
        $this->view('pages/profesor/calendario', ['clases' => $clases]);

    }
}


