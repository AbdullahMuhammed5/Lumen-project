<?php

class ArticleTest extends TestCase
{
    /**
     * /articles [GET]
     */
    public function testShouldReturnAllArticles(){
        $this->get("articles", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
                [ '*' => [
                    'id',
                    'main_title',
                    'secondary_title',
                    'content',
                    'image',
                    'author'
                ]
            ]
       ]);
   }
    /**
     * /articles/id [GET]
     */
    public function testShouldReturnArticle(){
        $this->get("articles/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' =>
             [
                'id',
                'main_title',
                'secondary_title',
                'content',
                'image',
                'author'
             ]
        ]);
    }
    /**
     * /articles [POST]
     */
    public function testShouldCreateArticle(){
        $parameters = [
            'main_title' => 'Infinix',
            'secondary_title' => ' secondraytielesecondraytielesecondraytielesecondraytiele',
            'content' => 'contentcontentcontentcontentcontentcontentcontentcontent',
            'img' => 'image',
            'author_id' => 1
        ];

        $this->post("articles", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
                [
                    'main_title',
                    'secondary_title',
                    'content',
                    'img',
                    'author_id'
                ]
        );
    }
    /**
     * /articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        $parameters = [
            'main_title' => 'Infinix',
            'secondary_title' => 'NOTE 4 5.7-Inch IPS LCD (3GB, 32GB ROM) Android 7.0 ',
            'content' => 'contentcontentcontentcontentcontentcontentcontentcontent',
            'img' => 'image',
            'author_id' => 1
        ];

        $this->put("articles/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
                [
                    'main_title',
                    'secondary_title',
                    'content',
                    'img',
                    'author_id'
                ]
        );
    }
    /**
     * /articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        $this->delete("articles/11", [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message'
        ]);
    }
}
