<!-- Section -->
<section>
    <header class="major">
        <h2>Articles</h2>
    </header>
    <div class="posts">
        @foreach ($articles as $article)
        <article>
            <a href="{{ $article->link }}" class="image"><img src="/images/pic01.jpg" alt="" /></a>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->description }}</p>
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