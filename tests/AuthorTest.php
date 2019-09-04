<?php

class AuthorTest extends TestCase
{
    /**
     * /authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        $this->get("authors", []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $this->get("authors/2", []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors [POST]
     */
    public function testShouldCreateAuthor(){
        $parameters = factory('App\Author')->make()->toArray();

        $this->post("authors", $parameters, []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $parameters = factory('App\Author')->make()->toArray();

        $this->put("authors/1", $parameters, []);
        $this->seeStatusCode(200);
    }
    /**
     * /authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        $this->delete("authors/3", [], []);
        $this->seeStatusCode(200);
    }
}
