
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>>> {{ $club[0]->name }} | LCU <<</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <!-- DL Menu CSS -->
    <link href="{{ url('js/dl-menu/component.css') }}" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{ url('css/slick.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/slick-theme.css') }}" rel="stylesheet"/>
    <!-- ICONS CSS -->
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ url('css/svg-icons.css') }}" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{ url('css/prettyPhoto.css') }}" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="{{ url('css/typography.css') }}" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="{{ url('css/widget.css') }}" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="{{ url('css/shortcodes.css') }}" rel="stylesheet">
	<!-- Custom Main StyleSheet CSS -->
    <link href="{{ url('css/estilos.css') }}" rel="stylesheet">
	<!-- Color CSS -->
    <link href="{{ url('css/color.css') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet">

  </head>

  <body>

<!--kode Wrapper Start-->
<div class="kode_wrapper">
	<!--Header 2 Wrap Start-->
    <header class="kode_header_2">
        <!--Header 2 Top Bar Start-->
        <div class="kf_top_bar">
            <div class="container">
                <div class="pull-left">
                    <ul class="kf_social2">
                        <li><a href="https://www.instagram.com/lcu_venezuela/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/lcu_venezuela?lang=es"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="kf_right_dec">
                    <ul class="kf_topdec">
                        <li>
                            <div class="kf_lung">
                                <a href="{{ url('contacto') }}">
                                    <span>¿Quíeres patrocinar la liga?</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <!-- <ul class="kf_user">
                        <li><a href="#"><i class="fa fa-lock"></i>Sign up</a></li>
                        <li><a href="#">Login</a></li>
                    </ul> -->
                    
                </div>
            </div>
        </div>
        <!--Header 2 Top Bar End-->
        <div class="container">
            <!--Logo Bar Start-->
            <div class="kode_logo_bar">
                <!--Logo Start-->
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="../images/lt-lcu-logo.png" alt="">
                    </a>
                </div>
                <!--Logo Start-->
                <!--Navigation Wrap Start-->
                <div class="kode_navigation">
                    <!--Navigation Start-->
                    <ul class="nav">
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>
                            <a href="#">Disciplinas</a>
                            <ul>
                            @foreach($deportes as $sports)
                                <li><a href="{{url('sport', $sports->id)}}">{{$sports->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('nosotros')}}">Quienes Somos</a>

                        </li>
                        <li>
                            <a href="#">Universidades</a>
                            <ul>
                            @foreach($disciplinas as $discipli)
                                <li><a href="{{url('detalle_equipo', $discipli->id)}}">{{$discipli->name}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                        <!--<li>
                            <a href="#">Gallería</a>
                        </li>-->
                        <li>
                            <a href="{{url('contacto')}}">Contáctanos</a>

                            </li>
                    </ul>
                    <!--DL Menu Start-->
                    <div id="kode-responsive-navigation" class="dl-menuwrapper">
                        <button class="dl-trigger">Abrir Menú</button>
                        <ul class="dl-menu">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="menu-item kode-parent-menu">
                                <a href="#">Disciplnas</a>
                                <ul class="dl-submenu">
                                @foreach($deportes as $sports)
                                    <li><a href="{{url('sport', $sports->id)}}">{{$sports->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="menu-item kode-parent-menu"><a href="{{url('nosotros')}}">Quienes somos</a>

                            </li>
                            <li class="menu-item kode-parent-menu"><a href="#">Universidades</a>
                                <ul class="dl-submenu">
                                @foreach($disciplinas as $discipli)
                                    <li><a href="{{url('detalle_equipo', $discipli->id)}}">{{$discipli->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <!--<li class="menu-item kode-parent-menu"><a href="#">Gallería</a>
                            </li>-->
                            <li class="menu-item kode-parent-menu"><a href="{{url('contacto')}}">Contáctanos</a>
                            </li>
                        </ul>
                    </div>
                    <!--DL Menu END-->
                    <!--Navigation End-->

                </div>
                <!--Navigation Wrap End-->
            </div>
            <!--Logo Bar End-->
        </div>
    </header>
    <!--Header 2 Wrap End-->
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>{{ $club[0]->name }}</h3>
        </div>
    </div>
    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="kf_overview margin-0">
            <div class="container">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="overview">
                        <div class="overview_wrap">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="text-center">
                                    <img class="mx-auto d-block" src="../../storage/app/{{ $club[0]->image }}"  width="35%" height="35%" alt="">
                                    <br>
                                    <br>
                                    </div>
                                    <div class="kf_overview kf_overview_roster">
                                        <!--Heading 1 Start-->
                                        <h6 class="kf_hd1 margin_0">
                                            <span>Plantilla / Jugadores</span>
                                        </h6>
                                        <!--Heading 1 End-->
                                        <!--Table 2 Start-->
                                        <ul class="kf_table2">
                                            <li class="table_head">
                                                <div class="tb2_name">
                                                    <span>Nombre</span>
                                                </div>
                                                <div class="tb2_position">
                                                    <span>Apellido</span>
                                                </div>
                                                <div class="tb2_age">
                                                    <span>Posición</span>
                                                </div>
                                                <div class="tb2_height ">
                                                    <span>Fecha Nacimiento</span>
                                                </div>
                                                <div class="tb2_weight">
                                                    <span>Ciudad de Origen</span>
                                                </div>
                                            </li>
                                            @foreach($team as $jugador)
                                            <li>
                                                <div class="tb2_name">
                                                    <span>{{ $jugador->name }}</span>
                                                </div>
                                                <div class="tb2_position">
                                                    <span>{{ $jugador->lastname }}</span>
                                                </div>
                                                <div class="tb2_age">
                                                    <span>{{ $jugador->posicion }}</span>
                                                </div>
                                                <div class="tb2_height ">
                                                    <span>{{ $jugador->fecha_nacimiento }}</span>
                                                </div>
                                                <div class="tb2_weight">
                                                    <span>{{ $jugador->ciudad_origen }}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <!--Table 2 End-->
                                    </div>
                                    <!--Overview Contant End-->
                                </div>
                                <aside class="col-md-4">
                                    <!--Widget League Table Start-->
                                    <div class="widget widget_ranking widget_league_table">
                                        <!--Heading 1 Start-->
                                        <h6 class="kf_hd1">
                                        <span>Tabla de Posiciones</span>
                                </h6>
                                <!--Heading 1 END-->
                                <div class="kf_border">
                                    <!--Table Wrap Start-->
                                    <ul class="kf_table">
                                        <li class="table_head">
                                            <div class="team_name">
                                                <strong>Equipo</strong>
                                            </div>
                                            <div class="team_logo">
                                            </div>
                                            <div class="match_win">
                                                <strong>V</strong>
                                            </div>
                                            <div class="match_loss">
                                                <strong>D</strong>
                                            </div>
                                            <div class="team_point">
                                                <strong>PTS</strong>
                                            </div>
                                        </li>
                                        @foreach($tabla as $team)
                                        <li>
                                            <div class="table_no">
                                                <span>{{ $loop->iteration }}</span>
                                            </div>
                                            <div class="team_logo">
                                                <span><img width="20" height="20" src="../../storage/app/{{ $team->image }}" alt=""></span>
                                                <a href="#">{{ $team->name }}</a>
                                            </div>
                                            <div class="match_win">
                                                <span>{{ $team->victorias }}</span>
                                            </div>
                                            <div class="match_win">
                                                <span>{{ $team->derrotas }}</span>
                                            </div>
                                            <div class="team_point">
                                                <span>{{ $team->puntos }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        

                                    </ul>
                                            <!--Table Wrap End-->
                                        </div>
                                    </div>
                                    <!--Widget League Table End-->
                                    <!--Widget Player Start-->
                                    <div class="widget widget_player">
                                        <!--Heading 1 Start-->
                                        <h6 class="kf_hd1">
                                            <span>Proximos Partidos</span>
                                        </h6>
                                        <!--Heading 1 END-->
                                        <div class="kf_border">
                                            <ul>
                                                @foreach($partidos as $match)
                                                <li>
                                                    <span class="date_2">{{ $match->fecha }}</span>
                                                    <div class="kf_opponents_wrap">
                                                        <div class="kf_opponents_dec">
                                                            <span><img src="../storage/app/{{ $match->imagen1 }}" alt=""></span>
                                                            <div class="text">
                                                                <h6><a href="#">{{ $match->primero }}</a></h6>
                                                            </div>
                                                        </div>
                                                        <div class="kf_opponents_gols">
                                                            <h5><span>VS</span></h5>
                                                        </div>
                                                        <div class="kf_opponents_dec span_right">
                                                            <span><img src="../storage/app/{{ $match->imagen2 }}" alt=""></span>
                                                            <div class="text">
                                                                <h6><a href="#">{{ $match->segundo }}</a></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Widget Player End-->
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->
   <!--ticker Wrap Start-->
   <div class="kf_ticker-wrap twitter_ticker">
        <div class="container">
            <div class="kf_ticker">
                <span><i class="fa fa-twitter"></i></span>
                <div class="kf_ticker_slider">
                    <ul class="ticker">
                    @foreach($data as $key => $value)
                        <li><p>{{ $value['text'] }}</p></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--ticker Wrap End-->
    <!--Footer Wrap Start-->
    <footer class="kode_footer_2">
        <div class="container">
            <span class="go-up">
                <i class="fa fa-angle-up"></i>
            </span>
            <div class="row">
                <div class="col-md-9">
                    <!--Widget Text Start-->
                    <div class="widget widget_text">
                        <div class="logo">
                            <a href="#"><img src="images/lt-lcu-logo.png" alt=""></a>
                        </div>
                        <ul class="kf_contact_meta">
                            <li>
                                <span class="icon-placeholder"></span>
                                <address>Av. Andres Bello con Av. Urdaneta, Edf. Universidad Alejandro Humboldt</address>
                                <address>Piso 1 - Al lado de la oficina de la Direccion de Deportes - Caracas</address>
                            </li>
                            <li>
                                <span class="icon-mail"></span>
                                <p>secretarialcu2016@gmail.com</p>
                            </li>
                            <li>
                                <span class="icon-technology"></span>
                                <p>+58 212 5784169 Extensión 133</p>
                                <p>+58 212 5785197 Extensión 133</p>
                                <p>+58 212 5784181 Extensión 133</p>
                            </li>
                        </ul>
                    </div>
                    <!--Widget Text End-->
                </div>
                <div class="col-md-3">
                    <div class="widget widget_link2">
                        <h2 class="kf_hd7">Links de Utilidad</h2>
                        <!--Widget Recent Post Start-->
                        <ul class="links_dec links_dec2">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('nosotros') }}">¿Quíenes somos?</a></li>
                            <li><a href="{{ url('contacto') }}">Contáctanos</a></li>
                        </ul>
                        <!--Widget Recent Post End-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer Wrap End-->
    <!--Copy Right Wrap Start-->
    <div class="copy_right3">
        <div class="container">
            <p>2018 @ LCU  Diseñado por <a href="http://hitodesigns.online/home/">EGU Advertising & Hito Designs</a></p>
            <ul class="kf_social3">
                <li><a href="https://www.instagram.com/lcu_venezuela/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/lcu_venezuela?lang=es"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
    <!--Copy Right Wrap End-->
    <!--Register Pop Up Wrap Start-->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search">
        <div class="modal-dialog" role="document">
            <div class="input_dec">
                <input type="text" placeholder="search......">
                <button class="btn_icon"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <!--Register Pop Up Wrap End-->
</div>
    <!--Register Pop Up Wrap End-->
</div>
<!--kode Wrapper End-->
    <!--Jquery Library-->
    <script src="{{ url('js/jquery.js') }}"></script>
	<!--Bootstrap core JavaScript-->
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <!--Slick Slider JavaScript-->
    <script src="{{ url('js/slick.min.js') }}"></script>
    <!--Number Count (Waypoints) JavaScript-->
    <script src="{{ url('js/downCount.js') }}"></script>
    <script src="{{ url('js/waypoints-min.js') }}"></script>
    <!--Dl Menu Script-->
    <script src="{{ url('js/dl-menu/modernizr.custom.js') }}"></script>
    <script src="{{ url('js/dl-menu/jquery.dlmenu.js') }}"></script>
    <!--Progress bar JavaScript-->
    <script src="{{ url('js/jprogress.js') }}" type="text/javascript"></script>
    <!--Pretty Photo JavaScript-->
    <script src="{{ url('js/jquery.prettyPhoto.js') }}"></script>
    <!--Custom JavaScript-->
	<script src="{{ url('js/custom.js') }}"></script>

  </body>
</html>
