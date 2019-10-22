@extends('layouts.app')

@section('content')
    <?php /** @var \App\Post $post */ ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->name ?? '' }}</h5>
            <p class="card-text">{!! $post->content ?? '' !!}</p>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Редагувати</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Список коментарів</h5>
            <ul>
                @foreach($post->comments as $comment)
                    <?php /** @var \App\Comment $comment */ ?>
                    <li>
                        <h7>{{ $comment->author ?? ''}}</h7>
                        <br>
                        <h8>{{ $comment->content ?? ''}}</h8>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
