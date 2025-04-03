<form id="formUsuarios" style="
    padding: 5%;
">
    <fieldset >
        <legend>Usuarios</legend>
       
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="" id="txtnombre">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" id="txtcorreo">
                <label for="floatingInput">Correo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="" id="txtpassword">
                <label for="floatingInput">Contraseña</label>
            </div>
       
        
            <a href="?controlador=usuarios"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Guardar</button>
    </fieldset >      
</form>