<?php

class AuthorTest extends TestCase
{
    /**
     * /authors [GET]
     */
    public function testShouldReturnAllAuthors(){
        $this->get("authors", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => [ '*' => [
                    'id',
                    'name',
                    'email',
                    'github',
                    'twitter',
                    'location',
                    'articles'
                ]
             ]
        ]);
    }
    /**
     * /authors/id [GET]
     */
    public function testShouldReturnAuthor(){
        $this->get("authors/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
                [
                    'id',
                    'name',
                    'email',
                    'github',
                    'twitter',
                    'location',
                    'articles'
                ]
        ]);
    }
    /**
     * /authors [POST]
     */
    public function testShouldCreateAuthor(){
        $parameters = [
            'name' => 'Infinix',
            'email' => 'user@email.com',
            'github' => 'contentcontentcontent',
            'twitter' => 'image',
            'location' => 'location'
        ];

        $this->post("authors", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'name',
                'email',
                'github',
                'twitter',
                'location',
                'created_at',
                'updated_at',
            ]
        );
    }
    /**
     * /authors/id [PUT]
     */
    public function testShouldUpdateAuthor(){
        $parameters = [
            'name' => 'Infinix',
            'email' => 'asd@ads.com',
            'github' => 'contentcontentcontentcontent',
            'twitter' => 'image',
            'location' => 'location'
        ];

        $this->put("authors/6", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'name',
                'email',
                'github',
                'twitter',
                'location',
                'latest_article_published',
                'created_at',
                'updated_at',
            ]
        );
    }
    /**
     * /authors/id [DELETE]
     */
    public function testShouldDeleteAuthor(){
        $this->delete("authors/5", [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message'
        ]);
    }
}
