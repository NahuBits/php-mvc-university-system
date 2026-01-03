<?php
    include_once(RUTA_APP . "/helpers/password_creator.php"); // ajustá si el path es otro
    include(RUTA_APP."/external/Mailer/src/PHPMailer.php");
    include(RUTA_APP."/external/Mailer/src/SMTP.php");
    include(RUTA_APP."/external/Mailer/src/Exception.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $new_pass = create_pass(8);
    
    $this->authModel->cambiarContaseña($new_pass, $_POST['email']);
    
    $email="universidadpracticoutn@gmail.com";
    $pass ="habm xovq lnjv nxgx";//Contraseñas de aplicaciones. NO es la contraseña del gmail=universidadpracticoutn@gmail.com
    $from_name ="Universidad Tecnologica Nacional ";
    $host = "smtp.gmail.com";
    $port = 465;
    $smtp_auth=true;
    $smtp_secure=  'ssl';
    $link = RUTA_URL."/AuthController/actualizarVistaContra/";
    $body = "<p>Hola
            <br>
            Tu nueva contraseña para utilizar el administrador de tareas es:<br> <b>{$new_pass}</b><br>
            Podrás cambiar esta contraseña ingresando al siguiente enlace
            
            <a href={$link}>Link</a><br>
            Saludos,<br>
            El equipo de <b>UTN</b>
            </p>";
    $mail = new PHPMailer(true);
    try{
        
        $mail->isSMTP();
        //$mail->SMTPDebug = 2;
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPAuth = $smtp_auth;
        $mail->Host = $host;
        $mail->Username= $email;
        $mail->Password = $pass;
        $mail->Port = $port;
        $mail->SMTPSecure =$smtp_secure;
        $mail->CharSet = 'utf-8'; 
        $mail->setFrom($email,$from_name);
        $mail->AddAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Recupero de Contraseña';
        $mail->Body = $body;
        if (!$mail->send()){
            echo "NO SE PUDO ENVIAR"; die();
        }
        if ($where == "new_pass") {
            $data = [
                "success" => "<div class='alert alert-success text-center' role='alert'>
                                Te llegará una nueva contraseña por mail.
                            </div>",
                "error_mail" =>'',
            ];
            //$this->view('pages/auth/actualizarContraseña.php', $data);
            return $data;
        }
    }catch(Exception $e){
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
?>