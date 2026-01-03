<?php
class AlumnoController extends BaseController {
    private $AlumnoModel;
    private $MateriaModel;

    public function __construct() {
        $this->AlumnoModel = $this->model('AlumnoModel');
        $this->MateriaModel = $this->model('MateriaModel');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function dashboard() {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

         //  Siempre consulta a la base de datos
        $grado = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Grado');
        $postgrado = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Posgrado');
        $cursos = $this->AlumnoModel->obtenerCarrerasInscripto($idAlumno, 'Curso');

        $data = [
            'grado' => $grado,
            'postgrado' => $postgrado,
            'cursos' => $cursos,
            'Nombre' => $_SESSION['Nombre']
        ];

        $this->view('pages/alumno/dashboard', $data);
    }

    public function inscribirse($idCarrera) {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

            //  Verificar si ya está inscripto
        if ($this->AlumnoModel->yaInscripto($idAlumno, $idCarrera)) {
            $_SESSION['error'] = 'Ya estás inscripto en esta carrera.';
            header('Location: ' . RUTA_URL . '/AlumnoController/verCarreras');
            exit;
    }



        if ($this->AlumnoModel->inscribirseCarrera($idAlumno, $idCarrera)) {
            $_SESSION['mensaje'] = 'Inscripción exitosa.';
        } else {
            $_SESSION['error'] = 'Error al inscribirse.';
        }

        // Redirige al dashboard para ver las inscripciones actualizadas
        header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
        exit;
    }

    public function desinscribirse($idCarrera) {
        if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];

        if ($this->AlumnoModel->desinscribirseCarrera($idAlumno, $idCarrera)) {
            $_SESSION['mensaje'] = 'Te desinscribiste correctamente.';
        } else {
            $_SESSION['error'] = 'Error al desinscribirse.';
        }

        header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
        exit;
    }

    public function verCarreras() {
        if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
            $this->view('pages/auth/login');
            return;
        }

        $idAlumno = $_SESSION['idUsuario'];
        $carreras = $this->AlumnoModel->obtenerCarrerasDisponibles();

        // Obtener las IDs de las carreras en las que el alumno ya está inscripto
       $carrerasInscriptasIds = [];
        $inscripciones = $this->AlumnoModel->obtenerTodasLasInscripcionesDeAlumno($idAlumno); // Nuevo método en AlumnoModel
        foreach ($inscripciones as $inscripcion) {
            $carrerasInscriptasIds[] = $inscripcion->idCarrera;
        }

        // Agregar materias a cada carrera (para el "Ver Contenido" o "Ver Plan de Estudios")
        foreach ($carreras as $carrera) {
            $carrera->materias = $this->AlumnoModel->obtenerMateriasPorCarrera($carrera->idCarrera);
        }

        $data = [
            'carreras' => $carreras,
            'idAlumno' => $idAlumno,
            'Nombre' => $_SESSION['Nombre'],
            'carrerasInscriptasIds' => $carrerasInscriptasIds // Pasar al template
        ];

        $this->view('pages/alumno/verCarreras', $data);

}


public function obtenerMaterias($idCarrera) {
    $modelo = $this->modelo('AlumnoModel');
    $materias = $modelo->obtenerMateriasPorCarrera($idCarrera);
    echo json_encode($materias);
}

 public function mostrarMaterias($idCarrera) {
    $modelo = $this->model('AlumnoModel');

    $materias = $modelo->obtenerMateriasPorCarrera($idCarrera);
    $nombreCarrera = $modelo->obtenerNombreCarrera($idCarrera);

    $this->view('alumno/materiasCarrera', [
        'materias' => $materias,
        'nombreCarrera' => $nombreCarrera
    ]);
}

public function verMaterias($idCarrera) {
    $this->materiaModelo = $this->model('MateriaModel');
    $this->carreraModelo = $this->model('CarrerasModel'); // ojo: es CarrerasModel con S

    $materias = $this->materiaModelo->obtenerMateriasPorCarrera($idCarrera);
    $carrera = $this->carreraModelo->obtenerCarreraPorId($idCarrera);
    $nombreCarrera = $carrera ? $carrera->nombreCarrera : 'Carrera desconocida';

    $datos = [
        'materias' => $materias,
        'nombreCarrera' => $nombreCarrera
    ];

    $this->view('pages/alumno/materiasCarrera', $datos);
}

public function getMaterias($idCarrera) {
    ini_set('display_errors', 1); // Forzar la visualización de errores
    ini_set('display_startup_errors', 1); // Forzar la visualización de errores de inicio
    error_reporting(E_ALL);
    ob_start();

    if (!isset($_SESSION['idUsuario']) || $_SESSION['tipoUsuario'] != 'Alumno') {
        http_response_code(403);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No autorizado']);
        exit;
    }

    $materias = $this->MateriaModel->obtenerMateriasPorCarrera($idCarrera);

    $resultado = [];
    if ($materias) {
        foreach ($materias as $materia) {
            $resultado[] = array(
                'nombreMateria' => $materia->nombreMateria,
                'nombreProfesor' => $materia->nombreProfesor,
                'apellidoProfesor' => $materia->apellidoProfesor,
                'cuatrimestre' => $materia->cuatrimestre,
                'turno' => $materia->turno,
                'DiaCursada' => $materia->DiaCursada,
                'horaInicio' => date("H:i", strtotime($materia->horaInicio)),
                'horaFin' => date("H:i", strtotime($materia->horaFin))
            );
        }
        //header('Content-Type: application/json');
        //echo json_encode($resultado);
    } else {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No se encontraron materias para esta carrera']);
        exit;
    }

    $output = ob_get_clean();

    if (!empty($output)) {
        // Si hay output inesperado (fuera de nuestro control), envíalo como texto plano
        http_response_code(500);
        header('Content-Type: text/plain'); // Cambiamos a texto plano para ver el contenido HTML/error
        echo "ERROR DETECTADO EN LA SALIDA DEL PHP (DEPURACIÓN):\n";
        echo "Causa: Se imprimió contenido inesperado antes del JSON final.\n";
        echo "Contenido Inesperado:\n";
        echo $output; // Muestra lo que se imprimió antes
        echo "\n--- FIN DE OUTPUT INESPERADO ---\n";
        exit; // Termina la ejecución aquí si hubo un problema
    }
    // --- FIN CÓDIGO DE DEPURACIÓN ---

    // 4. Si todo está bien y no hubo output inesperado, envía el JSON
    header('Content-Type: application/json');
    echo json_encode($resultado); // Ahora sí, el resultado esperado
    exit;
}
}