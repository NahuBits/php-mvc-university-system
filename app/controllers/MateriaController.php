<?php
class MateriaController extends BaseController{
    private $materiaModel;
    private $carreraModel;
    private $usuarioModel;
    private $materiaDictadoModel;

    public function __construct() {
        $this->materiaModel = $this->model('MateriaModel');
        $this->carreraModel =  $this->model('CarrerasModel'); 
        $this->usuarioModel = $this->model('UsuarioModel');
        $this->materiaDictadoModel = $this->model('MateriaDictadoModel');
    }

    //Metodo para cargar la vista crear.php
    public function crear() {
        $this->view('pages/materia/crear');
    }

    //Metodo para crear una Materia en la vista crear.php
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreMateria = trim($_POST['nombreMateria'] ?? '');
    
            if ($nombreMateria === '') {
                $data = ['mensaje' => 'El nombre de la materia es obligatorio.'];
                $this->view('pages/materia/crear', $data);
                exit;
            }
    
            // Verificar si la materia ya existe
            if ($this->materiaModel->existeMateria($nombreMateria)) {
                $data = ['mensaje' => 'Ya existe una materia con ese nombre.'];
                $this->view('pages/materia/crear', $data);
                exit;
            }
    
            // Crear la materia
            $idMateria = $this->materiaModel->crearMateria($nombreMateria);
            if ($idMateria) {
                $data = ['mensaje' => 'Materia creada exitosamente.'];
            } else {
                $data = ['mensaje' => 'Error al guardar la materia.'];
            }
    
