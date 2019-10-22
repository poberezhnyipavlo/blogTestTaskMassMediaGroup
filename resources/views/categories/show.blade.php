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
                    <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-primary">Новий
                        коментар
                    </button>
                    <h5 class="card-title">Список коментарів</h5>
                    <ul id="comments">
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Введіть коментар</h4>
                </div>
                <div class="modal-body">
                    <form id="comment">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category->id ?? '' }}">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Автор:</label>
                            <input type="text" class="form-control" id="author" name="author">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Коментар:</label>
                            <input type="text" class="form-control" id="content" name="content">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Відміна
                            </button>
                            <button type="submit" class="btn btn-primary" id="model-save">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript">
        $('#comment').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '/comment',
                data: $(this).serialize(),
                success(response) {
                    console.log(response);
                    $('#modal-default').modal('hide');
                    $('#comments').append(`
                            <li>
                                <h5>${response.author}</h5>
                                <h6>${response.content}</h6>
                            </li>
                        `);
                    $("form#comment input[name=author]").val('');
                    $("form#comment input[name=content]").val('')
                },
                error(error) {
                    console.log(error)
                }
            })
        });
    </script>
@endsection
