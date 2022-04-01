<!-- Section -->
<section>
    <header class="major">
        <h2>@lang('app.articles')</h2>
    </header>
    <div class="posts">
        @foreach ($articles as $article)
        <article>
            <a href="{{ $article->link }}" class="image"><img src="{{ $article->imageUrl('thumbnail') }}" alt="" /></a>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->description }}</p>
            <p class="mt-2 font-italic"><a href="{{ $article->category->link }}">{{ $article->category->title }}</a> | {{ $article->localized_published_at }}</p>
            <ul class="actions">
                <li><a href="{{ $article->link }}" class="button">{{ __('app.read_more') }}</a></li>
            </ul>
        </article>
        @endforeach
    </div>
    @if ($articles->total() > $articles->count())
        <div class="d-flex justify-content-center">
            {!! $articles->appends(request()->except('page'))->links() !!}
        </div>
    @endif
</section>