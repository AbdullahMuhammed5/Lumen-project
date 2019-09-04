<?php

namespace App\Http\Controllers;

use App\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


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

    /*
     *
     * @return \Illuminate\Http\Response
     * */
    public function index()
    {
        $articles = Article::all();

        $articles = new Collection($articles, $this->articleTransformer);
        $articles = $this->fractal->createData($articles);

        return $articles->toArray();
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'main_title' => 'required|max:255',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().'_'.$request['img']->getClientOriginalName();
        $request['img']->move(('images'), $imageName);

        $article = Article::create($request->except('img') + ['img' => $imageName]);
        $article = new Item($article, $this->articleTransformer);
        $article = $this->fractal->createData($article);

        return $article->toArray();

    }

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

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $imgPath = $article['img'];
         if (file_exists($imgPath)) {
             File::delete('/public/images/'.$imgPath);
         }
        $article->delete();
        return response([
                'status' => 200,
                'message' => 'Deleted!'
            ], 200
        );
    }
}
