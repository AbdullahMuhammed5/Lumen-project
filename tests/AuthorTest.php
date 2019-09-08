<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class AuthorTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * /authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        factory('App\Author', 5)->create();
        $this->get("authors", []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $author = factory('App\Author')->create();
        $this->get("authors/{$author->id}", []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors [POST]
     */
    public function testShouldCreateAuthor(){
        $author = factory('App\Author')->make()->toArray();
        $author['password'] = app('hash')->make('secret');
        $this->post("authors", $author);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $author = factory('App\Author')->create();
        $this->put("authors/{$author->id}", $author->toArray(), []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        $author = factory('App\Author')->create();
        $this->delete("authors/{$author->id}", [], []);
        $this->seeStatusCode(200);
    }
}
