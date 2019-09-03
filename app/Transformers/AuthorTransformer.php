<?php

namespace App\Transformers;

use App\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract {
    public function transform(Author $author){
        return [
            'id' => (int) $author->id,
            'name' => $author->name,
            'email'   =>  $author->email,
            'github' => $author->github,
            'twitter'   =>  $author->twitter,
            'location'   =>  $author->location,
            'articles' => $author->articles
        ];
    }
}
