<?php

use App\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
//use Laravel\Lumen\Testing\DatabaseMigrations;

class ArticleTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * /articles [GET]
     */
    public function testShouldReturnAllArticles(){
        $this->get("articles", []);
        $this->seeStatusCode(200);
   }
    /**
     * /articles/id [GET]
     */
    public function testShouldReturnArticle(){
        $this->get("articles/2", []);
        $this->seeStatusCode(200);
    }
    /**
     * /articles [POST]
     */
    public function testShouldCreateArticle(){
        $parameters = factory('App\Article')->create()->toArray();
//        $parameters['image'] = UploadedFile::fake()->image('avatar.jpg');
//        dd($parameters);
        $this->post("articles", $parameters);
//        $this->assertEquals(200, $this->$response->status());
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        $parameters = [
            'main_title' => 'Infinix',
            'secondary_title' => 'NOTE 4 5.7-Inch I',
            'content' => 'contentcontentcontentcontentcontentcontentcontentcontent',
            'img' => 'image',
            'author_id' => 1
        ];

        $this->put("articles/12", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure( [ 'data' =>
                [
                    'id',
                    'main_title',
                    'secondary_title',
                    'content',
                    'image',
                    'author'
                ]
            ]
        );
    }
    /**
     * /articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        $this->delete("articles/11", [], []);
        $this->seeStatusCode(200);
    }
}
