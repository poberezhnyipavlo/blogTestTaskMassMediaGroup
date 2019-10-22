@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.store') }}" method="post" class="form-horizonal">
        @csrf
        @include('categories.form.form')
    </form>
@endsection
