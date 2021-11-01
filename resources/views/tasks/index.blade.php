@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!-- Имя задачи -->
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Задача</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task" class="form-control">
                            </div>
                        </div>

                        <!-- Кнопка добавления задачи -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Добавить задачу
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (count($tasks) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Заголовок таблицы -->
                                <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>

                                <!-- Тело таблицы -->
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <!-- Имя задачи -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            <form method="post" action="{{route('tasks.destroy',$task->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn-danger"> <i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('tasks.edit', $task->id)}}">
                                                {{ csrf_field() }}
                                                {{ method_field('GET') }}
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
