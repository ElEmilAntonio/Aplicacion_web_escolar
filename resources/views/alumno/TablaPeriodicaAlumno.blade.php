
<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema web quimica') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   @if($ver!=null)
    <script type="text/javascript">
    $(document).ready(function() {
      $('#modalelemento').modal('show');
    });
</script>
    @endif
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <style>
         .navbar-nav li:hover{
  color: black !important;
  font-size: 17px;
  }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 25px;
            }
            .button       { background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button2      {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button3      {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button4      {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button5      {background-color: #FFB84D;
                    width: 100%;
                    height:100%;}
            .button6      {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button7      {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button8      {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button9      {background-color: #70DB70;
                    width: 100%;
                    height:100%;}
            .button10     {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button11     {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button12     {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button13     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button14     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;}
            .button15     {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button16     {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button17     {background-color: #70DB70;
                    width: 100%;
                    height:100%;}
            .button18     {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button19     {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button20     {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button21     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button22     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button23     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button24     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button25     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button26     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button27     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button28     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button29     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button30     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button31     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button32     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;} 
            .button33     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;} 
            .button34     {background-color: #00CCFF;
                    width: 100%;
                    height:100%;}
            .button35     {background-color: #70DB70;
                    width: 100%;
                    height:100%;}
            .button36     {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button37     {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button38     {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button39     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button40     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button41     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button42     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button43     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button44     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button45     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button46     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button47     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button48     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button49     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button50     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button51     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;}
            .button52     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;}
            .button53     {background-color: #70DB70;
                    width: 100%;
                    height:100%;}
            .button54     {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button55     {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button56     {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button57     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button58     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button59     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button60     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button61     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button62     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button63     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button64     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button65     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button66     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button67     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button68     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button69     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button70     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button71     {background-color: #00466B;
                    width: 100%;
                    height:100%;}
            .button72     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button73     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button74     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button75     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button76     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button77     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button78     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button79     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button80     {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button81     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button82     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button83     {background-color: #FF704D;
                    width: 100%;
                    height:100%;}
            .button84     {background-color: #FFB84D;
                    width: 100%;
                    height:100%;}
            .button85     {background-color: #70DB70;
                    width: 100%;
                    height:100%;}
            .button86     {background-color: #009999;
                    width: 100%;
                    height:100%;}
            .button87     {background-color: #0066CC;
                    width: 100%;
                    height:100%;}
            .button88     {background-color: #CC66CC;
                    width: 100%;
                    height:100%;}
            .button89     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button90     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button91     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button92     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button93     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button94     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button95     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button96     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button97     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button98     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button99     {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button100    {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button101    {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button102    {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button103    {background-color: #742574;
                    width: 100%;
                    height:100%;}
            .button104    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button105    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button106    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button107    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button108    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button109    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button110    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button111    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button112    {background-color: #FF4D4D;
                    width: 100%;
                    height:100%;}
            .button113    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            .button114    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            .button115    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            .button116    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            .button117    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            .button118    {background-color: #96A5A7;
                    width: 100%;
                    height:100%;}
            table         { border-collapse: collapse;
                    border: 1px;
                    top:100px;
                    width: 90%;
                    height: 90%;}
            tr, td        {/* background-color: #000000;*/
                    border: 1px;
                    font-size: 100%;}
            h1      {/*background-color: #000000;*/}
        </style>
</head>
<body>
  
    <div id="app">
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #323232;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('alumno') }}">
                    {{ config('app.name', 'Sistema web quimica') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse como docente') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registararalumno') }}">{{ __('Registrarse como Alumno') }}</a>
                                </li>
                               
                            @endif
                        @else
                        @include('layouts.navAlumno')
                        <li class="nav-item">
                                    <a class="nav-link" style="color: #CC66CC" href="{{ route('editar_alumno') }}"><i class="fa fa-user-circle"></i> {{ __('Alumno') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #4e83f5" href="{{ route('Tabla_Periodica_alumno') }}"><i class="fa fa-table"></i> {{ __('TablaPeriodica') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FF4D4D" href="{{ route('Teoria_Alumno') }}"><i class="fa fa-book"></i> {{ __('Teoria') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FF704D" href="{{ route('Seguimiento_alumno') }}"><i class="fa fa-vcard"></i> {{ __('Seguimiento') }}</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" style="color: #FFB84D" href="{{ route('Asistencias_alumno') }}"><i class="fa fa-calendar-check-o"></i> {{ __('Asistencia') }}</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" style="color: #96A5A7" href="{{ route('Actividades_alumno') }}"><i class="fa fa-pencil"></i> {{ __('Actividades') }}</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" style="color: #b339b3" href="{{ route('Practicas_alumno') }}"><i class="fa fa-flask"></i> {{ __('Practicas') }}</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" style="color: #0c87c7" href="{{ route('Examen_alumno') }}"><i class="fa fa-institution"></i> {{ __('Examenes') }}</a>
                                </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="fa fa-sign-out"></i>  {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      
        <main class="py-4">
            @yield('content')
    <body bgcolor = #000000>
        <table cellspacing = "0px" cellpadding = "0px" align = "center" bgcolor = #000000>
            <tr>
                <td><button title = "Hidrógeno" class = "button" onclick="location.href='/Mostrar_elemento_alumno/1'" method="POST" href="javascript:void(0);"><b><font color = #FFFFFF><sub>1</sub><font face="Trebuchet MS" size="6">H</button></td>

            </tr>
            <tr>
                <td colspan = "17" align = "center"><font color = #D9FC99 size="6">Tabla Periódica</td>
                <td><button title = "Helio" class = "button button2" onclick="location.href='/Mostrar_elemento_alumno/2'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>2</sub><font face="Trebuchet MS" size="6">He</font></button></td>
                
            </tr>
            <tr>
                <td><button title = "Litio" class = "button button3"onclick="location.href='/Mostrar_elemento_alumno/3'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>3</sub><font face="Trebuchet MS" size="6">Li</button></td>
                <td><button title = "Berilio" class = "button button4" onclick="location.href='/Mostrar_elemento_alumno/4'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>4</sub><font face="Trebuchet MS" size="6">Be</button></td>
                <td colspan = "10"></td>
                <td><button title = "Boro" class = "button button5" onclick="location.href='/Mostrar_elemento_alumno/5'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>5</sub><font face="Trebuchet MS" size="6">B</button></td>

                <td><button title = "Carbono" class = "button button6" onclick="location.href='/Mostrar_elemento_alumno/6'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>6</sub><font face="Trebuchet MS" size="6">C</button></td>

                <td><button title = "Nitrogeno" class = "button button7"onclick="location.href='/Mostrar_elemento_alumno/7'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>7</sub><font face="Trebuchet MS" size="6">N</button></td>

                <td><button title = "Oxigeno" class = "button button8" onclick="location.href='/Mostrar_elemento_alumno/8'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>8</sub><font face="Trebuchet MS" size="6">O</button></td>

                <td><button title = "Fluor" class = "button button9" onclick="location.href='/Mostrar_elemento_alumno/9'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>9</sub><font face="Trebuchet MS" size="6">F</button></td>

                <td><button title = "Neon" class = "button button10" onclick="location.href='/Mostrar_elemento_alumno/10'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>10</sub><font face="Trebuchet MS" size="6">Ne</button></td>
            </tr>
            <tr>
                <td><button title = "Sodio" class = "button button11" onclick="location.href='/Mostrar_elemento_alumno/11'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>11</sub><font face="Trebuchet MS" size="6">Na</button></td>
                <td><button title = "Magnesio" class = "button button12" onclick="location.href='/Mostrar_elemento_alumno/12'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>12</sub><font face="Trebuchet MS" size="6">Mg</button></td>
                <td colspan = "10"></td>
                <td><button title = "Aluminio" class = "button button13" onclick="location.href='/Mostrar_elemento_alumno/13'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>13</sub><font face="Trebuchet MS" size="6">Al</button></td>
                <td><button title = "Silicio" class = "button button14" onclick="location.href='/Mostrar_elemento_alumno/14'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>14</sub><font face="Trebuchet MS" size="6">Si</button></td>
                <td><button title = "Phosphorus" class = "button button15" onclick="location.href='/Mostrar_elemento_alumno/15'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>15</sub><font face="Trebuchet MS" size="6">P</button></td>
                <td><button title = "Sulphur" class = "button button16" onclick="location.href='/Mostrar_elemento_alumno/16'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>16</sub><font face="Trebuchet MS" size="6">S</button></td>
                <td><button title = "Chlorine" class = "button button17" onclick="location.href='/Mostrar_elemento_alumno/17'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>17</sub><font face="Trebuchet MS" size="6">Cl</button></td>
                <td><button title = "Argon" class = "button button18" onclick="location.href='/Mostrar_elemento_alumno/18'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>18</sub><font face="Trebuchet MS" size="6">Ar</button></td>
            </tr>
            <tr>
                <td><button title = "Potassium" class = "button button19" onclick="location.href='/Mostrar_elemento_alumno/19'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>19</sub><font face="Trebuchet MS" size="6">K</button></td>
                <td><button title = "Calcium" class = "button button20" onclick="location.href='/Mostrar_elemento_alumno/20'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>20</sub><font face="Trebuchet MS" size="6">Ca</button></td>
                <td><button title = "Scandium" class = "button button21" onclick="location.href='/Mostrar_elemento_alumno/21'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>21</sub><font face="Trebuchet MS" size="6">Sc</button></td>
                <td><button title = "Titanium" class = "button button22" onclick="location.href='/Mostrar_elemento_alumno/22'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>22</sub><font face="Trebuchet MS" size="6">Ti</button></td>
                <td><button title = "Vanadium" class = "button button23"onclick="location.href='/Mostrar_elemento_alumno/23'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>23</sub><font face="Trebuchet MS" size="6">V</button></td>
                <td><button title = "Chromium" class = "button button24" onclick="location.href='/Mostrar_elemento_alumno/24'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>24</sub><font face="Trebuchet MS" size="6">Cr</button></td>
                <td><button title = "Manganese" class = "button button25"onclick="location.href='/Mostrar_elemento_alumno/25'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>25</sub><font face="Trebuchet MS" size="6">Mn</button></td>
                <td><button title = "Iron" class = "button button26"onclick="location.href='/Mostrar_elemento_alumno/26'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>26</sub><font face="Trebuchet MS" size="6">Fe</button></td>
                <td><button title = "Cobalt" class = "button button27" onclick="location.href='/Mostrar_elemento_alumno/27'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>27</sub><font face="Trebuchet MS" size="6">Co</button></td>
                <td><button title = "Nickel" class = "button button28" onclick="location.href='/Mostrar_elemento_alumno/28'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>28</sub><font face="Trebuchet MS" size="6">Ni</button></td>
                <td><button title = "Copper" class = "button button29" onclick="location.href='/Mostrar_elemento_alumno/29'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>29</sub><font face="Trebuchet MS" size="6">Cu</button></td>
                <td><button title = "Zinc" class = "button button30" onclick="location.href='/Mostrar_elemento_alumno/30'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>30</sub><font face="Trebuchet MS" size="6">Zn</button></td>
                <td><button title = "Gallium" class = "button button31" onclick="location.href='/Mostrar_elemento_alumno/31'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>31</sub><font face="Trebuchet MS" size="6">Ga</button></td>
                <td><button title = "Germanium" class = "button button32" onclick="location.href='/Mostrar_elemento_alumno/32'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>32</sub><font face="Trebuchet MS" size="6">Ge</button></td>
                <td><button title = "Arsenic" class = "button button33"onclick="location.href='/Mostrar_elemento_alumno/33'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>33</sub><font face="Trebuchet MS" size="6">As</button></td>
                <td><button title = "Selenium" class = "button button34" onclick="location.href='/Mostrar_elemento_alumno/34'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>34</sub><font face="Trebuchet MS" size="6">Se</button></td>
                <td><button title = "Bromine" class = "button button35"onclick="location.href='/Mostrar_elemento_alumno/35'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>35</sub><font face="Trebuchet MS" size="6">Br</button></td>
                <td><button title = "Krypton" class = "button button36" onclick="location.href='/Mostrar_elemento_alumno/37'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>36</sub><font face="Trebuchet MS" size="6">Kr</button></td>
            </tr>
            <tr>
                <td><button title = "Rubidium" class = "button button37" onclick="location.href='/Mostrar_elemento_alumno/37'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>37</sub><font face="Trebuchet MS" size="6">Rb</button></td>
                <td><button title = "Strontium" class = "button button38" onclick="location.href='/Mostrar_elemento_alumno/38'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>38</sub><font face="Trebuchet MS" size="6">Sr</button></td>
                <td><button title = "Yttrium" class = "button button39" onclick="location.href='/Mostrar_elemento_alumno/39'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>39</sub><font face="Trebuchet MS" size="6">Y</button></td>
                <td><button title = "Zirconium " class = "button button40" onclick="location.href='/Mostrar_elemento_alumno/40'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>40</sub><font face="Trebuchet MS" size="6">Zr</button></td>
                <td><button title = "Niobium" class = "button button41" onclick="location.href='/Mostrar_elemento_alumno/41'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>41</sub><font face="Trebuchet MS" size="6">Nb</button></td>
                <td><button title = "Molybdenum" class = "button button42" onclick="location.href='/Mostrar_elemento_alumno/42'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>42</sub><font face="Trebuchet MS" size="6">Mo</button></td>
                <td><button title = "Technetium" class = "button button43"onclick="location.href='/Mostrar_elemento_alumno/43'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>43</sub><font face="Trebuchet MS" size="6">Tc</button></td>
                <td><button title = "Ruthenium" class = "button button44" onclick="location.href='/Mostrar_elemento_alumno/44'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>44</sub><font face="Trebuchet MS" size="6">Ru</button></td>
                <td><button title = "Rhodium" class = "button button45" onclick="location.href='/Mostrar_elemento_alumno/45'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>45</sub><font face="Trebuchet MS" size="6">Rh</button></td>
                <td><button title = "Paladium" class = "button button46" onclick="location.href='/Mostrar_elemento_alumno/46'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>46</sub><font face="Trebuchet MS" size="6">Pd</button></td>
                <td><button title = "Silver" class = "button button47" onclick="location.href='/Mostrar_elemento_alumno/47'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>47</sub><font face="Trebuchet MS" size="6">Ag</button></td>
                <td><button title = "Cadmium" class = "button button48" onclick="location.href='/Mostrar_elemento_alumno/48'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>48</sub><font face="Trebuchet MS" size="6">Cd</button></td>
                <td><button title = "Indium" class = "button button49" onclick="location.href='/Mostrar_elemento_alumno/49'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>49</sub><font face="Trebuchet MS" size="6">In</button></td>
                <td><button title = "Tin" class = "button button50" onclick="location.href='/Mostrar_elemento_alumno/50'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>50</sub><font face="Trebuchet MS" size="6">Sn</button></td>
                <td><button title = "Antimony" class = "button button51" onclick="location.href='/Mostrar_elemento_alumno/51'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>51</sub><font face="Trebuchet MS" size="6">Sb</button></td>
                <td><button title = "Tellurium" class = "button button52" onclick="location.href='/Mostrar_elemento_alumno/52'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>52</sub><font face="Trebuchet MS" size="6">Te</button></td>
                <td><button title = "Iodine" class = "button button53"onclick="location.href='/Mostrar_elemento_alumno/53'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>53</sub><font face="Trebuchet MS" size="6">I</button></td>
                <td><button title = "Xenon" class = "button button54" onclick="location.href='/Mostrar_elemento_alumno/54'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>54</sub><font face="Trebuchet MS" size="6">Xe</button></td>
            </tr>
            <tr>
                <td><button title = "Caesium" class = "button button55" onclick="location.href='/Mostrar_elemento_alumno/55'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>55</sub><font face="Trebuchet MS" size="6">Cs</button></td>
                <td><button title = "Barium" class = "button button56" onclick="location.href='/Mostrar_elemento_alumno/56'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>56</sub><font face="Trebuchet MS" size="6">Ba</button></td>
                <td align="center"><font size="5" color="#FFFFFF">La</td>
                <td><button title = "Hafnium" class = "button button72" onclick="location.href='/Mostrar_elemento_alumno/72'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>72</sub><font face="Trebuchet MS" size="6">Hf</button></td>
                <td><button title = "Tantalum" class = "button button73" onclick="location.href='/Mostrar_elemento_alumno/73'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>73</sub><font face="Trebuchet MS" size="6">Ta</button></td>
                <td><button title = "Tungsten" class = "button button74" onclick="location.href='/Mostrar_elemento_alumno/74'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>74</sub><font face="Trebuchet MS" size="6">W</button></td>
                <td><button title = "Rhenium" class = "button button75" onclick="location.href='/Mostrar_elemento_alumno/75'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>75</sub><font face="Trebuchet MS" size="6">Re</button></td>
                <td><button title = "Osmium" class = "button button76" onclick="location.href='/Mostrar_elemento_alumno/76'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>76</sub><font face="Trebuchet MS" size="6">Os</button></td>
                <td><button title = "Iridium" class = "button button77" onclick="location.href='/Mostrar_elemento_alumno/77'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>77</sub><font face="Trebuchet MS" size="6">Ir</button></td>
                <td><button title = "Platinum" class = "button button78" onclick="location.href='/Mostrar_elemento_alumno/78'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>78</sub><font face="Trebuchet MS" size="6">Pt</button></td>
                <td><button title = "Gold" class = "button button79" onclick="location.href='/Mostrar_elemento_alumno/79'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>79</sub><font face="Trebuchet MS" size="6">Au</button></td>
                <td><button title = "Mercury" class = "button button80"onclick="location.href='/Mostrar_elemento_alumno/80'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>80</sub><font face="Trebuchet MS" size="6">Hg</button></td>
                <td><button title = "Thallium" class = "button button81"onclick="location.href='/Mostrar_elemento_alumno/81'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>81</sub><font face="Trebuchet MS" size="6">Tl</button></td>
                <td><button title = "Lead" class = "button button82" onclick="location.href='/Mostrar_elemento_alumno/82'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>82</sub><font face="Trebuchet MS" size="6">Pb</button></td>
                <td><button title = "Bismuth" class = "button button83" onclick="location.href='/Mostrar_elemento_alumno/83'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>83</sub><font face="Trebuchet MS" size="6">Bi</button></td>
                <td><button title = "Polonium" class = "button button84" onclick="location.href='/Mostrar_elemento_alumno/84'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>84</sub><font face="Trebuchet MS" size="6">Po</button></td>
                <td><button title = "Astatine" class = "button button85" onclick="location.href='/Mostrar_elemento_alumno/85'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>85</sub><font face="Trebuchet MS" size="6">At</button></td>
                <td><button title = " Radon" class = "button button86" onclick="location.href='/Mostrar_elemento_alumno/86'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>86</sub><font face="Trebuchet MS" size="6">Rn</button></td>
            </tr>
            <tr>
                <td><button title = "Francium" class = "button button87" onclick="location.href='/Mostrar_elemento_alumno/87'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>87</sub><font face="Trebuchet MS" size="6">Fr</button></td>
                <td><button title = "Radium" class = "button button88" onclick="location.href='/Mostrar_elemento_alumno/88'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>88</sub><font face="Trebuchet MS" size="6">Ra</button></td>
                <td align="center"><font size="5" color="#FFFFFF">Ac</td>
                <td><button title = "Rutherfordium" class = "button button104" onclick="location.href='/Mostrar_elemento_alumno/104'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>104</sub><font face="Trebuchet MS" size="6">Rf</button></td>
                <td><button title = "Dubnium" class = "button button105" onclick="location.href='/Mostrar_elemento_alumno/105'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>105</sub><font face="Trebuchet MS" size="6">Db</button></td>
                <td><button title = "Seaborgium" class = "button button106" onclick="location.href='/Mostrar_elemento_alumno/106'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>106</sub><font face="Trebuchet MS" size="6">Sh</button></td>
                <td><button title = "Bohrium" class = "button button107" onclick="location.href='/Mostrar_elemento_alumno/107'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>107</sub><font face="Trebuchet MS" size="6">Bh</button></td>
                <td><button title = "Hassium" class = "button button108" onclick="location.href='/Mostrar_elemento_alumno/108'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>108</sub><font face="Trebuchet MS" size="6">Hs</button></td>
                <td><button title = "Meitnerium" class = "button button109" onclick="location.href='/Mostrar_elemento_alumno/109'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>109</sub><font face="Trebuchet MS" size="6">Mt</button></td>
                <td><button title = "Darmstadtium" class = "button button110" onclick="location.href='/Mostrar_elemento_alumno/110'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>110</sub><font face="Trebuchet MS" size="6">Ds</button></td>
                <td><button title = "Roentgenium" class = "button button111" onclick="location.href='/Mostrar_elemento_alumno/111'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>111</sub><font face="Trebuchet MS" size="6">Rg</button></td>
                <td><button title = "Copernicium" class = "button button112" onclick="location.href='/Mostrar_elemento_alumno/112'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>112</sub><font face="Trebuchet MS" size="6">Cn</button></td>
                <td><button title = "Nihonium" class = "button button113" onclick="location.href='/Mostrar_elemento_alumno/113'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>113</sub><font face="Trebuchet MS" size="6">Nh</button></td>
                <td><button title = "Flerovium" class = "button button114"onclick="location.href='/Mostrar_elemento_alumno/114'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>114</sub><font face="Trebuchet MS" size="6">Fl</button></td>
                <td><button title = "Moscovium" class = "button button115" onclick="location.href='/Mostrar_elemento_alumno/115'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>115</sub><font face="Trebuchet MS" size="6">Mc</button></td>
                <td><button title = "Livermorium" class = "button button116"onclick="location.href='/Mostrar_elemento_alumno/116'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>116</sub><font face="Trebuchet MS" size="6">Lv</button></td>
                <td><button title = "Tennesine" class = "button button117" onclick="location.href='/Mostrar_elemento_alumno/117'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>117</sub><font face="Trebuchet MS" size="6">Ts</button></td>
                <td><button title = "Oganesson" class = "button button118" onclick="location.href='/Mostrar_elemento_alumno/118'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>118</sub><font face="Trebuchet MS" size="6">Og</button></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td colspan = "2"><font size = "5" color = "#FFFFFF">Lantánidos</td>
                <td><button title = "Lanthanum" class = "button button57" onclick="location.href='/Mostrar_elemento_alumno/57'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>57</sub><font face="Trebuchet MS" size="6">La</button></td>
                <td><button title = "Cerium" class = "button button58" onclick="location.href='/Mostrar_elemento_alumno/58'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>58</sub><font face="Trebuchet MS" size="6">Ce</button></td>
                <td><button title = "Praseodymium" class = "button button59" onclick="location.href='/Mostrar_elemento_alumno/59'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>59</sub><font face="Trebuchet MS" size="6">Pr</button></td>
                <td><button title = "Neodymium" class = "button button60" onclick="location.href='/Mostrar_elemento_alumno/60'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>60</sub><font face="Trebuchet MS" size="6">Nd</button></td>
                <td><button title = "Promethium" class = "button button61" onclick="location.href='/Mostrar_elemento_alumno/61'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>61</sub><font face="Trebuchet MS" size="6">Pm</button></td>
                <td><button title = "Samarium" class = "button button62" onclick="location.href='/Mostrar_elemento_alumno/62'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>62</sub><font face="Trebuchet MS" size="6">Sm</button></td>
                <td><button title = "Europium" class = "button button63" onclick="location.href='/Mostrar_elemento_alumno/63'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>63</sub><font face="Trebuchet MS" size="6">Eu</button></td>
                <td><button title = "Gadolinium" class = "button button64" onclick="location.href='/Mostrar_elemento_alumno/64'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>64</sub><font face="Trebuchet MS" size="6">Gd</button></td>
                <td><button title = "Terbium" class = "button button65" onclick="location.href='/Mostrar_elemento_alumno/65'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>65</sub><font face="Trebuchet MS" size="6">Tb</button></td>
                <td><button title = "Dysprosium" class = "button button66" onclick="location.href='/Mostrar_elemento_alumno/66'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>66</sub><font face="Trebuchet MS" size="6">Dy</button></td>
                <td><button title = "Holmium" class = "button button67" onclick="location.href='/Mostrar_elemento_alumno/67'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>67</sub><font face="Trebuchet MS" size="6">Ho</button></td>
                <td><button title = "Erbium" class = "button button68" onclick="location.href='/Mostrar_elemento_alumno/68'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>68</sub><font face="Trebuchet MS" size="6">Er</button></td>
                <td><button title = "Thulium" class = "button button69" onclick="location.href='/Mostrar_elemento_alumno/69'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>69</sub><font face="Trebuchet MS" size="6">Tm</button></td>
                <td><button title = "Ytterbium" class = "button button70" onclick="location.href='/Mostrar_elemento_alumno/70'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>70</sub><font face="Trebuchet MS" size="6">Yb</button></td>
                <td><button title = "Lutetium" class = "button button71" onclick="location.href='/Mostrar_elemento_alumno/71'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>71</sub><font face="Trebuchet MS" size="6">Lu</button></td>
            </tr>
            <tr>
                <td colspan = "2"><font size = "5" color = "#FFFFFF">Actínidos</td>
                <td><button title = "Actinium" class = "button button89" onclick="location.href='/Mostrar_elemento_alumno/89'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>89</sub><font face="Trebuchet MS" size="6">Ac</button></td>
                <td><button title = "Thorium" class = "button button90"onclick="location.href='/Mostrar_elemento_alumno/90'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>90</sub><font face="Trebuchet MS" size="6">Th</button></td>
                <td><button title = "Protactinium" class = "button button91"onclick="location.href='/Mostrar_elemento_alumno/91'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>91</sub><font face="Trebuchet MS" size="6">Pa</button></td>
                <td><button title = "Uranium" class = "button button92" onclick="location.href='/Mostrar_elemento_alumno/92'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>92</sub><font face="Trebuchet MS" size="6">U</button></td>
                <td><button title = "Neptunium" class = "button button93"onclick="location.href='/Mostrar_elemento_alumno/93'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>93</sub><font face="Trebuchet MS" size="6">Np</button></td>
                <td><button title = "Plutonium" class = "button button94" onclick="location.href='/Mostrar_elemento_alumno/94'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>94</sub><font face="Trebuchet MS" size="6">Pu</button></td>
                <td><button title = "Americiunm" class = "button button95" onclick="location.href='/Mostrar_elemento_alumno/95'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>95</sub><font face="Trebuchet MS" size="6">Am</button></td>
                <td><button title = "Curium" class = "button button96" onclick="location.href='/Mostrar_elemento_alumno/96'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>96</sub><font face="Trebuchet MS" size="6">Cm</button></td>
                <td><button title = "Berkelium" class = "button button97" onclick="location.href='/Mostrar_elemento_alumno/97'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>97</sub><font face="Trebuchet MS" size="6">Bk</button></td>
                <td><button title = "Californium" class = "button button98" onclick="location.href='/Mostrar_elemento_alumno/98'" href="javascript:void(0);"><b><font color = #FFFFFF ><sub>96</sub><font face="Trebuchet MS" size="6">Cf</button></td>
                <td><button title = "Einsteinium" class = "button button99" onclick="location.href='/Mostrar_elemento_alumno/99'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>99</sub><font face="Trebuchet MS" size="6">Es</button></td>
                <td><button title = "Fermium" class = "button button100" onclick="location.href='/Mostrar_elemento_alumno/100'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>100</sub><font face="Trebuchet MS" size="6">Fm</button></td>
                <td><button title = "Mendelevium" class = "button button101"onclick="location.href='/Mostrar_elemento_alumno/101'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>101</sub><font face="Trebuchet MS" size="6">Md</button></td>
                <td><button title = "Nobelium" class = "button button102"onclick="location.href='/Mostrar_elemento_alumno/102'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>102</sub><font face="Trebuchet MS" size="6">No</button></td>
                <td><button title = "Lawrencium" class = "button button103" onclick="location.href='/Mostrar_elemento_alumno/103'" href="javascript:void(0);"><b><font color = #FFFFFF><sub>103</sub><font face="Trebuchet MS" size="6">Lr</button></td>
            </tr>
        </table>
    </body>
   
  </main>
    </div>
</body>
  <div class="modal fade" id="modalelemento" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel"></h4>
      </div>
      <div class="modal-body">
            
                    <!--INGRESAR EL Numero-->
                   <p  class="row justify-content-center">N°{{$elemento->Numero}}:{{$elemento->Nombre}}({{$elemento->Simbolo}})</p>
                   <p  class="row justify-content-center">Grupo:{{$elemento->Grupo}}, Estado Ordinario:{{$elemento->Periodo}}, Densidad:{{$elemento->Bloque}}, Masa Atomica:{{$elemento->MasaAtomica}}</p>
              <p  class="row justify-content-center">Configuracion Electronica: {{$elemento->ConfElectronica}}, Dureza Mohs: {{$elemento->DurezaMohs}}, Electrones: {{$elemento->Electrones}} </p>
               <p  class="row justify-content-center">Aplicaciones:</p>
              <p  class="row justify-content-center">{{$elemento->Aplicaciones}}</p>
              <p  class="row justify-content-center">Precauciones:</p>
              <p  class="row justify-content-center">{{$elemento->Precauciones}}</p>
              <a href="{{$elemento->Link}}">{{$elemento->Link}}</a>
                    </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Cerrar</button>
        <span class="pull-right">
    
        </span>
      </div>
    </div>
  </div>
</div>
</html>