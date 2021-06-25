@extends('layouts.main')
@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Relaciones comerciales</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#modalAgregarC"><i class="fas fa-user fa-sm text-white-50"></i> Agregar RC

    </a>
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
                <td style="text-align: center;">ID</td>
                <td style="text-align: center;">Fecha</td>
                <td style="text-align: center;">Pais A</td>
                <td style="text-align: center;">Representante A</td>
                <td style="text-align: center;">Pais B</td>
                <td style="text-align: center;">Representante B</td>
                <td style="text-align: center;">Tipo</td>
                <td style="text-align: center;">Producto</td>
                <td style="text-align: center;">Descripción</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            @foreach($comercials as $comercial)
            <tr>
                <td>{{$comercial->id}}</td>
                <td>{{$comercial->fecha}}</td>
                <td>{{$comercial->pais_a}}</td>
                <td>{{$comercial->representante_a}}</td>
                <td>{{$comercial->pais_b}}</td>
                <td>{{$comercial->representante_b}}</td>
                <td>{{$comercial->tipo}}</td>
                <td>{{$comercial->producto}}</td>
                <td>{{$comercial->descripcion}}</td>

                <td>
                    <button class="btn btn-round btnEliminar" data-id="{{$comercial->id}}" data-toggle="modal"
                        data-target="#modalEliminar">  <i class="fa fa-trash"></i> 
                    </button>
                    <button class="btn btn-round btnEditarC" 
                        data-id="{{$comercial->id}}" 
                        data-fecha="{{$comercial->fecha}}"
                        data-pais_a="{{$comercial->pais_a}}"
                        data-representante_a="{{$comercial->representante_a}}"
                        data-pais_b="{{$comercial->pais_b}}"
                        data-representante_b="{{$comercial->representante_b}}"
                        data-tipo="{{$comercial->tipo}}"
                        data-producto="{{$comercial->producto}}"
                        data-descripcion="{{$comercial->descripcion}}"

                        data-toggle="modal" data-target="#modalEditarC">  
                        <i class="fa fa-edit"></i> 
                    </button>
                    <form action="{{url('/admin/comerciales',['id'=>$comercial->id])}}" method="POST"
                        id="formEli_{{$comercial->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$comercial->id}}">
                        <input type="hidden" name="_method" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="modalAgregarC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar relaciones comerciales</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/comerciales" method="POST">
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
                        <select name="tipo" class="form-control" value="{{old('tipo')}}" id="">
                            <option value="Union aduanera">Unión aduanera</option>
                            <option value="Alcance parcial">Alcance parcial</option>
                            <option value="Cooperacion internacional">Cooperación internacional</option>
                            <option value="Libre comercio">Libre comercio</option>
                            <option value="Libre comercio">Unión economica</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="producto" placeholder="Producto"
                            value="{{old('producto')}}" id="">
                    </div>
                    <textarea style="width:470px; min-height:100px;" class="form-group" name="descripcion"
                        placeholder="Descripción" value="{{old('descripcion')}}"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar relación comercial</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
           
                <div class="modal-body">
                    <h5>¿Desea eliminar registro?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>
         
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditarC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar relaciones comerciales</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/comerciales/edit" method="POST">
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
                    <input type="hidden" name="id" id="idEdit">
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" id="fechaEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_a" placeholder="Pais A"
                            value="{{old('pais_a')}}" id="pais_aEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_a" placeholder="Representante A"
                            value="{{old('representante_a')}}" id="representante_aEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pais_b" placeholder="Pais B"
                            value="{{old('pais_b')}}" id="pais_bEdit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="representante_b" placeholder="Representante B"
                            value="{{old('representante_b')}}" id="representante_bEdit">
                    </div>
                    <div class="form-group">
                        <select name="tipo" class="form-control" value="{{old('tipo')}}" id="tipoEdit">
                            <option value="Union aduanera">Unión aduanera</option>
                            <option value="Alcance parcial">Alcance parcial</option>
                            <option value="Cooperacion internacional">Cooperación internacional</option>
                            <option value="Libre comercio">Libre comercio</option>
                            <option value="Libre comercio">Unión economica</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="producto" placeholder="Producto"
                            value="{{old('producto')}}" id="productoEdit">
                    </div>
                    <textarea style="width:470px; min-height:100px;" class="form-group" name="descripcion"
                        placeholder="Descripción" id="descripcionEdit" value="{{old('descripcion')}}"></textarea>
                </div>

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
        $("#modalAgregarC").modal('show');
        @endif
        $(".btnEliminar").click(function(){
            idEliminar=$(this).data('id');
        });
        $(".btnModalEliminar").click(function(){
            $("#formEli_"+idEliminar).submit();
        });
        $(".btnEditarC").click(function(){
            $("#idEdit").val($(this).data('id'));
            $("#fechaEdit").val($(this).data('fecha'));
            $("#pais_aEdit").val($(this).data('pais_a'));
            $("#representante_aEdit").val($(this).data('representante_a'));
            $("#pais_bEdit").val($(this).data('pais_b'));
            $("#representante_bEdit").val($(this).data('representante_b'));
            $("#tipoEdit").val($(this).data('tipo'));
            $("#productoEdit").val($(this).data('producto'));
            $("#descripcionEdit").val($(this).data('descripcion'));
        });
    });

</script>
@endsection