            $this->view('pages/materia/crear', $data);
            exit;
        }
    }

    public function modificarMaterias() {
    $nombreBuscado = $_GET['nombre'] ?? null;

    if ($nombreBuscado) {
        $materias = $this->materiaModel->buscarMateriasPorNombre($nombreBuscado);
    } else {
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
    }

    $this->view('pages/materia/modificarMaterias', [
        'materias' => $materias,
        'nombre' => $nombreBuscado
    ]);
    }

    public function editarMateria($id) {
    $materia = $this->materiaModel->obtenerMateriaPorId($id);

    if (!$materia) {
        $_SESSION['errorRegistro'] = 'Materia no encontrada.';
        header('Location: ' . RUTA_URL . '/MateriaController/modificarMaterias');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nuevoNombre = trim($_POST['nombreMateria']);
        
        if ($nuevoNombre === '') {
            $data = ['error' => 'El nombre no puede estar vacío.', 'materia' => $materia];
            $this->view('pages/materia/editarMateria', $data);
            return;
        }

        // Validar nombre repetido (excepto si es el mismo de la materia actual)
        if (strtolower($nuevoNombre) !== strtolower($materia->nombreMateria) &&
            $this->materiaModel->existeMateria($nuevoNombre)) {
            $data = ['error' => 'Ya existe una materia con ese nombre.', 'materia' => $materia];
            $this->view('pages/materia/editarMateria', $data);
            return;
        }

        if ($this->materiaModel->actualizarMateria($id, $nuevoNombre)) {
            $_SESSION['mensaje'] = 'Materia actualizada correctamente.';
        } else {
            $_SESSION['errorRegistro'] = 'Error al actualizar la materia.';
        }

        header('Location: ' . RUTA_URL . '/MateriaController/modificarMaterias');
        exit;
    }

    $this->view('pages/materia/editarMateria', ['materia' => $materia]);
    }

    //Eliminar Materias
    public function eliminarMateria($id) {
    if ($this->materiaModel->eliminarMateria($id)) {
        $_SESSION['mensaje'] = 'Materia eliminada correctamente.';
    } else {
        $_SESSION['errorRegistro'] = 'No se pudo eliminar la materia.';
    }

    header('Location: ' . RUTA_URL . '/MateriaController/modificarMaterias');
    exit;
    }

    //dar de alta materia eliminada
    public function activarMateria($id) {
    if ($this->materiaModel->activarMateria($id)) {
        $_SESSION['mensaje'] = 'Materia reactivada correctamente.';
    } else {
        $_SESSION['errorRegistro'] = 'No se pudo reactivar la materia.';
    }

    header('Location: ' . RUTA_URL . '/MateriaController/materiasEliminadas');
    exit;
    }

    //ver materias eliminadas
    public function materiasEliminadas() {
    $materias = $this->materiaModel->obtenerMateriasEliminadas();
    $this->view('pages/materia/materiasEliminadas', ['materias' => $materias]);
    }


    
    //Metodo para cargar las materias, carreras y profesores en la vista vincular.php
    public function vincular() {
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
        $carreras = $this->carreraModel->obtenerTodasLasCarreras();
        $profesores = $this->usuarioModel->obtenerProfesores();

      //  var_dump($materias, $carreras, $profesores); exit;  // Temporal para ver qué contienen
       $this->view('pages/materia/vincular', [   
        'materias' => $materias,
        'carreras' => $carreras,
        'profesores' => $profesores
    ]);
    }

    //Metodo para la Planificacion de las Materias 
    public function vincularGuardar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $IDmateriadictado = $_POST['id'] ?? null;
        $idMateria = $_POST['idMateria'] ?? null;
        $idCarrera = $_POST['idCarrera'] ?? null;
        $idProfesor = $_POST['idProfesor'] ?? null;
        $cuatrimestre = $_POST['cuatrimestre'] ?? null;
        $turno = $_POST['turno'] ?? null;
        $diaCursadaArray = $_POST['diaCursada'] ?? null;
        $horaInicio = $_POST['horaInicio'] ?? null;
        $horaFin = $_POST['horaFin'] ?? null;

        $diaCursada = is_array($diaCursadaArray) ? implode(', ', $diaCursadaArray) : null;

        // Traer datos para validación
        $carrera = $this->carreraModel->obtenerCarreraPorId($idCarrera);

        // Cargar siempre estas variables para la vista
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
        $carreras = $this->carreraModel->obtenerTodasLasCarreras();
        $profesores = $this->usuarioModel->obtenerProfesores();

        // Validaciones básicas
        if (!$idMateria || !$idCarrera || !$idProfesor || !$turno || !$diaCursada || !$horaInicio || !$horaFin) {
            $data['mensaje_error'] = "Complete todos los campos obligatorios.";
        } elseif ($horaInicio >= $horaFin) {
            $data['mensaje_error'] = "La hora de inicio debe ser anterior a la hora de fin.";
        } elseif ($carrera && $carrera->tipoCarrera !== 'Curso') {
            if (!$cuatrimestre) {
                $data['mensaje_error'] = "Debe seleccionar un cuatrimestre para carreras.";
            } else {
                $cuatrimestre = (int) $cuatrimestre;
                $cuatrimestresMax = ($carrera->duracion_anios ?? 0) * 2;
                if ($cuatrimestre < 1 || $cuatrimestre > $cuatrimestresMax) {
                    $data['mensaje_error'] = "El cuatrimestre seleccionado no es válido.";
                }
            }
        }

        // Validar que la hora esté dentro del turno
        $rangosTurnos = [
            'Mañana' => ['08:00', '12:00'],
            'Tarde' => ['13:00', '17:00'],
            'Noche' => ['18:00', '22:00'],
        ];

        if (!isset($rangosTurnos[$turno]) || $horaInicio < $rangosTurnos[$turno][0] || $horaFin > $rangosTurnos[$turno][1]) {
            $data['mensaje_error'] = "Las horas no corresponden al rango permitido para el turno seleccionado.";
        }

        // Si es curso, forzar cuatrimestre a 0
        if ($carrera && $carrera->tipoCarrera === 'Curso') {
            $cuatrimestre = 0;
        }

        // Verificar solapamientos con el mismo profesor
        if (empty($data['mensaje_error'])) {
            $dias = explode(', ', $diaCursada);
            foreach ($dias as $dia) {
                if ($this->materiaDictadoModel->profesorTieneConflicto($idProfesor, $dia, $horaInicio, $horaFin, null)) {
                    $data['mensaje_error'] = "El profesor ya tiene asignada una materia los $dia en ese horario.";
                    break;
                }
            }
        }

        // Guardar si no hubo errores
        if (empty($data['mensaje_error'])) {
            $ok = $this->materiaDictadoModel->asignarMateriaACarrera(
                $idMateria,
                $idCarrera,
                $idProfesor,
                $cuatrimestre,
                $turno,
                $diaCursada,
                $horaInicio,
                $horaFin
            );

            if ($ok) {
                $data['mensaje_exito'] = "Materia vinculada correctamente.";
            } else {
                error_log("Error: no se pudo insertar en la tabla materiadictado. Verifique los datos.");
                $data['mensaje_error'] = "Error al vincular la materia. Consulte con soporte.";
            }
        }

        // Enviar a la vista
        $data['materias'] = $materias;
        $data['carreras'] = $carreras;
        $data['profesores'] = $profesores;

        $this->view('pages/materia/vincular', $data);
    }
    }



    public function verMateriasDictado(){
        $materiasDictado = $this->materiaDictadoModel->listarMateriasDictado();
        $data = [
        'error' => '',
        'mensaje' => '',
        'MateriasDictado' => $materiasDictado
        ];
        $this->view('pages/admin/VerMateriaDictada', $data);
    }



    public function VerMateriaDictadoSelect(){
            if (!isset($_GET['id'])) {
            // Redirigí o mostrá error si no viene ID
            die("ID no proporcionado");
            }
        $id = $_GET['id'];
        $MateriaDictado = $this->materiaDictadoModel->obtenerMateriaDictadoPorId($id);
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
        $carreras = $this->carreraModel->obtenerTodasLasCarreras();
        $profesores = $this->usuarioModel->obtenerProfesores();
        $data = [
            'error' => '',
            'mensaje' => '',
            'MateriaDictado' => $MateriaDictado,
            'materias' => $materias,
            'carreras' => $carreras,
            'profesores' => $profesores,
            
        ];

        $this->view('pages/admin/editarMateriaDictado', $data);
    }
    public function editarMateriaDictado(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $IDmateriadictado = $_POST['id'] ?? null;
        $idMateria = $_POST['idMateria'] ?? null;
        $idCarrera = $_POST['idCarrera'] ?? null;
        $idProfesor = $_POST['idProfesor'] ?? null;
        $cuatrimestre = $_POST['cuatrimestre'] ?? null;
        $turno = $_POST['turno'] ?? null;
        $diaCursadaArray = $_POST['diaCursada'] ?? null;
        $horaInicio = $_POST['horaInicio'] ?? null;
        $horaFin = $_POST['horaFin'] ?? null;

        $diaCursada = is_array($diaCursadaArray) ? implode(', ', $diaCursadaArray) : null;
        $carrera = $this->carreraModel->obtenerCarreraPorId($idCarrera);

        // Cargar siempre estas variables para la vista
        $materias = $this->materiaModel->obtenerTodasLasMaterias();
        $carreras = $this->carreraModel->obtenerTodasLasCarreras();
        $profesores = $this->usuarioModel->obtenerProfesores();

        // Validaciones básicas
        if (!$idMateria || !$idCarrera || !$idProfesor || !$turno || !$diaCursada || !$horaInicio || !$horaFin) {
            $data['error'] = "Complete todos los campos obligatorios.";
        } elseif ($horaInicio >= $horaFin) {
            $data['error'] = "La hora de inicio debe ser anterior a la hora de fin.";
        } elseif ($carrera && $carrera->tipoCarrera !== 'Curso') {
            if (!$cuatrimestre) {
                $data['error'] = "Debe seleccionar un cuatrimestre para carreras.";
            } else {
                $cuatrimestre = (int) $cuatrimestre;
                $cuatrimestresMax = ($carrera->duracion_anios ?? 0) * 2;
                if ($cuatrimestre < 1 || $cuatrimestre > $cuatrimestresMax) {
                    $data['error'] = "El cuatrimestre seleccionado no es válido.";
                }
            }
        }

        $rangosTurnos = [
            'Mañana' => ['08:00', '12:00'],
            'Tarde' => ['13:00', '17:00'],
            'Noche' => ['18:00', '22:00'],
        ];

        if (!isset($rangosTurnos[$turno]) || $horaInicio < $rangosTurnos[$turno][0] || $horaFin > $rangosTurnos[$turno][1]) {
            $data['error'] = "Las horas no corresponden al rango permitido para el turno seleccionado.";
        }

        if ($carrera && $carrera->tipoCarrera === 'Curso') {
            $cuatrimestre = 0;
        }

        // Verificar solapamientos con el mismo profesor
        if (empty($data['error'])) {
            $dias = explode(', ', $diaCursada);
            foreach ($dias as $dia) {
                if ($this->materiaDictadoModel->profesorTieneConflicto($idProfesor, $dia, $horaInicio, $horaFin, $IDmateriadictado)) {
                    $data['error'] = "El profesor ya tiene asignada una materia los $dia en ese horario.";
                    break;
                }
            }
        }
        if (empty($data['error'])) {
            $ok = $this->materiaDictadoModel->EditarMateriaDictado(
                $IDmateriadictado,
                $idMateria,
                $idCarrera,
                $idProfesor,
                $cuatrimestre,
                $turno,
                $diaCursada,
                $horaInicio,
                $horaFin
            );

            if ($ok) {
                $data['mensaje'] = "Materia editada correctamente.";
            } else {
                error_log("Error: no se pudo editar en la tabla materiadictado. Verifique los datos.");
                $data['mensaje_error'] = "Error al editar la materia. Consulte con soporte.";
            }
            
        }
            $materiasDictado = $this->materiaDictadoModel->listarMateriasDictado();
            $data['MateriasDictado'] = $materiasDictado;
            return $this->view('pages/admin/VerMateriaDictada', $data);
    }
}

    public function EliminarMateriaDictado(){
         if (!isset($_GET['id'])) {
            // Redirigí o mostrá error si no viene ID
            die("ID no proporcionado");
            }
        $materiasDictado = $this->materiaDictadoModel->listarMateriasDictado();
        $id = $_GET['id'];
        if($this->materiaDictadoModel->EliminarMateriaDictado($id)){
            
            $materiasDictado = $this->materiaDictadoModel->listarMateriasDictado();
            $data = [
                    'mensaje' =>  'Materia dictado eliminado.',
                    'MateriasDictado' => $materiasDictado
                ];
        }else{
            $data = [
                    'mensaje' =>  'Error al eliminar Materia dictado.',
                    'MateriasDictado' => $materiasDictado
                ];
        }
        $this->view('pages/admin/VerMateriaDictada', $data);
    }
        private function actualizarDatosDeSession(){
        $dato = [
                    'email' => $_SESSION['Email']
                ];
        $materiasDictado = $this->materiaDictadoModel->listarMateriasDictado();;

    }
    
}
