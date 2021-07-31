@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Tus Tareas') }}</div>
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class=>
                                @foreach ($self_tasks as $task)
                                    <tr>
                                        <td> {{$task->description}}</td>
                                        @if ($task->expiration < now())    
                                            <td class='text-danger'> {{$task->expiration}}</td>
                                        @else
                                            <td> {{$task->expiration}}</td>
                                        @endif
                                        <td>
                                            <a href='{{ route('log.index', ['task_id'=>$task->id]) }}' class='btn btn-secondary'>Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href='{{ route('task.create') }}' class='btn btn-primary'>Agregar Tarea</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Tareas de otros') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class='table table-striped'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody class=>
                                @foreach ($others_tasks as $task)
                                    <tr>
                                        <td> {{$task->name}}</td>
                                        <td> {{$task->description}}</td>
                                        @if ($task->expiration < now())    
                                            <td class='text-danger'> {{$task->expiration}}</td>
                                        @else
                                            <td> {{$task->expiration}}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
