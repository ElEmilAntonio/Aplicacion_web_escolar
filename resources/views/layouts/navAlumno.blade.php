<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #00CCFF" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-list-ol"></i> Unidades <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    @if(count($unidades)>0)
    @foreach($unidades as $unidade)
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" onclick="location.href='/Alumno_curso/{{$unidade->NumeroUnidad}}'" method="POST">
       Unidad: {{$unidade->NumeroUnidad}}
    </a>
      @endforeach
  @endif
</div>
</li>