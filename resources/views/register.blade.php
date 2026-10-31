@extends('layout.index')
@section('main')
<h1>Страница регистрации</h1>
<form action="{{ route('store.register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Введите ФИО</label><br>
    <input type="text" name="full_name" required><br>

    <label for="">Введите почту</label><br>
    <input type="email" name="email" required><br>

    <label for="">Введите пароль</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Зарегистрироваться"><br>
</form>
@endsection