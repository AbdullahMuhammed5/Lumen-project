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
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request['img']){
            $imageName = time().'_'.$request['img']->getClientOriginalName();
            $request['img']->move(('images'), $imageName);
            return Article::create($request->except('img') + ['img' => $imageName]);
        } else{
            return Article::create($request->all());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'main_title' => 'required|max:255',
            'content' => 'required',
            'img' => 'required'
        ]);
        $article = Article::findOrFail($id);
        if($request['img']){
            $imageName = time().'.'.$request['img']->getClientOriginalExtension();
            $request['img']->move(('public/images'), $imageName);
        }
        $request->img = $imageName;
        $article->update($request->all());

        return $article;
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $imgPath = pathinfo()/$article['img'];
         if (file_exists($image_path)) {
             File::delete($image_path);
         }
        echo $article->img;
//        $article->delete();
        return response([
                'status' => 200,
                'message' => 'Deleted!'
            ], 200
        );
    }
}
