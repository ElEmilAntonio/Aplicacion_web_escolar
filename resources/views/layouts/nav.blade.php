<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #00CCFF" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       <i class="fa fa-list-ol"></i> Cursos <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @if (count($cursos) > 0)
    @foreach ($cursos as $curso)
      <div class="dropdown-divider"></div>
    @if(count($unidades)>0)
    @foreach($unidades as $unidade)
        <a class="dropdown-item" onclick="location.href='/Docente_curso/{{ $curso->ClaveCurso}}/{{$unidade->NumeroUnidad}}'" method="POST">
       {{ $curso->ClaveCurso}} Unidad: {{$unidade->NumeroUnidad}}
    </a>
      @endforeach
  @endif
    @endforeach
  @endif
</div>
</li>