@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Institucion</div>
                    <div class="panel-body">
                        <a href="{{ url('AdmGeneral/GestionarInstitucion/create') }}" class="btn btn-success btn-sm" title="Add New Institucion">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva
                        </a>

                        <form method="GET" action="{{ url('/AdmGeneral/GestionarInstitucion') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Nit</th><th>Estado</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($institucion as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->nit }}</td><td>{{ $item->estado }}</td>
                                        <td>
                                            <a href="{{ url('/AdmGeneral/GestionarInstitucion/' . $item->id) }}" title="View Institucion"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/AdmGeneral/GestionarInstitucion/' . $item->id . '/edit') }}" title="Edit Institucion"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/AdmGeneral/GestionarInstitucion' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Institucion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $institucion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
