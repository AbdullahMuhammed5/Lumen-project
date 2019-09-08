<?php

namespace App\Http\Controllers;

use App\Author;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
/**
 * @group Author routes
 *
 * APIs for managing Authors
 */
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
    /**
     * List All Authors
     *
     * @queryParam id required The id of the author.
     *
     * @transformercollection \App\Transformers\AuthorTransformer
     * @transformerModel \App\Author
     *
     * @return array
     */
    public function index()
    {
        $authors = Author::all();

        $authors = new Collection($authors, $this->authorTransformer);
        $authors = $this->fractal->createData($authors);

        return $authors->toArray();
    }
    /**
     * Show an Author
     *
     * @queryParam id required The id of the author.
     *
     * @transformercollection \App\Transformers\AuthorTransformer
     * @transformerModel \App\Author
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        $author = new Item($author, $this->authorTransformer);
        $author = $this->fractal->createData($author);

        return $author->toArray();
    }
    /**
     * Create an Author
     *
     * @bodyParam name string required The name for the author.
     * @bodyParam email string required The email for the author.
     * @bodyParam password string required The password of the author.
     * @bodyParam github string.
     * @bodyParam twitter string.
     * @bodyParam location string This is required.
     * @bodyParam last article published string.
     *
     * @queryParam  \Illuminate\Http\Request  $request
     * @queryParam id int
     *
     * @transformercollection \App\Transformers\AuthorTransformer
     * @transformerModel \App\Author
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'location' => 'required',
        ]);
        $author = Author::create($request->all());
//        $author['password'] = app('hash')->make($request['password']);
        $author['password'] = Hash::make($request['password']);
        $author->save();

        $author = new Item($author, $this->authorTransformer);
        $author = $this->fractal->createData($author);

        return $author->toArray();
    }
    /**
     * Update an Author
     *
     * @bodyParam name string required The name for the author.
     * @bodyParam email string required The email for the author.
     * @bodyParam password string required The password of the author.
     * @bodyParam github string.
     * @bodyParam twitter string.
     * @bodyParam location string This is required.
     * @bodyParam last article published string.
     *
     * @queryParam  \Illuminate\Http\Request  $request
     * @queryParam id int
     *
     * @transformercollection \App\Transformers\AuthorTransformer
     * @transformerModel \App\Author
     * @param Request $request
     * @param $id
     * @return array
     * @throws ValidationException
     */
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
    /**
     * Delete an Author
     *
     * @response {
     *  "status": 200,
     * }
     */
    public function softDelete($id)
    {
        Author::findOrFail($id)->delete();
        return response([
            'status'=>200
        ], 200);
    }
}
