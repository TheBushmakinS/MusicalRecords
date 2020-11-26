@extends('layouts.app')

@section('content')
<div class="row mt-4 mb-4 justify-content-center">
    <h3>Добавление пластинки</h3>
</div>
@if ($errors->any())
    <div class="row mt-1 mb-1 justify-content-center">
        <div class="alert alert-danger col-md-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>  
    </div>
@endif


<div class="row justify-content-center">  
    <form class="col-md-5 mb-5" action="{{route('add.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Год выпуска:</label>
            <input type="text" class="form-control" name="year">
        </div>
        <div class="form-group">
            <label>Автор:</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label>Студия:</label>
            <input type="text" class="form-control" name="studio">
        </div>
        <div class="form-group">
            <label>Оформление пластинки:</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input">
                <label class="custom-file-label">Выберите изображение</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Добавить</button>
    </form>
</div>
@endsection