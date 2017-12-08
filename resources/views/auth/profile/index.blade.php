@extends('layouts.adminU')
@section('contenido')

    <div class="container">
              <div class="block-web full">
                <ul class="nav nav-tabs nav-justified nav_bg">
                  <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> Personal</a></li>
                  <li class=""><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Editar</a></li>
                  <li class=""><a href="#user-activities" data-toggle="tab"><i class="fa fa-laptop"></i> Actividades</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane animated fadeInRight active" id="about">
                    <div class="user-profile-content">
                      <h5><strong>SOBRE</strong> MI</h5>
                      <div class="row">
                        <div class="col-sm-6">
                          <h5><strong>DATOS DE</strong> CONTACTO</h5>
                          <address>
                          <strong>Nombre</strong><br>
                          <p>{{$user->nombre}} {{$user->apellido}}</p>
                          </address>
                          <address>
                          <strong>Telefono</strong><br>
                          <abbr title="Phone">73604997</abbr>
                          </address>
                          <address>
                          <strong>Identificacion</strong><br>
                          <p>{{$user->ci}}</p>
                          </address>
                          <address>
                          <strong>Email</strong><br>
                          <a href="mailto:#">{{$user->email}}</a>
                          </address>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane animated fadeInRight" id="edit-profile">
                    <div class="user-profile-content">
                        <form method="POST" action="{{ url('profile') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                          <label for="FullName">Nombre</label>
                          <input type="text" class="form-control" id="FullName" value="{{$user->nombre}}" name="nombre">
                        </div>
                        <div class="form-group">
                          <label for="apellido">Apellido</label>
                          <input type="text" class="form-control" id="FullName" value="{{$user->apellido}}" name="apellido">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="Password" name="password" placeholder="6 - 15 Caracteres">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane" id="user-activities">
                  @if($creados->count()>0)
                    <h1 class="label label-primary">Workflows Creados</h1>
                    <ul class="media-list">
                      @foreach($creados as $work)
                      <li class="media"> <a href="{{url('SitioCompartido/GestionarSitio')}}">
                        <p><strong>Prioridad: {{$work->prioridad}}</strong>     **{{$work->descripcion}}**   <strong>Fecha:{{$work->fechaI}}=>{{$work->fechaF}}</strong> <br>
                          <i class="fa fa-laptop"></i></p>
                        </a> </li>
                        @endforeach
                    </ul>
                    @endif
                    @if($asignados->count()>0)
                      <h1 class="label label-primary">Workflows Asignados</h1>
                      <ul class="media-list">
                        @foreach($asignados as $work)
                          <li class="media"> <a href="{{url('SitioCompartido/GestionarSitio')}}">
                          <p><strong>Nombre: {{$work->path}}</strong> **{{$work->descripcion}}** <strong>Fecha de Asignacion:{{$work->fecha}}</strong> <br>
                            <i class="fa fa-laptop"></i></p>
                          </a></li>
                          @endforeach
                      </ul>
                    @endif
                  </div>

                </div>
                <!--/tab-content-->
              </div>
              <!--/block-web-->
            </div>
    </div>
@endsection
