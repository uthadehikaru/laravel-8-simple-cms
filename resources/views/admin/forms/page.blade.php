@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'parent_id', 'null' => true])
    @include('partials.admin.form.text', ['attribute' => 'published_at', 'class' => 'datepicker'])
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.textarea', ['attribute' => 'content'])
    @include('partials.admin.form.file', ['attribute' => 'thumbnail'])
    @include('partials.admin.form.submit')
@endsection
