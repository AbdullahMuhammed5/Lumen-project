<?php

use App\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Lumen\Testing\DatabaseMigrations;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * /articles [GET]
     */
    public function testShouldReturnAllArticles(){
        factory('App\Author', 5)->create();
        factory('App\Article', 10)->create();
        $this->get("articles", []);
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [GET]
     */
    public function testShouldReturnArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->make();
        $this->get("articles/{$article->id}", []);
        $this->seeStatusCode(200);
    }
    /**
     * /articles [POST]
     */
    public function testShouldCreateArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->make()->toArray();
        $article['img'] = UploadedFile::fake()->image('avatar.jpg');
        $this->post("articles", $article);
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [PUT]
     */
    public function testShouldUpdateArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->create()->toArray();
        $article['img'] = UploadedFile::fake()->image('avatar.jpg');
        $this->put("articles/{$article['id']}", $article);
        $this->seeStatusCode(200);
    }
    /**
     * /articles/id [DELETE]
     */
    public function testShouldDeleteArticle(){
        factory('App\Author')->create();
        $article = factory('App\Article')->create();
        $this->delete("articles/{$article->id}", [], []);
        $this->seeStatusCode(200);
    }
}
