<?php

use App\Models\Todo;
?>
@extends('layouts/main')

@section('main_content')
    <h1>Мои Готовые Тудушки</h1>
    @foreach($todos as $el)
        <div class="alert alert-success">
            <h3>{{ $el->title }}</h3>
            <p>{{ $el->message }}</p>
            <a href="/todo/undone/{{ $el->id }}">
            <button type="submit" class="btn btn-success">Не сделано</button>
            </a>
        </div>
    @endforeach
@endsection