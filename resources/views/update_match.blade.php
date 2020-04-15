<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Actualizar Partido</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ url('css/estilo.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

</head>

<body>

    <div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('home') }}">Liga Central Universitaria</a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right">

              <!-- /.dropdown -->
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><span><i class="fa fa-user fa-fw"></i> {{ Auth::user()->lastname}}, {{ Auth::user()->name }}</span></li>
                      <li class="divider"></li>
                      <li class="dropdown">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                      </li>
                  </ul>
                  <!-- /.dropdown-user -->
              </li>
              <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->

          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                  @if (Auth::user()->type == 'Periodista' || Auth::user()->type == 'Analista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Periodista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Post<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a class="letter" href="{{ url('article') }}">Añadir Articulo</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('list_article') }}">Lista de Articulos</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Páginas y Otros<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a class="letter" href="{{ url('banners') }}">Banners</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('nosotrosconf') }}">¿Quienes Somos?</a>
                              </li>
                              <li>
                                  <a class="letter" href="{{ url('contactoconf') }}">Contacto</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      <li>
                          <a class="letter" href="{{ url('/list_users') }}"><i class="fa fa-table fa-fw"></i>Usuarios</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_sport') }}"><i class="fa fa-edit fa-fw"></i>Deportes</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_club') }}"><i class="fa fa-edit fa-fw"></i>Clubes</a>
                      </li>
                      @endif
                      @if (Auth::user()->type == 'Analista' || Auth::user()->type == 'Administrador')
                      <li>
                          <a class="letter" href="{{ url('list_match') }}"><i class="fa fa-edit fa-fw"></i>Partidos</a>
                      </li>
                      <li>
                          <a class="letter" href="{{ url('list_match_ready') }}"><i class="fa fa-edit fa-fw"></i>Partidos Finalizados</a>
                      </li>
                      @endif
                  </ul>
              </div>
              <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
      </nav>

        <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Partido</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>

          <div>
              <form action="{{ url('update_match') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12 ">
                  @foreach ($partido as $match)
                      <div class="panel panel-default">
                          <div class="panel-body col-12">

                                  <div class="col-md-12 form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                      <label for="code" class="col-md-3 control-label">Codigo de Registro del Partido</label>
                            
                                      <div class="col-md-12">
                                          <input id="id" type="text" class="form-control" name="id" value="{{ $match->id }}" required readonly="readonly">

                                      </div>
                                  </div>

                                  <div class="col-md-12 form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                      <label for="fecha" class="col-md-3 control-label">Fecha</label>

                                      <div class="col-md-12">
                                      <input id="fecha" type="text" class="form-control datepicker" value="{{ $match->fecha }}" name="fecha" readonly="readonly">

                                          @if ($errors->has('fecha'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('fecha') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="col-md-12 form-group{{ $errors->has('jornada') ? ' has-error' : '' }}">
                                      <label for="jornada" class="col-md-3 control-label">Jornada</label>

                                      <div class="col-md-12">
                                      <input id="jornada" type="text" class="form-control datepicker" value="Jornada {{ $match->jornada }}" name="jornada" readonly="readonly">

                                          @if ($errors->has('jornada'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('jornada') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col-4" class="text-center">Local</th>
                                            <th scope="col-1" class="text-center"></th>
                                            <th scope="col-2" class="text-center"></th>
                                            <th scope="col-1" class="text-center"></th>
                                            <th scope="col-4" class="text-center">Visitante</th>
    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <th scope="col-4" class="text-center"><input id="primero" type="text" class="form-control datepicker" value="{{ $match->primero }}" name="primero" readonly="readonly"></th>
                                            <th scope="col-1" class="text-center"><input size="1" id="gol_local" type="number" min="0" class="form-control" name="gol_local"  required></th>
                                            <th scope="col-2" class="text-center"> VS </th>
                                            <th scope="col-1" class="text-center"><input size="1" id="gol_visita" type="number" min="0" class="form-control" name="gol_visita"  required></th>
                                            <th scope="col-4" class="text-center"><input id="segundo" type="text" class="form-control datepicker" value="{{ $match->segundo }}" name="segundo" readonly="readonly"></th>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                  <div class="col-md-12 text-center">
                                          <br>
                                          <button class="btn btn-primary d-flex justify-content-center" type="submit">Guardar Resultados</button>
                                      </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>
              </form>
          </div>

        </div>
        <!-- /#wrapper -->

    <script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
    </script>

    <!-- jQuery -->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ url('data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
