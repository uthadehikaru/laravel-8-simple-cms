@extends('themes.editorial.base')

@include('partials.app.sections', [
'title' => getTitle($title),
'description' => getDescription($description),
'image' => getImage()
])

@section('content')
@include('themes.editorial.partials.articles')
@endsection
