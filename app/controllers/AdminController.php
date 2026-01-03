<?php
class AdminController extends BaseController{
    private $CarrerasModel;
    private $UsuarioModel;
    public function __construct() {
        $this->CarrerasModel = $this->model('CarrerasModel');
        $this->UsuarioModel = $this->model('AuthModel');
    }

    //Agregar carrera
    public function agregarCarrera() {

    // Verifica que haya un usuario logueado y que sea admin
    if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] != 'admin') {
        // Si no es admin o no está logueado, redirige al login o a otra página
        $this->view('pages/auth/login');
        //exit();
    }
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // datos del formulario
        $nombreCarrera = trim($_POST['nombreCarrera']);
        $descripcion = trim($_POST['descripcion']);
        $descripcionCompleta = trim($_POST['descripcionCompleta']);
        $tipoCarrera = $_POST['tipoCarrera'];
        $imagen = isset($_FILES['imagen']) ? $_FILES['imagen']['name'] : null;
        $image_type = isset($_FILES['imagen']) ? $_FILES['imagen']['type'] : null;
        $image_size = isset($_FILES['imagen']) ? $_FILES['imagen']['size'] : null;
        $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_IMG_CARRERA;
        $duracionAnios = isset($_POST['duracion_anios']) ? (int)$_POST['duracion_anios'] : null;
        $duracionMeses = isset($_POST['duracion_meses']) ? (int)$_POST['duracion_meses'] : null;

         // Validación: si la carrera ya existe, mostramos error
        if ($this->CarrerasModel->carreraExiste($nombreCarrera)) {
            $data = [
                'errorRegistro' => '<div class="alert alert-danger" role="alert">
                    Ya existe una carrera con ese nombre.
                </div>',
            ];
            $this->view('pages/auth/agregarCarrera', $data);
            return;
        }

        if ($imagen != '') {
            if ($image_size <= 10000000) {
                if ($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png') {
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ubi . $imagen);
                } else {
                    $data = [
                        'errorRegistro' => '<div class="alert alert-danger" role="alert">
                            El tipo de imagen debe ser jpg, jpeg o png.
                          </div>',
                    ];
                    $this->view('pages/auth/agregarCarrera', $data);
                    return;
                }
            } else {
                $data = [
                    'errorRegistro' => '<div class="alert alert-danger" role="alert">
                        El tamaño de la imagen es demasiado grande
                      </div>',
                ];
                $this->view('pages/auth/agregarCarrera', $data);
                return;
            }
        } else {
            $imagen = 'img_default.png';
        }

        if (empty($nombreCarrera) || empty($descripcion) || empty($descripcionCompleta) || empty($tipoCarrera)) {
            echo "Todos los campos son obligatorios.";
            return;
        }
        // Validación de duración según tipo
        if (empty($nombreCarrera) || empty($descripcion) || empty($descripcionCompleta) || empty($tipoCarrera) || empty($imagen)) {
    $data = ['errorRegistro' => 'Todos los campos son obligatorios.'];
    $this->view('pages/auth/agregarCarrera', $data);
    return;
}

        // Validación por tipo
        if ($tipoCarrera === 'Curso') {
            if (empty($duracionMeses) || $duracionMeses < 1 || $duracionMeses > 12) {
                $data = ['errorRegistro' => 'La duración del curso debe estar entre 1 y 12 meses.'];
            $this->view('pages/auth/agregarCarrera', $data);
            return;
            }
            $duracionAnios = null; // Por seguridad
        } elseif ($tipoCarrera === 'Grado' || $tipoCarrera === 'PosGrado') {
            if (empty($duracionAnios) || $duracionAnios < 1 || $duracionAnios > 6) {
                $data = ['errorRegistro' => 'La duración de la carrera debe estar entre 1 y 6 años.'];
                $this->view('pages/auth/agregarCarrera', $data);
                return;
            }
            $duracionMeses = null; // Por seguridad
        } else {
            $data = ['errorRegistro' => 'Tipo de carrera inválido.'];
            $this->view('pages/auth/agregarCarrera', $data);
            return;
        }

        if ($this->CarrerasModel->agregarCarrera($nombreCarrera, $descripcion, $descripcionCompleta, $tipoCarrera, $imagen ,$duracionAnios,
                                                 $duracionMeses)) {
            // Redirigir después de agregar
             $data = ['mensaje' => 'Carrera creada exitosamente.'];
           $this->view('pages/auth/agregarCarrera', $data);
            
        } else {
            $data = [
                'errorRegistro' => 'Error al agregar la carrera.',
            ];
            $this->view('pages/auth/agregarCarrera', $data);
        }
    } else {
        $data = [
            'tipoUsuario' => $_SESSION['tipoUsuario'],
            'Nombre' => $_SESSION['Nombre']
        ];
        $this->view('pages/auth/agregarCarrera', $data);
    }
}
    //editar carrera
    public function editarCarrera($idCarrera) {
    $carrera = $this->CarrerasModel->obtenerCarreraPorId($idCarrera);

    if (!$carrera) {
        $_SESSION['mensaje'] = 'Carrera no encontrada.';
        header('Location: ' . RUTA_URL . '/Pages/UsuarioMenu');
        exit;
    }

    $this->view('pages/admin/editarCarrera', ['carrera' => $carrera]);
    }

    // guardamos la carrera modificada
    public function guardarEdicionCarrera() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idCarrera = $_POST['idCarrera'];
        $nombreCarrera = trim($_POST['nombreCarrera']);
        $descripcion = trim($_POST['descripcion']);
        $descripcionCompleta = trim($_POST['descripcionCompleta']);
        $tipoCarrera = $_POST['tipoCarrera'];
        $duracionAnios = isset($_POST['duracion_anios']) ? (int)$_POST['duracion_anios'] : null;
        $duracionMeses = isset($_POST['duracion_meses']) ? (int)$_POST['duracion_meses'] : null;
        $imagen = $_FILES['imagen']['name'] !== '' ? $_FILES['imagen']['name'] : $_POST['imagen_actual'];
        $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_IMG_CARRERA;

        if ($_FILES['imagen']['name'] !== '') {
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ubi . $imagen);
        }

        // Validar nombre repetido (excepto si es la misma carrera)
        if ($this->CarrerasModel->carreraExiste($nombreCarrera, $idCarrera)) {
            $_SESSION['errorRegistro'] = 'Ya existe una carrera con ese nombre.';
            header('Location: ' . RUTA_URL . "/AdminController/editarCarrera/$idCarrera");
            exit;
        }

        // Validación según tipo
        if ($tipoCarrera === 'Curso') {
            $duracionAnios = null;
        } else {
            $duracionMeses = null;
        }

        if ($this->CarrerasModel->editarCarrera($idCarrera, $nombreCarrera, $descripcion, $descripcionCompleta, $tipoCarrera, $imagen, $duracionAnios, $duracionMeses)) {
                $_SESSION['mensaje'] = 'Carrera modificada exitosamente.';
        } else {
                $_SESSION['errorRegistro'] = 'Error al modificar la carrera.';
        }

        header('Location: ' . RUTA_URL . '/AdminController/listarCarrerasParaEditar');
        exit;
        }
    }
    //ver lista de carreras para poder editar con filtros y busqueda por nombre
    public function listarCarrerasParaEditar() {
    $filtro = $_GET['filtro'] ?? null;
    $nombre = $_GET['nombre'] ?? null;

    $carreras = $this->CarrerasModel->obtenerCarrerasFiltradas($filtro, $nombre, 1);

    $data = [
        'carreras' => $carreras,
        'filtro' => $filtro,
        'nombre' => $nombre
    ];

    $this->view('pages/admin/listarCarreras', $data);
    }

    //ver carreras eliminadas
    public function listarCarrerasEliminadas() {
    $carreras = $this->CarrerasModel->obtenerCarrerasFiltradas(null, null, 0);
    $this->view('pages/admin/listarCarrerasEliminadas', ['carreras' => $carreras]);
    }
    // eliminar carrera
    public function eliminarCarrera($idCarrera) {
    if ($this->CarrerasModel->eliminarCarrera($idCarrera)) {
        $_SESSION['mensaje'] = 'Carrera eliminada correctamente.';
    } else {
        $_SESSION['errorRegistro'] = 'No se pudo eliminar la carrera.';
    }

    header('Location: ' . RUTA_URL . '/AdminController/listarCarrerasParaEditar');
    exit;
    }

    //dar de alta una carrera eliminada
    public function activarCarrera($idCarrera) {
    if ($this->CarrerasModel->activarCarrera($idCarrera)) {
        $_SESSION['mensaje'] = 'Carrera reactivada correctamente.';
    } else {
        $_SESSION['errorRegistro'] = 'No se pudo reactivar la carrera.';
    }

    header('Location: ' . RUTA_URL . '/AdminController/listarCarrerasEliminadas');
    exit;
    }

    
    public function gestionUsuarios(){
     
        $Usuarios = $this->UsuarioModel->obtenerTodosLosUsuarios();
        $data = [
        'error' => '',
        'mensaje' => '',
        'lista' => $Usuarios
        ];
        $this->view('pages/admin/gestionUsuarios', $data);
    }
    public function buscarTodosLosUsuarios(){
        $Usuarios =  $this->UsuarioModel->obtenerTodosLosUsuarios();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            if($Usuarios){
                $tipoFiltro = $_GET['tipoUsuario'] ?? '';

                if(!empty($tipoFiltro)){
                    $UsuariosFiltrado = $this->UsuarioModel->obtenerTodosLosUsuariosPorTipo($tipoFiltro);
                }else{
                    $UsuariosFiltrado = $Usuarios;
                }

                $data = [
                    'lista' =>  $UsuariosFiltrado,
                    'tipoSeleccionado' => $tipoFiltro

                ];


                $this->view('pages/admin/gestionUsuarios', $data);

            }else{
                $data = [
                    'mensaje' => 'Error al buscar los usuarios.'
                ];
                $this->view('pages/admin/gestionUsuarios', $data);
            }
        }

        $this->view('pages/admin/gestionUsuarios');
    }
    //retornar el usuario buscado por ID, a la vista gestionUsuarios
    public function gestionUsuariosbuscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'DNI' => $_POST['dniABuscar'],
            ];
            $TodosUsuarios = $this->UsuarioModel->obtenerTodosLosUsuarios();
            $usuario = $this->UsuarioModel->buscarPorDNI($data);
            if($usuario){
                $data = [
                    'usuarioEncontrado' => (array) $usuario,
                    'lista' => $TodosUsuarios
                ];

            }else{
                $data = [
                    'mensaje' =>  'Usuario no encontrado.'

                ];
            }
            $this->view('pages/admin/gestionUsuarios', $data);      
        }
        $this->view('pages/admin/gestionUsuarios');
    }

