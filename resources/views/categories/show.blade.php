@extends('layouts.app')

@section('content')
    <?php /** @var \App\Category $category */ ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name ?? '' }}</h5>
            <p class="card-text">{!! $category->description ?? '' !!}</p>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Редагувати</a>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Список постів</h5>
                    <ul>
                        @foreach($category->posts as $post)
                            <?php /** @var \App\Post $post */ ?>
                            <li>{{ $post->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Список коментарів</h5>
                    <ul>
                        @foreach($category->comments as $comment)
                            <?php /** @var \App\Comment $comment */ ?>
                            <li>
                                <h7>{{ $comment->author ?? ''}}</h7><br>
                                <h8>{{ $comment->content ?? ''}}</h8>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
