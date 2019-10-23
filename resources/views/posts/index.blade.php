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
    <a href="{{ route('posts.create') }}" class="btn btn-success">Новий</a>
<table class="table">
    <thead>
        <tr>
            <td>Назва</td>
            <td>Контент</td>
            <td>Дії</td>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <?php /** @var \App\Post $post */ ?>
        <tr>
            <td><a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a></td>
            <td>{{ $post->content ?? '' }}</td>
            <td class="align-right">
                <form onsubmit="if(confirm('Видалити?')){ return true }else{ return false }" action="{{route('posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-warning" href="{{route('posts.edit', $post)}}">Редагувати</a>
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
        <tr>
            <td colspan="2" class="align-right">
                {{ $posts->links() }}
            </td>
        </tr>
    </tfooter>
</table>
@endsection
