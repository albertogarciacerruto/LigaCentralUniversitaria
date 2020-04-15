<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Clubes</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                  <h1 class="page-header">Nuevo Club</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <div>
              <form action="{{ url('club') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12 ">
                      <div class="panel panel-default">

                          <div class="panel-body col-12">
                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="title" class="col-md-12 control-label">Nombre del Club</label>

                                      <div class="col-md-12">
                                          <input id="name" type="text" maxlength="50" class="form-control" name="name" value="{{ old('name') }}" placeholder="Escribe Nombre del Club" required autofocus>

                                          @if ($errors->has('name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('universidad') ? ' has-error' : '' }}">
                                      <label for="universidad" class="col-md-12 control-label">Nombre Universidad</label>

                                      <div class="col-md-12">
                                          <input id="universidad" type="text" maxlength="100" class="form-control" name="universidad" value="{{ old('universidad') }}" placeholder="Escribe Nombre Universidad" required autofocus>

                                          @if ($errors->has('universidad'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('universidad') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('siglas') ? ' has-error' : '' }}">
                                      <label for="siglas" class="col-md-12 control-label">Siglas del Club</label>

                                      <div class="col-md-12">
                                          <input id="siglas" type="text" maxlength="8" class="form-control" name="siglas" value="{{ old('siglas') }}" placeholder="Escribe Siglas" required autofocus>

                                          @if ($errors->has('siglas'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('siglas') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('dt') ? ' has-error' : '' }}">
                                      <label for="dt" class="col-md-12 control-label">Nombre DT del Club</label>

                                      <div class="col-md-12">
                                          <input id="dt" type="text" maxlength="50" class="form-control" name="dt" value="{{ old('dt') }}" placeholder="Escribe Nombre DT" required autofocus>

                                          @if ($errors->has('dt'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('dt') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                      <label for="image" class="col-md-12 control-label">Logo Del Club</label>

                                      <div class="col-md-6">
                                          <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" >

                                          @if ($errors->has('image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group ">
                                        <label for="content" class="col-md-12 control-label">Deporte</label>

                                        <select id="id_deporte" name="id_deporte" value="{{ old('id_deporte') }}" class="form-control">
                                            @foreach($deportes as $sport)
                                            <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-12 text-center">
                                          <button class="btn btn-primary d-flex justify-content-center" type="submit">Crear Club</button>
                                  </div>
                          </div>
                      </div>
                  </div>
              </div>
              </form>
          </div>
        </div>
        <!-- /#wrapper -->

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
