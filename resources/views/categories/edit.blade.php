@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.update', $category) }}" method="post" class="form-horizonal">
        @csrf
        @method('put')
        @include('categories.form.form')
    </form>
@endsection
