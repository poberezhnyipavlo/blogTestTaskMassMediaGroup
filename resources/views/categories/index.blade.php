@extends('layouts.app')

@section('title', 'Категорії')

@section('content')
    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {!! session()->get('success') !!}
                </div>
            </div>
        </div>
    @endif
    <a href="{{ route('categories.create') }}" class="btn btn-success">Нова</a>
<table class="table">
    <thead>
        <tr>
            <td>Назва</td>
            <td>Дії</td>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <?php /** @var \App\Category $category */ ?>
        <tr>
            <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
            <td class="align-right">
                <form onsubmit="if(confirm('Видалити?')){ return true }else{ return false }" action="{{route('categories.destroy', $category)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('categories.edit', $category)}}">Редагувати</a>
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
