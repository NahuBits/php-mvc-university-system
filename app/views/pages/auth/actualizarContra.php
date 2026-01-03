<?php require RUTA_APP . '/views/layout/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">RESETEO DE CONTRASEÑA</h1>
                                </div>

                                <form class="user" action="<?php echo RUTA_URL; ?>/AuthController/actualizarContra" method="POST">
                                    <div class="form-group">
                                        <input name="Email" type="email" class="form-control form-control-user mt-2"
                                            id="emailInput" placeholder="Tu email" required>

                                        <input name="pass_actual" type="password"
                                            class="form-control form-control-user mt-2"
                                            id="actualPassInput" placeholder="Contraseña actual" required>

                                        <input name="password" type="password"
                                            class="form-control form-control-user mt-2"
                                            id="newPassInput" placeholder="Nueva Contraseña" required>

                                        <input name="password2" type="password"
                                            class="form-control form-control-user mt-2"
                                            id="repeatPassInput" placeholder="Repetir Nueva Contraseña" required>
                                    </div>

                                    <?php if (!empty($data['error_pass'])): ?>
                                        <div class="mt-2">
                                            <?= $data['error_pass']; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center mt-3">
                                        <a class="small" href="<?php echo RUTA_URL; ?>/AuthController/login">Volver al Login</a>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                        Enviar
                                    </button>
                                </form>

                                <hr>

                                <?php if (!empty($data['mail'])): ?>
                                    <div class="text-success text-center"><?= $data['mail']; ?></div>
                                <?php endif; ?>

                                <?php if (!empty($data['error_mail'])): ?>
                                    <div class="text-danger text-center"><?= $data['error_mail']; ?></div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

