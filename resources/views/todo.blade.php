<?php

use App\Models\Todo;
?>
@extends('layouts/main')

@section('main_content')
<h1>Добавим что-нибудь новенькое?</h1>
<br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/todo/check">
    @csrf    
    <input type="text" name="title" id="title" placeholder="Заголовок" class="form-control">
    <br>
        <textarea name="message" id="message" placeholder="Ваши мысли" class="form-control"></textarea>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
    <br><br>
    <h1>Мои Тудушки</h1>
    @foreach($todos as $el)
        <div class="alert alert-warning">
            <h3>{{ $el->title }}</h3>
            <p>{{ $el->message }}</p>
            <a href="/todo/done/{{ $el->id }}">
            <button type="submit" class="btn btn-success">Выполнено!</button>
            </a>
        </div>
    @endforeach
@endsection