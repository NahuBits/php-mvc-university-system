<?php
class AuthController extends BaseController {

    public function __construct() {
        $this->authModel=$this->model('AuthModel');
    }
    //login retorna la vista
    public function login(){
        $data = [
            'errorLogin'=>'',
        ];
        $this->view('pages/auth/login', $data);
    }

    //Vista Informacion.php
    public function informacion() {

        $this->view('pages/auth/Informacion');
    }


    // Login
    public function loginUsuario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'email' => $_POST['Email'],
            'pass' => $_POST['password'],
        ];
        
        $UsuarioEncontrado = $this->authModel->buscarPorMail($data);
        if ($UsuarioEncontrado) {
            if (password_verify($data['pass'], $UsuarioEncontrado->ContraUsuario)) { 
                $_SESSION['idUsuario'] = $UsuarioEncontrado->idUsuario;
                $_SESSION['NombreUsuario'] = $UsuarioEncontrado->NombreUsuario;
                $_SESSION['Nombre'] = $UsuarioEncontrado->Nombre;
                $_SESSION['Apellido'] = $UsuarioEncontrado->Apellido;
                $_SESSION['DNI'] = $UsuarioEncontrado->DNI;
                $_SESSION['Email'] = $UsuarioEncontrado->Email;
                $_SESSION['tipoUsuario'] = $UsuarioEncontrado->tipoUsuario;
                $_SESSION['telefono'] = $UsuarioEncontrado->telefono;
                $_SESSION['fotoDePerfil'] = $UsuarioEncontrado->fotoDePerfil;
                $_SESSION['activo'] = $UsuarioEncontrado->activo;
                $_SESSION['ContraUsuario'] = $UsuarioEncontrado->ContraUsuario;

                $data = [
                    'Nombre' => $UsuarioEncontrado->Nombre,
                    'tipoUsuario' => $UsuarioEncontrado->tipoUsuario,
                ];

                // 🔥 Cambiado: ahora redirige a los controladores correspondientes
                if ($data['tipoUsuario'] == 'admin') {
                    $this->view('pages/admin/dashboard');
                    exit();
                } else if ($data['tipoUsuario'] == 'Profesor') {
                    $this->view('pages/profesor/dashboard');
                    exit();
                } else {
                    header('Location: ' . RUTA_URL . '/AlumnoController/dashboard');
                    exit();
                }

            } else {
                $data = [
                    'errorLogin' => '<div class="alert alert-danger" role="alert">
                    Usuario o contraseña incorrectos.
                  </div>',
                ];
                $this->view('pages/auth/login', $data);
            }
        } else {
            $data = [
                'errorLogin' => '<div class="alert alert-danger" role="alert">
                Usuario o contraseña incorrectos.
              </div>',
            ];
            $this->view('pages/auth/login', $data);
        }

    } else {
        $this->login();
    }
}

    //mostra dashboard
    




    //mostrar vista de registro usuario
    public function registrarUsuario() {
        $data=[
            'errorRegistro'=>'',
        ];
        $this->view('pages/auth/registrarusuario', $data); // Asegúrate de que la vista se llame correctamente
    }   

    public function actregistroUsuario(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $NombreUsuario = $_POST['NombreUsuario'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $DNI = $_POST['DNI'];
            $Email = $_POST['Email'];
            $telefono = $_POST['Celular'];
            $fotoPerfil = $_FILES['foto_perfil']['name'];
            $image_type = $_FILES['foto_perfil']['type'];
            $image_size = $_FILES['foto_perfil']['size'];
            $ubi = $_SERVER['DOCUMENT_ROOT'] . RUTA_AVATAR;

            if($fotoPerfil != ''){
                if($image_size <= 10000000){
                    if($image_type == 'image/jpg' || $image_type == 'image/jpeg' || $image_type == 'image/png'){
                        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ubi . $fotoPerfil);
                    }else{
                        $data = [
                            'errorRegistro' => '<div class="alert alert-danger" role="alert">
                            El tipo de imagen debe ser jpg, jpeg o png.
                          </div>',
                        ];
                        $this->view('pages/auth/registrarusuario',$data);
                    }
                }else{
                    $data = [
                        'errorRegistro' => '<div class="alert alert-danger" role="alert">
                        El tamaño de la imagen es demasiado grande
                      </div>',
                    ];
                    $this->view('pages/auth/registrarusuario',$data);
                }
            }else{
                $avatar ='img_default.png';
              
            }

            
            
            if($password == $password2 && strlen($password) >= 10){
                $data = [
                    'NombreUsuario' => $NombreUsuario,
                    'Nombre' => $nombre,
                    'Apellido' => $apellido,
                    'ContraUsuario' => $password,
                    'DNI' => $DNI,
                    'Email' => $Email,
                    'telefono' => $telefono,
                    'fotoDePerfil' => $fotoPerfil,
                ];
                
                if($this->authModel->ValidarEmail($Email)){
                    //"Ya existe una cuenta creada con ese email"
                    $data = [
                        'errorRegistro' => '<div class="alert alert-danger" role="alert">
                                         Ya existe una cuenta creada con ese email
                                    </div>'
                    ];
                    $this->view('pages/auth/registrarusuario',$data);
                    exit;  
                }
                    if($this->authModel->crearUsuario($data)){
                        $this->view('pages/auth/login');
                    }else{//NO SE PUDO CREAR EL USUARIO
                          $data = [
                        'errorRegistro' => '<div class="alert alert-danger" role="alert">
                                            NO SE PUDO CREAR EL USUARIO
                                            </div>'
                    ];
                    $this->view('pages/auth/registrarusuario',$data);
                    }
            }else{
                $data = [
                    'errorRegistro' => '<div class="alert alert-danger" role="alert">
                                        la contraseña debe tener mas de 10 caracteres  o Las contraseñas no coinciden.
                                        </div>',
                    'error_tipo' =>'',
                    'error_megas'=>'',
                ];
                $this->view('pages/auth/registrarusuario',$data);
            }

            //if

        }
    }



    
    // Mostrar vista "¿Olvidaste tu contraseña?"
    public function olvide() {
        $data=[
            'email'=> '',
            'error'=> '',
        ];
        $this->view('pages/auth/olvide_mi_contraseña', $data); // Asegúrate de que la vista se llame correctamente
        }   
 
    
    public function verPerfil(){
        $data=[
            'mensaje' => '',
        ];
        $this->view('pages/auth/perfilUsuario', $data);
    }

    public function verPerfilCambios(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'NombreUsuario' => $_POST['nombreUsuario'],
                'Nombre' => $_POST['Nombre'],
                'Apellido' => $_POST['apellido'],
                'DNI' => $_POST['dni'],
                'telefono' => $_POST['telefono'],
                'idUsuario' => $_SESSION['idUsuario'],
                'fotoDePerfil' => $_POST['FotoDePerfil']
            ];

            if($data['fotoDePerfil'] == ''){
                $data['fotoDePerfil'] = $_SESSION['fotoDePerfil'];
            }        

            if($this->authModel->editarDatosUsuario($data)){
                $data = [
                    'mensaje' => 'Usuario editado correctamente.'                 
                ];
                $this->actualizarDatosDeSession();
            }else{
                $data = [
                    'mensaje' => 'No se pudo editar los datos del usuario.'                      
                ];
                
            }
            $this->view('pages/auth/perfilUsuario', $data);
        }else{
            $this->view('pages/auth/perfilUsuario');
        }
    }

    //Esta funcion sirve para cambiar los datos en la vista perfilUsuario despues de actualizarlos
    private function actualizarDatosDeSession(){
        $dato = [
                    'email' => $_SESSION['Email']
                ];
        $usuarioActualizado = $this->authModel->buscarPorMail($dato);
        
        if($usuarioActualizado){
            $_SESSION['NombreUsuario'] = $usuarioActualizado->NombreUsuario;
            $_SESSION['Nombre'] = $usuarioActualizado->Nombre;
            $_SESSION['Apellido'] = $usuarioActualizado->Apellido;
            $_SESSION['DNI'] = $usuarioActualizado->DNI;
            $_SESSION['telefono'] = $usuarioActualizado->telefono;
            $_SESSION['fotoDePerfil'] = $usuarioActualizado->fotoDePerfil;
        }
    }



    // Procesa el formulario de recuperación
    public function enviarCorreo() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['email']) || empty(trim($_POST['email']))) {
            $data = [
            "error_mail" => "<div class='alert alert-danger text-center'>Por favor ingrese un email válido.</div>",
            "mail" => '',
            ];
            $this->view('pages/auth/olvide_mi_contraseña', $data);
            return; // Terminar aquí para evitar errores posteriores
            }
            $Email = $_POST['email'];
            
            $data = [
                'email' => $Email,
            ];
            $usuario = $this->authModel->buscarPorMail($data);

             if (!empty($usuario)) {
                $where = "new_pass";
                $data = include(RUTA_APP . "/mail/mail_pass.php");

       
           
                $this->view('pages/auth/email_enviado', $data);
            } else {
                $data = [
                    "error"=> "<div class='alert alert-danger' role='alert'>
                                <p class='text-center'>No es un email válido.</p>
                                </div>",
                    "mail"=>'',
                ];
            $this->view('pages/auth/olvide_mi_contraseña', $data);
    }
}

    // /* Función para llamar a la vista actualizarContraseña con blanqueo de errores*/
    public function actualizarVistaContra() {
        echo "Entrando al método actualizarVistaContraseña"; // DEBUG
    $data = [
        'mail' => '',
        'errorMail' => '',
    ];
    $this->view('pages/auth/actualizarContra', $data);
    }

    public function actualizarContra() {

        $Email = $_POST['Email'];
        $passActual =$_POST['pass_actual'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        
        if ($password != $password2){
            $data = [
                'mail' => '',
                'error_mail'=>'',
                'error_pass'=> "<div class='alert alert-danger' role='alert'>
                <p class = 'text-center'>Las contraseñas no coinciden.</p>
             </div>",
            ];
            $this->view('pages/auth/actualizarContra',$data);
        }else{
            if($this->authModel->cambiarContaseña($password, $Email)){
                $data = [
                    'mail' => '',
                    'error_mail'=>'',
                    'error_pass'=> "<div class='alert alert-success' role='alert'>
                    <p class = 'text-center'>La contraseña fue actualizada</p>
                 </div>",
                ];
                $this->view('pages/auth/actualizarContra',$data);
            }
        }

        
    }


    public function logout() {
        // Eliminar todas las variables de sesión
        session_unset();
    
        // Destruir la sesión actual
        session_destroy();
    
        // Redirigir al usuario a la página de login
        $this->view('pages/auth/login');
        exit;
    }

    
    
}
