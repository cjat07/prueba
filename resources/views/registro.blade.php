<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
    <div class="container">
        <br><br>
        <div class="row">
            <button class="btn btn-success" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Agregar
            </button>
            <br>
            <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Tipo Tercero</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->Departamentos->nombdepa}}</td>
                        <td>{{$data->Municipios->nombmuni }}</td>
                        <td>{{$data->tipoidentificacion." ".$data->numeroidentificacion }}</td>
                        <td>{{$data->nombre1." ".$data->apellido1." ".$data->apellido2}}</td>
                        <td>{{$data->Tipoterceros->nombtipo}}</td>  
                        <td>
                            <button class="btn btn-warning btnEditar" type="button" data-id="{{$data->id}}" data-toggle="modal" data-target="#update">
                                <i class="fa fa-pencil-square"></i>
                            </button>
                        </td>
                        <td>
                            <a class="btn btn-danger"href="{{route('registro.destroy',$data->id)}}" >
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>                  
                    </tr>                    
                    @endforeach
                </tbody>
              </table>            
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-container">

                    <form action="{{route('registro.store')}}" method="post">
                        @csrf
                        <div class="modal-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipoidentificacion">Tipo de identificación</label>
                                    <select class="form-control" name="tipoidentificacion" id="tipoidentificacion" required>
                                        <option value="">Seleccionar opción</option>
                                        <option value="CC">CC</option>
                                        <option value="TI">TI</option>
                                        <option value="TP">TP</option>
                                        <option value="RC">Rc</option>
                                        <option value="CE">CE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="numeroidentificacion">Número de identificación</label>
                                    <input type="number" name="numeroidentificacion" class="form-control" placeholder="Identificación" id="numeroidentificacion" required>
                                </div>
                                <div class="form-group">

                                    <label for="idtipotercero">Tipo de tercero:</label>
                                    <select class="form-control" name="idtipotercero" id="idtipotercero" required>
                                        <option value="">Seleccionar opción</option>
                                        @foreach(\App\Models\Tipotercero::all() as $value)
                                        <option value="{{$value->id}}">{{$value->nombtipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombre1">Nombre:</label>
                                    <input type="text" name="nombre1" class="form-control" placeholder="Nombre" id="nombre1" required>
                                </div>      
                                <div class="form-group">
                                    <label for="nombre2">Segundo nombre:</label>
                                    <input type="text" name="nombre2" class="form-control" placeholder="Segundo nombre" id="nombre2" required>
                                </div> 
                                <div class="form-group">
                                    <label for="apellido1">Apellido:</label>
                                    <input type="text" name="apellido1" class="form-control" placeholder="Apellido" id="apellido1" required>
                                </div> 
                                <div class="form-group">
                                    <label for="apellido2">Segundo apellido:</label>
                                    <input type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido" id="apellido2" required>
                                </div>  
                                <div class="form-group">
                                    <label for="iddepartamento">Departamento:</label>
                                    <select class="form-control" name="iddepartamento" id="iddepartamento" required>
                                        <option value="">Seleccionar departamento</option>
                                        @foreach (\APP\Models\Departamento::all() as $departa)
                                        <option value="{{$departa->id}}">{{$departa->nombdepa}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="idmunicipio">Municipios:</label>
                                    <select class="form-control" name="idmunicipio" id="idmunicipio" required>
                                        <option value="">Seleccionar municipios</option>
                                    </select>
                                </div> 
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button> 
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>                                                                                                                                                                                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
        </div>
        </div>
    </div>

    <!-- The Modal update -->
    <div class="modal" id="update">
        <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Modificar</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-container">

                    <form action="{{route('registro.update')}}" method="post">
                        @csrf
                        <input type="hidden" id="idupdate" name="idupdate">
                        <div class="modal-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipoidentificacion">Tipo de identificación</label>
                                    <select class="form-control" name="tipoidentificacion" id="updatetipoidentificacion" required>
                                        <option value="">Seleccionar opción</option>
                                        <option value="CC">CC</option>
                                        <option value="TI">TI</option>
                                        <option value="TP">TP</option>
                                        <option value="RC">Rc</option>
                                        <option value="CE">CE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="numeroidentificacion">Número de identificación</label>
                                    <input type="number" name="numeroidentificacion" class="form-control" placeholder="Identificación" id="updatenumeroidentificacion" required>
                                </div>
                                <div class="form-group">

                                    <label for="idtipotercero">Tipo de tercero:</label>
                                    <select class="form-control" name="idtipotercero" id="updateidtipotercero" required>
                                        <option value="">Seleccionar opción</option>
                                        @foreach(\App\Models\Tipotercero::all() as $value)
                                        <option value="{{$value->id}}">{{$value->nombtipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombre1">Nombre:</label>
                                    <input type="text" name="nombre1" class="form-control" placeholder="Nombre" id="updatenombre1" required>
                                </div>      
                                <div class="form-group">
                                    <label for="nombre2">Segundo nombre:</label>
                                    <input type="text" name="nombre2" class="form-control" placeholder="Segundo nombre" id="updatenombre2" required>
                                </div> 
                                <div class="form-group">
                                    <label for="apellido1">Apellido:</label>
                                    <input type="text" name="apellido1" class="form-control" placeholder="Apellido" id="updateapellido1" required>
                                </div> 
                                <div class="form-group">
                                    <label for="apellido2">Segundo apellido:</label>
                                    <input type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido" id="updateapellido2" required>
                                </div>  
                                <div class="form-group">
                                    <label for="iddepartamento">Departamento:</label>
                                    <select class="form-control" name="iddepartamento" id="updateiddepartamento" required>
                                        <option value="">Seleccionar departamento</option>
                                        @foreach (\APP\Models\Departamento::all() as $departa)
                                        <option value="{{$departa->id}}">{{$departa->nombdepa}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="idmunicipio">Municipios:</label>
                                    <select class="form-control" name="idmunicipio" id="updateidmunicipio" required>
                                        <option value="">Seleccionar municipios</option>
                                    </select>
                                </div> 
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button> 
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>                                                                                                                                                                                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
        </div>
        </div>
    </div>    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>   
    
    <script>
        $( document ).ready(function() {
            $('#iddepartamento').change(function() {
                let id= $(this).val();
                console.log(id);
                $.post("{{ route('registro.getMunicipios') }}", {_token:'{{ csrf_token() }}', id:id}, 
                function(data){
                    for (let val of data) {
                        $('#idmunicipio').append($('<option>', {
                            value: val.id,
                            text: val.nombmuni 
                        }));                        
                    }

                });                
            });
            $('.btnEditar').click(function(){
                let id =$(this).data('id');
                $('#idupdate').val(id);
                $.post("{{ route('registro.show') }}", {_token:'{{ csrf_token() }}', id:id}, 
                function(data){
                    let municipio=data.idmunicipio;
                    $.post("{{ route('registro.getMunicipios') }}", {_token:'{{ csrf_token() }}', id:data.iddepartamento}, 
                        function(data){
                            for (let val of data) {
                                $('#updateidmunicipio').append($('<option>', {
                                    value: val.id,
                                    text: val.nombmuni 
                                }));                        
                            }
                            $('#updateidmunicipio').val(municipio);
                    });    

                    $('#updatetipoidentificacion').val(data.tipoidentificacion);
                    $('#updatenumeroidentificacion').val(data.numeroidentificacion);
                    // $('#updatetipote').val(data.);
                    $('#updateidtipotercero').val(data.idtipotercero);
                    $('#updatenombre1').val(data.nombre1);
                    $('#updatenombre2').val(data.nombre2);
                    $('#updateapellido1').val(data.apellido1);
                    $('#updateapellido2').val(data.apellido2);
                    $('#updateiddepartamento').val(data.iddepartamento);
                    $('#updateidmunicipio').val(data.idmunicipio);
                });                 
            });
        });
    </script>
</body>
</html>