@extends('layouts.app')

@section('content')
    <h2>All News</h2>
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
                <!-- Форма новой задачи -->
        <form action="{{ route('tasks.update', $task->id ) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <!-- Имя задачи -->
            <div class="form-group">
                <label for="new" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" value="{{old('name') ?? $task->name}}" name="name" class="form-control" id="name">
                </div>
            </div>
            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection