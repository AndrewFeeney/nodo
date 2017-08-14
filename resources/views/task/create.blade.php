@extends('layouts.app')

@section('title')
    Create Task
@endsection

@section('breadcrumbs')
    <ul>
        <li><a href="#">Bulma</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="#">Components</a></li>
        <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
    </ul>
@endsection

@section('content')

    <form method="post">
        {!! csrf_field() !!}
        <div class="field">
            <label class="label" for="name"> Task Name </label>
            <input class="input" type="text" name="name"/>
        </div>
        <div class="field">
            <label class="label" for="description"> Task Description </label>
            <textarea name="description" class="textarea"></textarea>
        </div>
        <div class="field">
            <label class="label" for="due_date"> Due Date </label>
            <input class="input" type="date" name="due_date"/>
        </div>
        <div class="field">
            <button class="button is-primary"> Submit </button>
    </form>

@endsection
