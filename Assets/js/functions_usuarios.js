
 

    $(document).ready(function(){

        var registro;
        
        
        $("#formUsuarios").submit(function(e){
            e.preventDefault();
            RecolectarDatos();
            Enviar('agregar',registro);
        });
        

        function RecolectarDatos() {
            registro = {
        
                id: $('#txtId').val(),
                nombre: $('#txtnombre').val(),
                correo: $('#txtcorreo').val(),
                password: $('#txtpassword').val()
        
            };
        }
        
        function Enviar(accion, objEvento) {
            //console.log(objEvento)
            $.ajax({
                type: 'POST',
                url: '/wms001/?controlador=usuarios&accion=' + accion,
               // url: '/wms001/index.php?controlador=usuarios&accion=' + accion,
                data: objEvento,
                success: function(msg) {
                    if (msg) {
                       // alert(msg);
                       // $('#myTable').DataTable().ajax.reload();
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

      
        });
    
       