//En el momento de apretar el boton eliminar, toma el id del usuario buscado y procede a eliminarlo(Activo == 0)
public function gestionEliminarUsuario(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUser = $_POST['id'];

        if($this->UsuarioModel->eliminarUsuario($idUser)){
            $data = [
                'mensaje' => 'Usuario eliminado'
            ];
        }else{
            $data = [
                'mensaje' => 'No se pudo eliminar el usuario'
            ];
        }
        $this->view('pages/admin/gestionUsuarios', $data);
        }
    }
//En el momento de apretar el boton eliminar, toma el id del usuario buscado y procede a convertirlo en un profesor
public function gestionAsignarProfesor(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUser = $_POST['id'];

        if($this->UsuarioModel->convertirProfesor($idUser)){
            $data = [
                'mensaje' => 'Usuario fue asignado con el cargo de profesor.'
            ];
       }else{
           $data = [
                'mensaje' => 'Este usuario ya es de tipo profesor.'
            ];
        }
        $this->view('pages/admin/gestionUsuarios', $data);    
        }
}
public function gestionAsignarAdmin(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUser = $_POST['id'];

        if($this->UsuarioModel->convertirAdmin($idUser)){
            $data = [
                'mensaje' => 'Usuario fue asignado con el cargo de administrador.'
            ];
       }else{
           $data = [
                'mensaje' => 'Este usuario ya es de tipo administrador.'
            ];
        }
        $this->view('pages/admin/gestionUsuarios', $data);    
        }
}
}
?>


