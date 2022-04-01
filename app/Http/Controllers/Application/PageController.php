<?php

namespace App\Http\Controllers\Application;

use App\Base\Services\SitemapService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $about = null;
        $about_id = getConfig('hero');
        if($about_id>0)
            $about = Page::find($about_id);
        return view('themes.editorial.home', [
            'hero' => getConfig('hero', true),
            'title' => getTitle(),
            'description' => getDescription(),
            'articles' => Article::published()->paginate(4),
            'about' => $about,
        ]);
    }

    /**
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(Category $category)
    {
        return view('themes.editorial.articles', [
            'title' => $category->title,
            'description' => $category->description,
            'articles' => Article::latest('published_at')->where('category_id', $category->id)->paginate(4)
        ]);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage(Page $page)
    {
        return view('themes.editorial.content', ['object' => $page]);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticle(Article $article)
    {
        return view('themes.editorial.content', ['object' => $article]);
    }
    
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticles(Request $request)
    {
        $title = 'Articles';
        
        $articles = Article::latest('published_at');
        if($request->has('query')){
            $title = "Search Result";
            $articles->orWhere('title','like','%'.$request->get('query').'%');
            $articles->orWhere('description','like','%'.$request->get('query').'%');
            $articles->orWhere('content','like','%'.$request->get('query').'%');
        }
        return view('themes.editorial.articles', [
            'title' => $title,
            'description' => 'List Articles',
            'articles' => $articles->paginate(4)]
        );
    }

    /**
     * @param \App\Base\Services\SitemapService $sitemapService
     *
     * @return mixed
     * @throws \Exception
     */
    public function getSitemap(SitemapService $sitemapService)
    {
        return $sitemapService->render();
    }
}
