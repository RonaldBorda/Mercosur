@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Relaciones diplomaticas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#modalAgregarD"><i class="fas fa-user fa-sm text-white-50"></i> Agregar RD</a>
</div>


<div class="row">
    @if($message=Session::get('Listo'))
    <div class="col-12 alert alert-success alert-dismissable face show" role="alert">
        <h5>Resultado:</h5>
        <span>{{$message}}</span>
    </div>
    @endif

    <table class="table col-12 table-responsive">
        <thead>
            <tr>
                <td>ID</td>
                <td>Fecha</td>
                <td>Pais A</td>
                <td>Representante A</td>
                <td>Pais B</td>
                <td>Representante B</td>
                <td>Pais C</td>
                <td>Representante C</td>
                <td>Producto</td>
                <td>Descripción</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach($diplomaticas as $diplomatica)
            <tr>
                <td>{{$diplomatica->id}}</td>
                <td>{{$diplomatica->fecha}}</td>
                <td>{{$diplomatica->pais_a}}</td>
                <td>{{$diplomatica->representante_a}}</td>
                <td>{{$diplomatica->pais_b}}</td>
                <td>{{$diplomatica->representante_b}}</td>
                <td>{{$diplomatica->pais_c}}</td>
                <td>{{$diplomatica->representante_c}}</td>
                <td>{{$diplomatica->producto}}</td>
                <td>{{$diplomatica->descripcion}}</td>

                <td>
                    <button class="btn btn-round btnEditar" data-id="{{$diplomatica->id}}" data-toggle="modal"
                        data-target="#modalEditar"><i class="fa fa-edit"></i> 
                    </button>
                    <button class="btn btn-round btnEliminar" data-id="{{$diplomatica->id}}" data-toggle="modal"
                        data-target="#modalEliminar"><i class="fa fa-trash"></i> 
                    </button>
                    <form action="{{url('/admin/diplomaticas',['id'=>$diplomatica->id])}}" method="POST"
                        id="formEli_{{$diplomatica->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$diplomatica->id}}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<!-- Modal Agregar-->
<div class="modal fade" id="modalAgregarD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar relaciones Diplomaticas</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/diplomaticas" method="POST">
                @csrf
                <div class="modal-body">
                    @if($message=Session::get('ErrorInsert'))
                    <div class="col-12 alert alert-danger alert-dismissable face show" role="alert">
                        <h5>Resultado:</h5>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_a" placeholder="Pais A"
                            value="{{old('pais_a')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_a" placeholder="Representante A"
                            value="{{old('representante_a')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_b" placeholder="Pais B"
                            value="{{old('pais_b')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_b" placeholder="Representante B"
                            value="{{old('representante_b')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_c" placeholder="Pais C"
                            value="{{old('pais_c')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_c" placeholder="Representante C"
                            value="{{old('representante_c')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="producto" placeholder="Producto"
                            value="{{old('producto')}}" id="">
                    </div>
                    <textarea style="width:470px; min-height:100px;" class="form-group" name="descripcion"
                        value="{{old('descripcion')}}" placeholder="Descripción"></textarea>
                </div>



                <!--fin formulario-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar relacion diplomatica</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
           
                <div class="modal-body">
                    <h5>¿Desea eliminar registro?</h5>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
            
        </div>
    </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar relaciones Diplomaticas</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/diplomaticas" method="POST">
                @csrf
                <div class="modal-body">
                    @if($message=Session::get('ErrorInsert'))
                    <div class="col-12 alert alert-danger alert-dismissable face show" role="alert">
                        <h5>Resultado:</h5>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_a" placeholder="Pais A"
                            value="{{old('pais_a')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_a" placeholder="Representante A"
                            value="{{old('representante_a')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_b" placeholder="Pais B"
                            value="{{old('pais_b')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_b" placeholder="Representante B"
                            value="{{old('representante_b')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_c" placeholder="Pais C"
                            value="{{old('pais_c')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_c" placeholder="Representante C"
                            value="{{old('representante_c')}}" id="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="producto" placeholder="Producto"
                            value="{{old('producto')}}" id="">
                    </div>
                    <textarea style="width:470px; min-height:100px;" class="form-group" name="descripcion"
                        value="{{old('descripcion')}}" placeholder="Descripción"></textarea>
                </div>



                <!--fin formulario-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    var idEliminar = 0;
    $(document).ready(function () {
        @if($message = Session::get('ErrorInsert'))
        $("#modalAgregarD").modal('show');
        @endif
        $(".btnEliminar").click(function(){
            idEliminar=$(this).data('id');
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });
    });

</script>
@endsection
