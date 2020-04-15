<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sección de Banners</title>

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
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

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
                  <h1 class="page-header">Gestión de Banners</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <div>
              <form action="{{ url('banners') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12 ">
                      <div class="panel panel-default">

                          <div class="panel-body col-12">

                                  <div class="form-group{{ $errors->has('image_central') ? ' has-error' : '' }}">
                                      <label for="image_central" class="col-md-12 control-label">Banner Publicitario Central</label>

                                      <div class="col-md-6">
                                          <input id="image_central" type="file" class="form-control" name="image_central" value="{{ old('image_central') }}" required autofocus>

                                          @if ($errors->has('image_central'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image_central') }}</strong>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="col-md-6">
                                        <img width="300" height="150" src="../storage/app/{{$banner1[0]->image}}" alt="">
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('link1') ? ' has-error' : '' }}">
                                      <div class="col-md-12">
                                        @if(!is_null($banner1[0]->link))
                                           <input id="link1" type="hidden" class="form-control" name="link1" placeholder="{{banner1[0]->link}}">
                                        @else
                                          <input id="link1" type="hidden" class="form-control" name="link1">
                                        @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('image_lateral1') ? ' has-error' : '' }}">
                                      <label for="image_lateral1" class="col-md-12 control-label">Primer Banner Lateral</label>

                                      <div class="col-md-6">
                                          <input id="image_lateral1" type="file" class="form-control" name="image_lateral1" value="{{ old('image_lateral1') }}" required autofocus>

                                          @if ($errors->has('image_lateral1'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image_lateral1') }}</strong>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="col-md-6">
                                        <img width="150" height="150" src="../storage/app/{{$banner2[0]->image}}" alt="">
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('link2') ? ' has-error' : '' }}">
                                      <div class="col-md-12">
                                        @if(!is_null($banner1[0]->link))
                                           <input id="link2" type="hidden" class="form-control" name="link2" placeholder="{{banner2[0]->link}}">
                                        @else
                                          <input id="link2" type="hidden" class="form-control" name="link2">
                                        @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('image_lateral2') ? ' has-error' : '' }}">
                                      <label for="image_lateral2" class="col-md-12 control-label">Segundo Banner Lateral</label>

                                      <div class="col-md-6">
                                          <input id="image_lateral2" type="file" class="form-control" name="image_lateral2" value="{{ old('image_lateral2') }}"  required autofocus>

                                          @if ($errors->has('image_lateral2'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image_lateral2') }}</strong>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="col-md-6">
                                        <img width="150" height="150" src="../storage/app/{{$banner3[0]->image}}" alt="">
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('link3') ? ' has-error' : '' }}">
                                      <div class="col-md-12">
                                        @if(!is_null($banner1[0]->link))
                                           <input id="link3" type="hidden" class="form-control" name="link3" placeholder="{{banner3[0]->link}}">
                                        @else
                                          <input id="link3" type="hidden" class="form-control" name="link3">
                                        @endif
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('image_lateral3') ? ' has-error' : '' }}">
                                      <label for="image_lateral3" class="col-md-12 control-label">Tercer Banner Lateral</label>

                                      <div class="col-md-6">
                                          <input id="image_lateral3" type="file" class="form-control" name="image_lateral3" value="{{ old('image_lateral3') }}" required autofocus>

                                          @if ($errors->has('image_lateral3'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('image_lateral3') }}</strong>
                                              </span>
                                          @endif
                                      </div>

                                      <div class="col-md-6">
                                        <img width="150" height="150" src="../storage/app/{{$banner4[0]->image}}" alt="">
                                      </div>
                                  </div>

                                  <div class="form-group{{ $errors->has('link4') ? ' has-error' : '' }}">
                                      <div class="col-md-12">
                                        @if(!is_null($banner1[0]->link))
                                           <input id="link4" type="hidden" class="form-control" name="link4" placeholder="{{banner4[0]->link}}">
                                           <br>
                                        @else
                                          <input id="link4" type="hidden" class="form-control" name="link4">
                                          <br>
                                        @endif
                                      </div>
                                  </div>
                                  <br>
                                  <br>
                                  <br>
                                  <div class="col-md-12 text-center ">
                                          <button class="btn btn-primary d-flex justify-content-center" type="submit">Cargar Banners</button>
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
