@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Nueva Tarea') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
			@if (session('alert'))
				<div class="alert alert-danger">
				    {{ session('alert') }}
				</div>
			@elseif(session('success'))
				<div class='alert alert-success'>
					{{session('success')}}
				</div>
		  	@endif
			<form  action={{ route('task.store') }} method="POST">
				@csrf
				<div class="form-group">
					<label for="users">Usuario</label>
					<select class="form-control" id='users' name='user'>
						<option>Seleccione un Usuario</option>
						@foreach ($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option> 
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="description">Descripción</label>
					<input type="text" class="form-control" id="description" name='description' required >
				</div>
				<div class="form-group">
					<label for="expiration">Fecha de Expiración</label>
					<input type="date" class="form-control" id="expiration" name='expiration' required >
				</div>
				<button type="submit" class='btn btn-secondary'>Guardar</button>
			</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection