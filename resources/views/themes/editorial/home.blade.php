@extends('themes.editorial.base')

@include('partials.app.sections', [
'title' => getTitle($title),
'description' => getDescription($description),
'image' => getImage()
])

@section('content')
@if($about)
<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h1>{{ $about->title }}</h1>
        </header>
        <p>{{ $about->description }}</p>
        <ul class="actions">
            <li><a href="{{ $about->link }}" class="button big">Learn More</a></li>
        </ul>
    </div>
    @if($about->thumbnail)
    <span class="image object">
        <img src="{{ $about->imageUrl('thumbnail') }}" alt="{{ $about->title }}" />
    </span>
    @endif
</section>
@endif

@include('themes.editorial.partials.articles')
@endsection
