


    <div class="login-box">
        <img class="avatar" src="assets/img/Logo.jpg" alt="Logo"><br>
        <h1> INGRESAR DATOS </h1>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="correo" placeholder="Ingresar Usuario">
                <label style="color: blue;">Correo</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="contrasena" placeholder="Ingresar Contrase&ntilde;a">
                <label style="color: blue;">Contrase&ntilde;a</label>
            </div>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-outline-primary" type="submit">Iniciar Sesi&oacute;n</button>
            </div>
        </form>
    </div>
