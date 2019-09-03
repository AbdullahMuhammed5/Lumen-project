<?php

namespace App\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract {
    public function transform(Article $article){
        return [
            'id' => (int) $article->id,
            'main_title' => $article->main_title,
            'secondary_title'   =>  $article->secondary_title,
            'content' => $article->content,
            'image'   =>  $article->img,
            'author'   =>  $article->author->name,
        ];
    }
}
