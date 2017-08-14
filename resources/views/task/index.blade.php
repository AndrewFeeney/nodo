@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('task.index') !!}
@endsection

@section('title')
    Tasks
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-header-title level">
                <a href="{{ route('task.create') }}" class="button level-right">
                    Create Task
                </a>
            </div>
        </div>
        <div class="card-content">


            <table class="table is-fullwidth">
                @if ($tasks->count())
                    <tr>
                        <th> Task Name </th>
                        <th> Due Date </th>
                        <th> Actions </th>
                    </th>
                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                <a href="{{ route('task.show', ['task' => $task]) }}">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td>
                                {{ $task->due_date }}
                            </td>
                            <td>
                                @if($task->isIncomplete())
                                    <a class="button is-success" href="{{ route('task.completion.store', ['task' => $task]) }}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @else
                                    <a class="button" href="{{ route('task.uncompletion.store', ['task' => $task]) }}">
                                        <i class="fa fa-close"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td> You have no tasks yet. </td></tr>
                @endif
            </table>
        </div>
    </div>
</div>

@endsection

