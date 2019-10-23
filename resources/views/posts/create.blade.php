@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {!! $errors->first() !!}
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post" class="form-horizonal" enctype="multipart/form-data">
        @csrf
        @include('posts.form.form')
    </form>
@endsection
