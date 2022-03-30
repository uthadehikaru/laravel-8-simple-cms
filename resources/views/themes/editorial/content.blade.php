@extends('themes.editorial.base')

@include('partials.app.sections', [
'title' => getTitle($title = $object->title),
'description' => getDescription($description = $object->description),
'image' => getImage()
])

@section('content')
<section>
    <header class="main">
        <h1>{{ $object->title }}</h1>
    </header>

    <span class="image main"><img src="/images/pic11.jpg" alt="" /></span>

    {!! $object->content !!}

</section>
@endsection
