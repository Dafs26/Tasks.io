@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Tarea') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class='table table-striped'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td> {{$task->description}}</td>
                                        @if ($task->expiration < now())    
                                            <td class='text-danger'> {{$task->expiration}}</td>
                                        @else
                                            <td> {{$task->expiration}}</td>
                                        @endif
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Comentarios') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class='table table-striped'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Comentario</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($logs as $log)
                                    <tr>
                                        <td> {{$log->comment}}</td>
                                        <td> {{$log->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
			<form  action={{ route('log.store', ['task_id' => $task->id]) }} method="POST">
				@csrf
				<div class='form-group'>
					<textarea name='comment' class='form-control' placeholder='Ingrese Comentario' required></textarea>
					<button type="submit" class="btn btn-secondary mt-3">Agregar Comentario</button>
				</div>
			</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection