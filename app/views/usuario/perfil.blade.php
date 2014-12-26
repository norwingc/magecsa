@extends('templates.maintemplate')
@section('contenido')
<div class="perfil">

	<div class="col-xs-8 mobil avatar">
		<img src="{{ asset('img/bd.png') }}" alt="" class="img-responsive">
	</div>

	@if(Auth::check() && Auth::user()->id == $user->id )		
			<div class="menuprofile-mobil mobil">
				<ul>
					<li class="active"><a href="#datoscuenta" data-toggle="tab">Datos De la Cuenta</a></li>
			      	<li><a href="#datospersonales" data-toggle="tab">Datos Personales</a></li>
			      	<li><a href="#expectativa" data-toggle="tab">Expectativa Laboral</a></li>
			      	<li><a href="#experiencia" data-toggle="tab">Experiencia Profecional</a></li>
			      	<li><a href="#formacion" data-toggle="tab">Formacion Academica</a></li>
			      	<li><a href="#otros" data-toggle="tab">Otros Estudios</a></li>	      	
				</ul>		
			</div>

			<div class="col-xs-3 computer" style="margin-top: 2em"> 
				<img src="http://www.larazon.com.ar/actualidad/foto-tomada-Alberto-Diaz-Korda_IECIMA20131123_0002_19.jpg" alt="" class="img-responsive avatar">
			    <ul class="nav nav-tabs tabs-left">
			      	<li class="active"><a href="#datoscuenta" data-toggle="tab">Datos De la Cuenta</a></li>
			     	<li><a href="#datospersonales" data-toggle="tab">Datos Personales</a></li>
			      	<li><a href="#expectativa" data-toggle="tab">Expectativa Laboral</a></li>
			      	<li><a href="#experiencia" data-toggle="tab">Experiencia Profecional</a></li>
			      	<li><a href="#formacion" data-toggle="tab">Formacion Academica</a></li>
			      	<li><a href="#otros" data-toggle="tab">Otros Estudios</a></li>	      	
			    </ul>
			</div>

			<div class="col-xs-12 col-md-9">
			    <!-- Tab panes -->
			    <div class="tab-content contenidoperfil">
				    @if(Session::has('message'))
						<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
					<div class="tab-pane active" id="datoscuenta">	
						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
					
						<h3 class="titulother">
							<img src="{{ asset('img/datoscuenta.png') }}" alt="" class="computer">
							Datos de la cuenta
						</h3>
						<div class="formu">
							{{ Form::open(array('url' => 'perfil/update/datoscuenta/' . $user->id, 'class' => 'form-horizontal')) }}
								<div class="campo col-sm-offset-4">
									<div class="form-group">						
									    <div class="col-sm-6">
									      {{ Form::text('username', Input::old('username') ? Input::old(): $user->username, array('class' => 'form-control', 'placeholder'=> 'Usuario')) }}	
									    </div>
									</div>	
									<div class="form-group">
									    <div class="col-sm-6">
									      {{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}	
									    </div>
									</div>	
									<div class="form-group">
									    <div class="col-sm-6">
									      {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'Confirmar Contraseña')) }}	
									    </div>
									</div>	
								</div>
								<div class="form-group">								
									{{ Form::submit('Actualizar' , array('class'=> 'btn btn-primary regis')) }}				
								</div>
							{{ Form::close() }}	
						</div>
					</div>
					{{-- datos personales --}}
					<div class="tab-pane" id="datospersonales">
						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
					
						<h3 class="titulother">
							<img src="{{ asset('img/datospersonales.png') }}" alt="" class="computer">
							Datos Personales
						</h3>
						<div class="formu">
							{{ Form::open(array('url' => 'perfil/update/datospersonales/' .  $user->id, 'class' => 'form-horizontal')) }}
								<div class="campo col-sm-offset-1">
									<div class="form-group">						
									    <div class="col-sm-5">
									      {{ Form::text('nombres', Input::old('nombres') ? Input::old(): $user->usuariodato->nombres, array('class' => 'form-control', 'placeholder'=> '*Nombres')) }}	
									    </div>										
									    <div class="col-sm-5">
									      {{ Form::text('apellidos', Input::old('apellidos') ? Input::old(): $user->usuariodato->apellidos, array('class' => 'form-control', 'placeholder'=> '*Apellidos')) }}	
									    </div>
									</div>
									<h3 class="subtitul">Fecha de nacimiento</h3>
									<div class="form-group">						
									    <div class="col-sm-6 col-sm-offset-2">
									      {{ Form::input('date', 'fecha_nacimiento', Input::old('fecha_nacimiento') ? Input::old(): $user->usuariodato->fecha_nacimiento, array('class' => 'form-control')) }}	
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-10">
									      {{ Form::textarea( 'direccion', Input::old('direccion') ? Input::old(): $user->usuariodato->direccion, array('class' => 'form-control','placeholder'=> '*Direccion', 'id' => 'textareainput')) }}	
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-5">
									      {{ Form::email( 'email', Input::old('email') ? Input::old(): $user->usuariodato->email, array('class' => 'form-control','placeholder'=> '*Correo Electronico')) }}	
									    </div>										
									    <div class="col-sm-5">
									      {{ Form::email( 'email_confirmation', Input::old('email_confirmation'), array('class' => 'form-control','placeholder'=> '*Comprovar Correo electronico')) }}	
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-5">
									    	<select class="form-control" name="estado_civil" data-select='{{$user->usuariodato->estado_civil}}' id="estadocivil">									    		
												<option value="Soltero">Soltero</option>				
												<option value="Casado">Casado</option>				
												<option value="Union libre">Union libre</option>				
											</select> 
									    </div>											
									    <div class="col-sm-5">
									    	{{ Form::text('nacionalidad', Input::old('nacionalidad') ? Input::old(): $user->usuariodato->nacionalidad, array('class' => 'form-control', 'placeholder'=> '*Nacionalidad')) }}	
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-5">
									    	<select class="form-control" name="genero" data-select='{{$user->usuariodato->genero}}' id="genero">												 
												 <option value="Femenino">Femenino</option>				
												 <option value="Masculino">Masculino</option>				
											</select> 
									    </div>									
									    <div class="col-sm-5">
									    	<select class="form-control" name="departamento" data-select='{{$user->usuariodato->departamento}}' id="departamento">												
												 <option value="Managua">Managua</option>				
												 <option value="Granada">Granada</option>				
											</select> 
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-5">
									    	<select class="form-control" name="tipo_identificacion" data-select='{{$user->usuariodato->tipo_identificacion}}' id="tipo_identificacion">
												 <option value="Cedula">Cedula</option>				
												 <option value="Pasaporte">Pasaporte</option>				
												 <option value="Cedula de Residencia">Cedula de Residencia</option>				
											</select> 
									    </div>											
									    <div class="col-sm-5">
									    	{{ Form::text('no_identificacion', Input::old('no_identificacion') ? Input::old(): $user->usuariodato->no_identificacion, array('class' => 'form-control cedula', 'placeholder'=> '*No. Identificacion')) }}	
									    </div>
									</div>
									<div class="form-group">						
									    <div class="col-sm-5">
									    	{{ Form::text('convencional', Input::old('convencional') ? Input::old(): $user->usuariodato->convencional, array('class' => 'form-control convencional', 'placeholder'=> '*Telefono de Casa')) }}	
									    </div>											
									    <div class="col-sm-5">
									    	{{ Form::text('celular', Input::old('celular') ? Input::old(): $user->usuariodato->celular, array('class' => 'form-control celular', 'placeholder'=> '*Telefono Celular')) }}	
									    </div>
									</div>
									<div class="form-group">	
									    <div class="col-sm-5">
									    	<select class="form-control" name="vehiculo" data-select='{{$user->usuariodato->vehiculo}}' id="vehiculo">
												 <option value="0">Si</option>				
												 <option value="1">No</option>	
											</select> 
									    </div>
									    <div class="col-sm-5">
									    	<select class="form-control" name="disponible_viajar" data-select='{{$user->usuariodato->disponible_viajar}}' id="disponible_viajar">
												 <option selected="selected" class="s">Disponibilidad de Viajar </option>
												 <option value="0">Si</option>				
												 <option value="1">No</option>	
											</select> 
									    </div>					    
									</div>
									<h3 class="subtitul">Categoria de Licencia</h3>
									<div class="form-group" id='licencia'>	
									    <div class="col-sm-4 col-xs-4">
									    	<input type="checkbox" name="categoria_licencia[]" value="Motocicleta">Motocicleta<br>
									    	<input type="checkbox" name="categoria_licencia[]" value="Profecional">Profecional<br>
									    </div>	
									     <div class="col-sm-4 col-xs-4">
									    	<input type="checkbox" name="categoria_licencia[]" value="Vehiculo liviano">Vehiculo liviano<br>
									    	<input type="checkbox" name="categoria_licencia[]" value="Vehiculo pesado">Vehiculo pesado<br>
									    </div>	
									     <div class="col-sm-4 col-xs-4">
									    	<input type="checkbox" name="categoria_licencia[]" value="Sin licencia">Sin licencia<br>
									    </div>	
									</div>
									<h3 class="subtitul">Objetivos/Principales logros/Competencias</h3>
									<div class="form-group">						
									    <div class="col-sm-10">
									    	{{ Form::textarea('objetivo', Input::old('objetivo') ? Input::old(): $user->usuariodato->objetivo, array('class' => 'form-control', 'placeholder'=> '*Escribe aqui tus objetivos')) }}	
									    </div>
									</div>
									<div class="form-group">								
										{{ Form::submit('Actualizar' , array('class'=> 'btn btn-primary regis')) }}				
									</div>
								{{ Form::close() }}	
							</div>	
						</div>
					</div>
					{{-- Expectativa --}}
					<div class="tab-pane" id="expectativa">
						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
					
						<h3 class="titulother">
							<img src="{{ asset('img/expectativa.png') }}" alt="" class="computer">
							Expectativa Laboral
						</h3>
						<div class="formu">
							{{ Form::open(array('url' => 'perfil/update/expectativa/' .  $user->id, 'class' => 'form-horizontal')) }}
								<div class="campo col-sm-offset-1">
									<div class="form-group">	
									    <div class="col-sm-5 ">
									    	<select class="form-control" name="interes_laboral" data-select='{{$user->usuarioexpectativa()->first()->interes_laboral}}' id="interes_laboral">
												 <option value="Permanente">Permanente</option>				
												 <option value="Temporal">Temporal</option>	
												 <option value="Busqueda Activa">Busqueda Activa</option>	
												 <option value="Disponibilidad Inmediata">Disponibilidad Inmediata</option>	
												 <option value="Pasantia">Pasantia</option>	
												 <option value="Por proyecto">Por proyecto</option>	
											</select> 
									    </div>
									    <div class="col-sm-5">
									    	<select class="form-control" name="expectativa_salarial" data-select='{{$user->usuarioexpectativa()->first()->expectativa_salarial}}' id="expectativa_salarial">
												<option value="menos de 200">menos de 200</option>				
												<option value="0-200">0-200</option>	
												<option value="201-300 "> 201-300</option>	
												<option value="301-600 ">301-600 </option>	
												<option value="601-900">601-900</option>	
												<option value="901-1200">901-1200</option>	
												<option value="1201-1500">1201-1500</option>	
												<option value="1501-1800">1501-1800</option>	
												<option value="1801-2100">1801-2100</option>	
												<option value="2101-2400">2101-2400</option>	
												<option value="2401-2700">2401-2700</option>	
												<option value="2701-3000">2701-3000</option>	
												<option value="3001-3300">3001-3300</option>	
												<option value="3301-3600">3301-3600</option>	
												<option value="3601-3900">3601-3900</option>	
												<option value="3901-4200">3901-4200</option>	
												<option value="4201-4500">4201-4500</option>	
												<option value="4501-4800">4501-4800</option>	
												<option value="4801-5100">4801-5100</option>
												<option value="5101-5400">5101-5400</option>	
												<option value="5401-5700">5401-5700</option>	
												<option value="5701-6000">5701-6000</option>	
												<option value="mas de 6000">mas de 6000</option>
											</select> 
									    </div>					    
									</div>	
									<div class="form-group">	
									    <div class="col-sm-5">
									    	<select class="form-control" name="ubicacion_laboral" data-select='{{$user->usuarioexpectativa()->first()->ubicacion_laboral}}' id="ubicacion_laboral">
												 <option selected="selected" class="s">Ubicacion de interes laboral</option>
												 <option value="Atlantico Norte (RAAN)">Atlantico Norte (RAAN)</option>				
												 <option value="Atlantico Sur (RAAS)">Atlantico Sur (RAAS)</option>	
												 <option value="Boaco">Boaco</option>	
												 <option value="Carazo">Carazo</option>	
												 <option value="Chinandega">Chinandega</option>	
												 <option value="Chontales">Chontales</option>	
											</select> 
									    </div>	
									    <div class="col-sm-5">
									    	<select class="form-control" name="areas_interes" data-select='{{$user->usuarioexpectativa()->first()->areas_interes}}' id="areas_interes">
												 <option selected="selected" class="s">Areas de Interes </option>
												 <option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>				
												 <option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>	
												 <option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>	
												 <option value="Puestos Profesionales">Puestos Profesionales</option>	
												 <option value="Administracion">Administracion</option>	
												 <option value="Informatica|Internet">Informatica|Internet</option>	
											</select> 
									    </div>					    
									</div>
									<div class="form-group">	
									    <div class="col-sm-5">
									    	<select class="form-control" name="puesto_interes" data-select='{{$user->usuarioexpectativa()->first()->puesto_interes}}' id="puesto_interes">
												 <option selected="selected" class="s">Puestos de Interes </option>
												 <option value="Ejecutivos de Ventas">Ejecutivos de Ventas</option>				
												 <option value="Vendedor|Rutero">Vendedor|Rutero</option>	
												 <option value="Jefe de Ventas|Supervisor">Jefe de Ventas|Supervisor</option>	
												 <option value="Promotor de Ventas|Impulsador|Display">Promotor de Ventas|Impulsador|Display</option>	
												 <option value="Jefe de Mercadeo">Jefe de Mercadeo</option>	
												 <option value="Analista de Mercadeo|Investigacion de Mercado">Analista de Mercadeo|Investigacion de Mercado</option>	
											</select> 
									    </div>	
									    <div class="col-sm-5">
									    	<select class="form-control" name="horario" data-select='{{$user->usuarioexpectativa()->first()->horario}}' id="horario">
												 <option selected="selected" class="s">Horario </option>
												 <option value="Diurno">Diurno</option>				
												 <option value="Nocturno">Nocturno</option>	
												 <option value="Horario Alternos">Horario Alternos</option>	
												 <option value="Por Temporada">Por Temporada</option>	
												 <option value="Medio Tiempo">Medio Tiempo</option>									 
											</select> 
									    </div>					    
									</div>
								</div>
								<div class="form-group">
									{{-- <a href="" id="addexpectativa" class="btn btn-primary">Agregar Area De Interes</a> --}}								
									{{ Form::submit('Actualizar' , array('class'=> 'btn btn-primary regis')) }}				
								</div>
							{{ Form::close() }}
						</div>
					</div>
					{{-- Experiencia Profecional --}}
					<div class="tab-pane" id="experiencia">
						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
					
						<h3 class="titulother">
							<img src="{{ asset('img/experiencia.png') }}" alt="" class="computer">
							Experiencia Profecional
						</h3>
						@foreach($user->usuarioexperiencia()->get() as $value)	
							<div class="formu">
								{{ Form::open(array('url' => 'perfil/update/experiencia/' .  $user->id .'/' .$value->id, 'class' => 'form-horizontal')) }}
									<div class="campo col-sm-offset-1">
										<div class="form-group">						
										    <div class="col-sm-5">
										    	{{ Form::text('nombre_empresa', Input::old('nombre_empresa') ? Input::old(): $value->nombre_empresa, array('class' => 'form-control', 'placeholder'=> '*Nombre de la Empresa')) }}	
										    </div>
										    <div class="col-sm-5">
										    	<select class="form-control actividad_empresa" name="actividad_empresa" data-select='{{ $value->actividad_empresa}}'>
													 <option selected="selected" class="s">*Actividad de la Empresa</option>
													 <option value="Aduana|Agencia Aduaneras">Aduana|Agencia Aduaneras</option>				
													 <option value="Agencia de Empleo|Reclutamiento">Agencia de Empleo|Reclutamiento</option>	
													 <option value="Agricola|Ganadera">Agricola|Ganadera</option>	
													 <option value="Agroindustrial">Agroindustrial</option>	
													 <option value="Arquitectura|Diseño|Decoracion">Arquitectura|Diseño|Decoracion</option>									 
												</select> 
										    </div>					    
										</div>
										<div class="form-group">						
										    <div class="col-sm-5">
										    	{{ Form::text('telefono_empresa', Input::old('telefono_empresa') ? Input::old(): $value->telefono_empresa, array('class' => 'form-control celular', 'placeholder'=> '*Tefono de Empresa')) }}	
										    </div>
										    <div class="col-sm-5">
										    	<select class="form-control area" name="area" data-select='{{ $value->area}}'>
													 <option selected="selected" class="s">*Area Funcional</option>
													 <option value="Mercadeo|Ventas">Mercadeo|Ventas</option>				
													 <option value="Banca|Servicios Financieros">Banca|Servicios Financieros</option>	
													 <option value="Finanza|Contabilidad|Auditoria">Finanza|Contabilidad|Auditoria</option>	
													 <option value="Produccion|Ingenieria|Calidad">Produccion|Ingenieria|Calidad</option>	
													 <option value="Puestos Profesionales">Puestos Profesionales</option>									 
												</select> 
										    </div>					    
										</div>					
										<div class="form-group">						
										    <div class="col-sm-6 col-sm-offset-2">
										    	{{ Form::text('puesto', Input::old('puesto') ? Input::old(): $value->puesto, array('class' => 'form-control', 'placeholder'=> '*Puesto o Cargo Desempeñado')) }}	
										    </div>
										</div>
										
										<div class="form-group">
											<div class="col-sm-5 ">
												<h3 class="subtitul" style="width: 100%">Fecha Inicio</h3>				
										    	{{ Form::input('date','fecha_inicio', Input::old('fecha_inicio') ? Input::old(): $value->fecha_inicio, array('class' => 'form-control')) }}	
										    </div>
											<div class="col-sm-5 ">
												<h3 class="subtitul" style="width: 100%">Fecha Fin</h3>				
										    	{{ Form::input('date','fecha_fin', Input::old('fecha_fin') ? Input::old(): $value->fecha_fin, array('class' => 'form-control')) }}	
										    </div>
										</div>
										<div class="form-group">						
										    <div class="col-sm-10">
										    	{{ Form::textarea('logros', Input::old('logros') ? Input::old(): $value->logros, array('class' => 'form-control', 'placeholder'=> 'Logros')) }}	
										    </div>
										</div>
										<div class="form-group">						
										    <div class="col-sm-10">
										    	{{ Form::textarea('funciones', Input::old('funciones') ? Input::old(): $value->funciones, array('class' => 'form-control', 'placeholder'=> '*Descripcion breve de principales funciones en el puesto')) }}	
										    </div>
										</div>
										<div class="form-group">	
										    <div class="col-sm-5">
										    	<select class="form-control" name="superior" >
													 <option selected="selected" class="s">Contactar Superior </option>
													 <option value="0">Si</option>				
													 <option value="1">No</option>	
												</select> 
										    </div>			
										    <div class="col-sm-5">
										    	{{ Form::text('nombre_contacto', Input::old('nombre_contacto'), array('class' => 'form-control', 'placeholder'=> '*Nombre de Contacto')) }}	
										    </div>
										</div>
										<div class="form-group">						
										    <div class="col-sm-5">
										    	{{ Form::text('telefono_contacto', Input::old('telefono_contacto'), array('class' => 'form-control', 'placeholder'=> '*Telefono de Contacto')) }}	
										    </div>			
										    <div class="col-sm-5">
										    	{{ Form::text('email_contacto', Input::old('email_contacto'), array('class' => 'form-control', 'placeholder'=> 'E-mail de Contacto')) }}	
										    </div>
										</div>
									</div>
								{{ Form::close() }}	
							</div>
						@endforeach()
					</div>
					{{-- Fromacion Academica --}}
					<div class="tab-pane" id="formacion">
						{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
					
						<h3 class="titulother">
							<img src="{{ asset('img/educacion.png') }}" alt="" class="computer">
							Expectativa Laboral
						</h3>
						@foreach($user->usuarioeducacion()->get() as $value)
							<div class="formu">
								{{ Form::open(array('url' => 'perfil/update/experiencia/' .  $user->id .'/' .$value->id, 'class' => 'form-horizontal')) }}
									<div class="campo col-sm-offset-2">								
										<div class="form-group">	
										    <div class="col-sm-5">
										    	<select class="form-control nivel_academico" name="nivel_academico" data-select='{{ $value->nivel_academico}}'>
													 <option selected="selected" class="s">*Nivel Academico </option>
													 <option value="Primaria">Primaria</option>				
													 <option value="Bachillerato Secundaria">Bachillerato Secundaria</option>	
													 <option value="Estudiante Universitario">Estudiante Universitario</option>				
													 <option value="Tecnico Medio">Tecnico Medio</option>				
													 <option value="Tecnico Superior">Tecnico Superior</option>				
													 <option value="Egresado|Pensum Cerrado">Egresado|Pensum Cerrado</option>				
													 <option value="Licenciatura">Licenciatura</option>				
													 <option value="Ingenieria">Ingenieria</option>				
													 <option value="Postgrado">Postgrado</option>				
													 <option value="Maestria">Maestria</option>				
													 <option value="Doctorado">Doctorado</option>				
													 <option value="Sin Estudios Formales">Sin Estudios Formales</option>				
												</select> 
										    </div>	
										    <div class="col-sm-5">
										    	<select class="form-control instituto" name="instituto" data-select='{{ $value->instituto}}'>
													 <option selected="selected" class="s">*Institucion </option>
													 <option value="Ave Maria University">Ave Maria University</option>				
													 <option value="Universidad Americana">Universidad Americana</option>	
													 <option value="Universidad Catolica">Universidad Catolica</option>				
													 <option value="Universidad Centroamericana">Universidad Centroamericana</option>				
													 <option value="Universidad de Centroamericana de Ciencias Empresariales ">Universidad de Centroamericana de Ciencias Empresariales </option>				
													 <option value="Universidad de Ciencias Comerciales">Universidad de Ciencias Comerciales</option>				
													 <option value="Universidad Iberoamericana de Ciencia y Tecnologia">Universidad Iberoamericana de Ciencia y Tecnologia</option>				
													 <option value="Universidad Nacional Agraria">Universidad Nacional Agraria</option>				
													 <option value="Universidad Nacional Autonoma de Nicaragua">Universidad Nacional Autonoma de Nicaragua</option>				
													 <option value="Universidad Nacional de Ingenieria">Universidad Nacional de Ingenieria</option>				
													 <option value="Universidad Politecnica de Nicaragua">Universidad Politecnica de Nicaragua</option>				
													 <option value="U. de las Regiones Autonomas de la Costa Caribe Nicaraguense">U. de las Regiones Autonomas de la Costa Caribe Nicaraguense</option>				
													 <option value="Instituto Centroamericano de Administracion de Empresas">SInstituto Centroamericano de Administracion de Empresas</option>				
													 <option value="Otras Instituciones">Otras Instituciones</option>	
												</select> 
										    </div>		
										</div>
										<div class="form-group">
											<div class="col-sm-6 col-sm-offset-2">
										    	{{ Form::text('titulo', Input::old('titulo') ? Input::old(): $value->titulo, array('class' => 'form-control', 'placeholder'=> '*Titulo')) }}	
										    </div>    
										</div>
										<h3 class="subtitul">Año de Finalizacion</h3>
										<div class="form-group">						
										    <div class="col-sm-6 col-sm-offset-2">
										    	{{ Form::input('date','fecha_finalizacion', Input::old('fecha_finalizacion') ? Input::old(): $value->fecha_finalizacion, array('class' => 'form-control')) }}	
										    </div>
										</div>
									</div>
								{{ Form::close() }}	
							</div>
						@endforeach	
					</div>
					<div class="tab-pane" id="otros">Settings Tab.</div>
			    </div>
			</div> 		
	@else
		esto sale si no estas log ni sos el user
	@endif		

</div>
@stop