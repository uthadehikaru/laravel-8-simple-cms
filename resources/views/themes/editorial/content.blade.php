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

    @if($object->thumbnail)
    <span class="image main"><img src="{{ $object->imageUrl('thumbnail') }}" alt="" /></span>
    @endif

    {!! $object->content !!}

    <p class="mt-2 font-italic">
        @if($object->category)
        <a href="{{ $object->category->link }}">{{ $object->category->title }}</a> | {{ $object->localized_published_at }}</p>
        @endif
</section>
@endsection
