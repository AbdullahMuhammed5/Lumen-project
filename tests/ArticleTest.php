<?php

use App\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $this->get("articles/4", []);
        $this->seeStatusCode(200);
    }
    /**
     * /articles [POST]
     */
    public function testShouldCreateArticle(){
        $parameters = factory('App\Article')->make()->toArray();
        $parameters['img'] = UploadedFile::fake()->image('avatar.jpg');
        $this->post("articles", $parameters);
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        $parameters = factory('App\Article')->raw();
        $parameters['img'] = UploadedFile::fake()->image('avatar.jpg');
        $this->put("articles/2", $parameters, []);
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        $this->delete("articles/3", [], []);
        $this->seeStatusCode(200);
    }
}
