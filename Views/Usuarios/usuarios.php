

<div class="container">
        <div class="row align-items-center">
            <div class="col text-center">
                <h3>Usuarios</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                Fecha: <?php echo $fecha; ?> Hora : <?php echo $hora; ?>
            </div>
        </div>
        <div class="row ">
            <div class="col ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UsuariosModal"  onclick="agregar_f()">
                    Nuevo Registro +
                </button>
            </div>
            <!--<div class="col ">
            <a href='?controlador=usuarios&accion=formAgregar'><button type="button" class="btn btn-primary">
                    Nuevo Registro +
                </button></a>
            </div>-->
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <table id="myTable" class="cell-border display">
                    <thead>
                        <tr>
                            <th>FOLIO</th>
                            <th>NOMBRE</th>
                            <th>CORREO</th>
                            <th>FECHA</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($row_registros = $resultado_registros->fetch_assoc()){
                           
                            $correo = $row_registros['correo'];
                            
                            $clave = "IBCS_EMAILS";
                            $metodo = "AES-256-CBC";
                            $correo_desencriptado = openssl_decrypt($correo, $metodo, $clave, 0, 'IBCSVECTOREMAILS');
                        ?>
                        <tr>
                            <td><?php echo $row_registros['folio']?></td>
                            <td><?php echo $row_registros['nombre']?></td>
                            <td><?php echo $correo_desencriptado?></td>
                            <td><?php echo $row_registros['fecha']?></td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="return eliminar('<?php echo $row_registros['id_login_usuarios']; ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                    </svg>
                                </button>
                                <button type="button"  class="btn btn-primary" id="btnModificar" data-bs-toggle="modal" data-bs-target="#UsuariosModal"
                                        onclick="return modificar('<?php echo $row_registros['nombre']?>','txtnombre','<?php  echo $correo_desencriptado;?>','txtcorreo','<?php echo $row_registros['id_login_usuarios']; ?>','txtid')" 
                                        >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="UsuariosModal" tabindex="-1" aria-labelledby="UsuariosModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UsuariosModalLabel">Nuevo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUsuarios">
        <div class="modal-body">
           <input type='hidden' id='txtid'>
            <div class="form-floating mb-3">
                <input type="text" class="form-control"  placeholder="" id="txtnombre">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control"  placeholder="name@example.com" id="txtcorreo">
                <label for="floatingInput">Correo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control"  placeholder="" id="txtpassword">
                <label for="floatingInput" id='lblpassword'>Contraseña</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-primary" id="btnModificarRegistro">Modificar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="Assets/js/functions_usuarios.js"></script>
<script>
    var registroeliminar;
        function RecolectarEliminar(id_eliminar) {
            
            registroeliminar = {
        
                id: id_eliminar
        
            };
            
        }

        function eliminar(id) {

            // e.preventDefault();
            RecolectarEliminar(id);
            Enviar_eliminar('eliminar', registroeliminar);
            //alert(id);
        }

        function Enviar_eliminar(accion, objEvento) {

            $.ajax({
                type: 'POST',
                url: '/wms001/?controlador=usuarios&accion=' + accion,
                data: objEvento,
                success: function(msg) {
                    if (msg) {
                       //alert(msg);
                       //$('#myTable').DataTable().ajax.reload();
                       //$("#UsuariosModal").modal('toggle');
                        $('#UsuariosModal').modal('hide'); 
                        location.reload();
                        
                    }
                },
                error: function() {
                    alert("error");
                }
            });
        }

        function modificar(d1,o1,d2,o2,d3,o3)  {
           $(`#UsuariosModalLabel`).html('Modificar Usuario');
            document.getElementById(o1).value = d1;
            document.getElementById(o2).value = d2;
            document.getElementById(o3).value = d3;
           
            document.getElementById('txtpassword').style.display='none';
            document.getElementById('lblpassword').style.display='none';
            document.getElementById('btnGuardar').style.display='none';
            document.getElementById('btnModificarRegistro').style.display='block';
        }

        function agregar_f()  {
           $(`#UsuariosModalLabel`).html('Nuevo Usuario');
            document.getElementById('txtnombre').value = '';
            document.getElementById('txtid').value = '';
            document.getElementById('txtcorreo').value = '';
            document.getElementById('txtpassword').style.display='block';
            document.getElementById('lblpassword').style.display='block';
            document.getElementById('btnGuardar').style.display='block';
            document.getElementById('btnModificarRegistro').style.display='none';
        }
        

</script>