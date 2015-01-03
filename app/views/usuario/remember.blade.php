@extends('templates.maintemplate')
@section('contenido')
<div class="remember">
	<h3 class="titul">
		<i class="fa fa-unlock-alt computer"></i>Recuperar Contraseña
	</h3>
	<div class="alert alert-danger col-md-8 col-sm-offset-2" role="alert">
  		se enviara un correo electronico con la nueva contraseña de inicio de sesion
	</div>

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}    

	{{ Form::open(array('url' => 'perfil/rememberpass', 'class' => 'form-horizontal col-md-6 col-sm-offset-3')) }}
		<div class="form-group">
			<select class="form-control" name="tipo">
				<option selected="selected" class="s">Recuerar con</option>
				<option value="username">Nombre de usuario</option>				
				<option value="email">Email</option>	
			</select>
		</div> 
		<div class="form-group">
			{{ Form::text('nombre', Input::old('nombre') , array('class' => 'form-control', 'placeholder'=> 'nombre de usuario o email')) }}	
		</div>
		<div class="form-group dow">
			<button class="btn btn-primary btn-lg btn-block">Enviar</button>			
			<span><a href="http://doctorpc.com.ni/" target="new">Registro de usuario</a></span>
		</div>
	{{ Form::close() }}  
</div>
@stop