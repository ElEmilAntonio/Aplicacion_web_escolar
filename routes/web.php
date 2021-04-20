<?php
use Illuminate\Support\Facades\Auth;
Route::get('/', function () { 
if(Auth::check()){return redirect('/redirigir');}else{return view('auth.login');}});
Route::get('/Bienvenida', function () {    return view('Bienvenida');});
Route::get('/redirigir','HomeController@redirigir')->name('redirigir');
Route::get('/registro','Auth\RegisterController@formulario_alumno')->name('registararalumno');
Auth::routes();
Route::group(['middleware'=>['auth']], function(){
Route::group(['middleware'=>['alumno']],function(){
Route::get('/Alumno', 'AlumnoController@mainalumno')->name('alumno');
Route::get('/Editar_alumno','AlumnoController@index')->name('editar_alumno');
Route::get('/Editar_alumno_guardado/{id}','AlumnoController@update')
->name('editar_alumno_guardado/{id}');
Route::get('/Alumno_curso/{NumeroUnidad}','AlumnoController@CambiarCurso')->name('editar_alumno_curso/{id}');
Route::get('/Teoria_Alumno', 'TemaController@indexalumno')->name('Teoria_Alumno');
Route::get('/Ver_Teoria_Alumno/{Idtema}', 'TemaController@mostrartema')->name('Ver_Teoria_Alumno/{IdTema}');
Route::get('/Tabla_Periodica_alumno', 'HomeController@alumnoTP')->name('Tabla_Periodica_alumno');
Route::get('/Descargar_Archivo/{ArchivoTema}','TemaController@DescargarArchivo')->name('DescargarArchivo/{ArchivoTema}');
Route::get('/Actividades_alumno', 'ActividadController@indexalumno')->name('Actividades_alumno');
Route::get('/Ver_Actividad_alumno/{IdActividad}', 'ActividadController@mostrarActividad')
->name('Ver_Actividad_alumno/{IdActividad}');
Route::get('/Asistencias_alumno', 'AsistenciaController@indexalumno')->name('Asistencias_alumno');
Route::get('/Pasar_lista_alumno/{ClaveAsistenciaAlumno}', 'AsistenciaController@PasarListaAlumno')->name('/Pasar_lista_alumno/{ClaveAsistenciaAlumno}');
Route::get('/Seguimiento_alumno', 'SeguimientoController@indexalumno')->name('Seguimiento_alumno');
Route::get('/Eliminar_cuenta_alumno', 'AlumnoController@destroy')->name('Eliminar_cuenta_alumno');
Route::get('/Mostrar_elemento_alumno/{Numero}','HomeController@MostrarElementoAlumno')->
name('Mostrar_elemento_alumno/{Numero}');
Route::get('/Examen_alumno','ExamenController@indexalumno')->name('Examen_alumno');
Route::get('/tomar_examen_alumno','ExamenController@tomarexamen')->name('tomar_examen_alumno');
Route::post('/Responder_Pregunta_FoV', 'ExamenController@ResponderFoV')->
name('Responder_Pregunta_FoV');
Route::post('/Responder_Pregunta_Opciones', 'ExamenController@ResponderOpciones')->
name('Responder_Pregunta_Opciones');
Route::post('/Responder_Pregunta_Relacional', 'ExamenController@ResponderRelacional')->
name('Responder_Pregunta_Relacional');
Route::get('/permission-denied','DemoController@permissiondenied')->name('nopermission');
Route::get('/Practicas_alumno','PracticaController@indexalumno')->name('Practicas_alumno');
Route::get('/Conocimiento_y_manejo_del_material/{NumeroModelo}','PracticaController@practica2')->name('Conocimiento_y_manejo_del_material/{NumeroModelo}');
Route::get('/Medidas_de_seguridad_en_el_laboratorio/{NumeroModelo}','PracticaController@practica1')->name('Medidas_de_seguridad_en_el_laboratorio/{NumeroModelo}');
Route::get('/Metodos_fisicos_de_separacion_de_mezclas/{NumeroModelo}','PracticaController@practica3')->name('Metodos_fisicos_de_separacion_de_mezclas/{NumeroModelo}');
Route::get('/Reaccion_quimica/{NumeroModelo}','PracticaController@practica4')->name('Reaccion_quimica/{NumeroModelo}');
Route::get('/Tipos_de_compuestos_Acidos_y_bases_a_partir_de_indicadores_naturales/{NumeroModelo}','PracticaController@practica5')->name('Tipos_de_compuestos_Acidos_y_bases_a_partir_de_indicadores_naturales/{NumeroModelo}');
Route::get('/El_ph_de_las_sustancias/{NumeroModelo}','PracticaController@practica6')->name('El_ph_de_las_sustancias/{NumeroModelo}');
Route::get('proceso_de_catalizacion/{NumeroModelo}','PracticaController@practica7')->name('proceso_de_catalizacion/{NumeroModelo}');
Route::get('Reaccion_de_saponificacion/{NumeroModelo}','PracticaController@practica8')->name('Reaccion_de_saponificacion/{NumeroModelo}');});

Route::group(['middleware'=>['docente']],function(){
Route::get('/Docente','DocenteController@maindocente')->name('docente');
Route::get('/Editar_docente','DocenteController@index')->name('editar_docente');
Route::get('/Editar_docente_guardado','DocenteController@update')->name('editar_docente_guardado');
Route::get('/Cambiar_estado_curso', 'DocenteController@CambiarEstadoCurso')->name('Cambiar_estado_curso');
Route::get('/Reiniciar_curso', 'DocenteController@Reiniciarcurso')->name('Reiniciar_curso');
Route::get('/Eliminar_docente', 'DocenteController@Eliminardocente')->name('Eliminar_docente');
Route::get('/Docente_curso/{ClaveCurso}/{NumeroUnidad}','DocenteController@CambiarCurso')->name('editar_docente_curso/{id}');
Route::get('/Teoria_docente', 'TemaController@index')->name('Teoria_docente');
Route::get('/Agregar_Teoria_docente', 'TemaController@irAgregar')->name('Agregar_Teoria_docente');
Route::post('/Guardar_Teoria_docente', 'TemaController@create')->name('Guardar_Teoria_docente');
Route::get('/Descargar_Archivo_Docente/{ArchivoTema}','TemaController@DescargarArchivo')->name('Descargar_Archivo_Docente/{ArchivoTema}');
Route::get('/Eliminar_Teoria_Docente/{IdTema}','TemaController@destroy')->name('Eliminar_Teoria_docente/{IdTema}');
Route::get('/Editar_Teoria_Docente/{IdTema}','TemaController@edit')
->name('Editar_Teoria_docente/{IdTema}');
Route::post('/Actualizar_Teoria_Docente/{IdTema}','TemaController@update')
->name('Actualizar_Teoria_docente/{IdTema}');
Route::get('/Actividades_docente', 'ActividadController@index')->name('Actividades_docente');
Route::get('/Agregar_Actividad_docente', 'ActividadController@irAgregar')->name('Agregar_Actividad_docente');
Route::post('/Guardar_Actividad_docente', 'ActividadController@create')
->name('Guardar_Actividad_docente');
Route::get('/Editar_Actividad_docente/{IdActividad}', 'ActividadController@edit')
->name('Editar_Actividad_docente/{IdActividad}');
Route::post('/Actualizar_Actividad_Docente/{IdActividad}','ActividadController@update')
->name('Actualizar_Actividad_docente/{IdActividad}');
Route::get('/Eliminar_Actividad_Docente/{IdActividad}','ActividadController@destroy')->name('Eliminar_Actividad_docente/{IdActividad}');
Route::get('/Asistencias_docente', 'AsistenciaController@index')->name('Asistencias_docente');
Route::post('/Guardar_Asistencia_docente', 'AsistenciaController@create')
->name('Guardar_Asistencia_docente');
Route::get('/Editar_Asistencia_docente/{IdAsistencia}', 'AsistenciaController@edit')
->name('Editar_Asistencia_docente/{IdAsistencia}');
Route::get('Actualizar_Asistencia_desde_docente/{ClaveAsistenciaAlumno}','AsistenciaController@editarasistenciaalumno')->name('Actualizar_Asistencia_desde_docente/{ClaveAsistenciaAlumno}');
Route::post('/Actualizar_Asistencia_docente/{IdAsistencia}', 'AsistenciaController@update')
->name('Actualizar_Asistencia_docente/{IdAsistencia}');
Route::get('/Eliminar_Asistencia_docente/{IdAsistencia}', 'AsistenciaController@destroy')
->name('Actualizar_Asistencia_docente/{IdAsistencia}');
Route::get('/Tabla_Periodica_docente', 'HomeController@docenteTP')->
name('Tabla_Periodica_docente');
Route::post('/Editar_elemento/{Numero}', 'HomeController@update')->
name('/Editar_elemento/{Numero}');
Route::get('/Mostrar_elemento/{Numero}','HomeController@MostrarElemento')->
name('Mostrar_elemento/{Numero}');
Route::get('/Examen_docente','ExamenController@index')->name('Examen_docente');
Route::post('/Actualizar_examen_docente/{IdExamen}','ExamenController@update')->name('Actualizar_examen_docente/{IdExamen}');
Route::post('/Guardar_PreguntaFoV_docente', 'ExamenController@createFoV')
->name('Guardar_PreguntaFoV_docente');
Route::post('/Guardar_PreguntaOpciones_docente', 'ExamenController@createOpciones')
->name('Guardar_PreguntaOpciones_docente');
Route::post('/Guardar_PreguntaRelacional_docente', 'ExamenController@createRelacional')
->name('Guardar_PreguntaRelacional_docente');
Route::get('/Editar_Pregunta_FoV/{IdPregunta}', 'ExamenController@editFoV')->
name('Editar_Pregunta_FoV/{IdPregunta}');
Route::get('/Eliminar_Pregunta_FoV/{IdPregunta}/{IdExamen}/{NumeroPreguntas}','ExamenController@destroyFoV')->name('Eliminar_Pregunta_FoV/{IdPregunta}/{IdExamen}/{NumeroPreguntas}');
Route::post('/Actualizar_Pregunta_FoV/{IdPregunta}', 'ExamenController@updateFoV')->
name('Actualizar_Pregunta_FoV/{IdPregunta}');
Route::get('/Editar_Pregunta_Opciones/{IdPregunta}', 'ExamenController@editOpciones')->
name('Editar_Pregunta_Opciones/{IdPregunta}');
Route::get('/Eliminar_Pregunta_Opciones/{IdPregunta}/{IdExamen}/{NumeroPreguntas}','ExamenController@destroyOpciones')->name('Eliminar_Pregunta_Opciones/{IdPregunta}/{IdExamen}/{NumeroPreguntas}');
Route::post('/Actualizar_Pregunta_Opciones/{IdPregunta}', 'ExamenController@updateOpciones')->
name('Actualizar_Pregunta_Opciones/{IdPregunta}');
Route::get('/Editar_Pregunta_Relacional/{IdPregunta}', 'ExamenController@editRelacional')->
name('Editar_Pregunta_Relacional/{IdPregunta}');
Route::get('/Eliminar_Pregunta_Relacional/{IdPregunta}/{IdExamen}/{NumeroPreguntas}','ExamenController@destroyRelacional')->name('Eliminar_Pregunta_Relacional/{IdPregunta}/{IdExamen}/{NumeroPreguntas}');
Route::post('/Actualizar_Pregunta_Relacional/{IdPregunta}', 'ExamenController@updateRelacional')->
name('Actualizar_Pregunta_Relacional/{IdPregunta}');
Route::get('/Practica_docente','PracticaController@index')->name('Practicas_docente');
Route::get('/Editar_Practica_docente/{IdPractica}','PracticaController@edit')->name('Editar_Practica_docente/{IdPractica}');
Route::post('/Actualizar_Practica_docente/{IdPractica}','PracticaController@update')->name('Actualizar_Practica_docente/{IdPractica}');
Route::get('/Seguimiento_docente','SeguimientoController@index')->name('Seguimiento_docente');
Route::post('/Actualizar_Porcentajes_docente','SeguimientoController@update')->name('/Actualizar_Porcentajes_docente');
Route::get('/Seguimiento_docente_actividad/{ClaveActividadAlumno}','SeguimientoController@editaractividad')->name('Seguimiento_docente_actividad/{ClaveActividadAlumno}');
Route::post('/Seguimiento_Actualizar_Actividad_docente/{ClaveActividadAlumno}', 'SeguimientoController@verificardatosactividad')
->name('Seguimiento_Actualizar_Actividad_docente/{ClaveActividadAlumno}');
Route::post('/Seguimiento_Actualizar_Examen_docente/{ClaveExamenAlumno}', 'SeguimientoController@updateexamen')
->name('Seguimiento_Actualizar_Examen_docente/{ClaveExamenAlumno}');
Route::get('/Seguimiento_Registrar_Unidad','SeguimientoController@registrarcalificaciounidad')->name('/Seguimiento_Registrar_Unidad');
Route::get('/Seguimiento_docente_final','SeguimientoController@calificacionfinal')->name('/Seguimiento_docente_final');
Route::get('/permission-denied','DemoController@permissiondenied')->name('nopermission'
);
});
});
