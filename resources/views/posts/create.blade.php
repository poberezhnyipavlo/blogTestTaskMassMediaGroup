@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="post" class="form-horizonal" enctype="multipart/form-data">
        @csrf
        @include('posts.form.form')
    </form>
@endsection
