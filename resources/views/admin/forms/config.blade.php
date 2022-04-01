@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @foreach (['key', 'content'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.submit')
@endsection
