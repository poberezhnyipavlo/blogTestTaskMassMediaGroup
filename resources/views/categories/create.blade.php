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
    <h1>Створення категорії</h1>
    <form action="{{ route('categories.store') }}" method="post" class="form-horizonal">
        @csrf
        @include('categories.form.form')
    </form>
@endsection
