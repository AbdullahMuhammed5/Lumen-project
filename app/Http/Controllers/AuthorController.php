<?php

namespace App\Http\Controllers;

use App\Author;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class AuthorController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var AuthorTransformer
     */
    private $authorTransformer;

    function __construct(Manager $fractal, AuthorTransformer $authorTransformer)
    {
        $this->fractal = $fractal;
        $this->authorTransformer = $authorTransformer;
    }
    public function index()
    {
        $authors = Author::all();

        $authors = new Collection($authors, $this->authorTransformer); // Create a resource collection transformer
        $authors = $this->fractal->createData($authors); // Transform data

        return $authors->toArray();
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);

        $author = new Item($author, $this->authorTransformer);
        $author = $this->fractal->createData($author);

        return $author->toArray();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'location' => 'required',
        ]);
        return Author::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'location' => 'required'
        ]);
        $article = Author::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function destroy($id)
    {

        Author::findOrFail($id)->delete();
        return response([
            'status' => 200,
            'message' => 'Deleted!'
        ], 200
        );
    }
}
