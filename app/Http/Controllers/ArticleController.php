<?php

namespace App\Http\Controllers;

use App\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


/**
 * @group Author management
 *
 * APIs for managing authors
 */
class ArticleController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var ArticleTransformer
     */
    private $articleTransformer;

    function __construct(Manager $fractal, ArticleTransformer $articleTransformer)
    {
        $this->fractal = $fractal;
        $this->articleTransformer = $articleTransformer;
    }
    /**
     * List All Articles
     *
     * @queryParam id required The id of the author.
     *
     * @transformercollection \App\Transformers\ArticleTransformer
     * @transformerModel \App\Article
     *
     * @return array
     */
    public function index()
    {
        $articles = Article::all();

        $articles = new Collection($articles, $this->articleTransformer);
        $articles = $this->fractal->createData($articles);

        return $articles->toArray();
    }

    /**
     * Show an article
     *
     * @queryParam id required The id of the article.
     *
     * @transformercollection \App\Transformers\ArticleTransformer
     * @transformerModel \App\Article
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();
    }
    /**
     * Create a article
     *
     * @bodyParam main_title string required The title of the post.
     * @bodyParam secondary_title string Not required The title of the post.
     * @bodyParam content string The content of post to create.
     * @bodyParam author_id int the ID of the author
     * @bodyParam img image This is required.
     *
     * @queryParam  \Illuminate\Http\Request  $request
     *
     * @transformercollection \App\Transformers\ArticleTransformer
     * @transformerModel \App\Article
     * @param Request $request
     * @return array
     * @throws ValidationException
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'main_title' => 'required|max:255',
            'content' => 'required',
            'img' => 'required||image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().'_'.$request['img']->getClientOriginalName();
        $request['img']->move(('images'), $imageName);

        $article = Article::create($request->except('img') + ['img' => $imageName]);
        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();

    }

    /**
     * Update a article
     *
     * @bodyParam main_title string required The title of the post.
     * @bodyParam secondary_title string Not required The title of the post.
     * @bodyParam content string The content of post to create.
     * @bodyParam author_id int the ID of the author
     * @bodyParam img image This is required.
     *
     * @queryParam  \Illuminate\Http\Request  $request
     * @queryParam id int
     *
     * @transformercollection \App\Transformers\ArticleTransformer
     * @transformerModel \App\Article
     * @param Request $request
     * @param $id
     * @return array
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'main_title' => 'required|max:255',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $article = Article::findOrFail($id);

        $imageName = time().'_'.$request['img']->getClientOriginalName();
        $request['img']->move(('images'), $imageName);

        $article->update($request->except('img') + ['img' => $imageName]);
        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();
    }
    /**
     * @response {
     *  "status": 200,
     * }
     */
    public function softDelete($id)
    {
        Article::findOrFail($id)->delete();
        return response([
            'status'=>200
        ], 200);
    }
}
