@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', $post) }}" method="post" class="form-horizonal" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('posts.form.form')
    </form>
@endsection
