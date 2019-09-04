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

        $authors = new Collection($authors, $this->authorTransformer);
        $authors = $this->fractal->createData($authors);

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

        $author = Author::create($request->all());
        $author = new Item($author, $this->authorTransformer);
        $author = $this->fractal->createData($author);

        return $author->toArray();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'location' => 'required'
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());
        $author = new Item($author, $this->authorTransformer);
        $author = $this->fractal->createData($author);

        return $author->toArray();
    }

    public function softDelete($id)
    {
        Author::findOrFail($id)->delete();
        return response([
            'status'=>200
        ], 200);
    }
}
