---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Article routes


APIs for managing Articles
<!-- START_8b794a0f08ddd4d69013d2fd7726b7e2 -->
## List All Articles

> Example request:

```bash
curl -X GET -G "/articles?id=magni" 
```

```javascript
const url = new URL("/articles");

    let params = {
            "id": "magni",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        },
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        }
    ]
}
```

### HTTP Request
`GET /articles`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | The id of the author.

<!-- END_8b794a0f08ddd4d69013d2fd7726b7e2 -->

<!-- START_5ba7e5f6e42a2b98925186bef3726834 -->
## Show an article

> Example request:

```bash
curl -X GET -G "/articles/1?id=consequuntur" 
```

```javascript
const url = new URL("/articles/1");

    let params = {
            "id": "consequuntur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        },
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        }
    ]
}
```

### HTTP Request
`GET /articles/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | The id of the article.

<!-- END_5ba7e5f6e42a2b98925186bef3726834 -->

<!-- START_24a000b518b36afd387d5e167fde2c1a -->
## Create an article

> Example request:

```bash
curl -X POST "/articles?%5CIlluminate%5CHttp%5CRequest=dolore" \
    -H "Content-Type: application/json" \
    -d '{"main_title":"aliquid","secondary_title":"qui","content":"doloribus","author_id":5,"img":"est"}'

```

```javascript
const url = new URL("/articles");

    let params = {
            "\Illuminate\Http\Request": "dolore",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "main_title": "aliquid",
    "secondary_title": "qui",
    "content": "doloribus",
    "author_id": 5,
    "img": "est"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        },
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        }
    ]
}
```

### HTTP Request
`POST /articles`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    main_title | string |  required  | The title of the post.
    secondary_title | string |  optional  | Not required The title of the post.
    content | string |  optional  | The content of post to create.
    author_id | integer |  optional  | the ID of the author
    img | image |  optional  | This is required.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    \Illuminate\Http\Request |  optional  | $request

<!-- END_24a000b518b36afd387d5e167fde2c1a -->

<!-- START_b4d3fad9577b23892c71fb7cf0c48313 -->
## Update an article

> Example request:

```bash
curl -X PUT "/articles/1?%5CIlluminate%5CHttp%5CRequest=est&id=consequatur" \
    -H "Content-Type: application/json" \
    -d '{"main_title":"excepturi","secondary_title":"et","content":"et","author_id":3,"img":"recusandae"}'

```

```javascript
const url = new URL("/articles/1");

    let params = {
            "\Illuminate\Http\Request": "est",
            "id": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "main_title": "excepturi",
    "secondary_title": "et",
    "content": "et",
    "author_id": 3,
    "img": "recusandae"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        },
        {
            "id": 1,
            "main_title": "Quo quibusdam ut.",
            "secondary_title": "Ex harum molestiae.",
            "content": "In maxime incidunt quia est quo occaecati ex quibusdam.",
            "image": "\/tmp\/5a07a2d7a5b988fc89529fef358853c1.jpg",
            "author": "Jacinthe Abernathy"
        }
    ]
}
```

### HTTP Request
`PUT /articles/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    main_title | string |  required  | The title of the post.
    secondary_title | string |  optional  | Not required The title of the post.
    content | string |  optional  | The content of post to create.
    author_id | integer |  optional  | the ID of the author
    img | image |  optional  | This is required.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    \Illuminate\Http\Request |  optional  | $request
    id |  optional  | int

<!-- END_b4d3fad9577b23892c71fb7cf0c48313 -->

<!-- START_639be51dc3c703b743ab948939ca3abd -->
## Delete an Article

> Example request:

```bash
curl -X DELETE "/articles/1" 
```

```javascript
const url = new URL("/articles/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```

### HTTP Request
`DELETE /articles/{id}`


<!-- END_639be51dc3c703b743ab948939ca3abd -->

#Authentication


APIs for managing Authentication
<!-- START_ac6527c96d4b9793a4c77ff1e22a8906 -->
## Login

> Example request:

```bash
curl -X POST "/auth/login" 
```

```javascript
const url = new URL("/auth/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST /auth/login`


<!-- END_ac6527c96d4b9793a4c77ff1e22a8906 -->

#Author routes


APIs for managing Authors
<!-- START_cf1251112a611b51ba88e395f6bd15fe -->
## List All Authors

> Example request:

```bash
curl -X GET -G "/authors?id=dolores" 
```

```javascript
const url = new URL("/authors");

    let params = {
            "id": "dolores",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 0,
            "name": "Dr. Maximilian Pagac PhD",
            "email": "ohayes@johns.com",
            "github": "http:\/\/www.hegmann.com\/ut-itaque-qui-vel-laudantium-odio-suscipit",
            "twitter": "http:\/\/www.mckenzie.com\/voluptatem-ea-sunt-aliquam-voluptatem-odio-non-fugit-autem.html",
            "location": "534 Parisian Isle",
            "articles": []
        },
        {
            "id": 0,
            "name": "Dr. Maximilian Pagac PhD",
            "email": "ohayes@johns.com",
            "github": "http:\/\/www.hegmann.com\/ut-itaque-qui-vel-laudantium-odio-suscipit",
            "twitter": "http:\/\/www.mckenzie.com\/voluptatem-ea-sunt-aliquam-voluptatem-odio-non-fugit-autem.html",
            "location": "534 Parisian Isle",
            "articles": []
        }
    ]
}
```

### HTTP Request
`GET /authors`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | The id of the author.

<!-- END_cf1251112a611b51ba88e395f6bd15fe -->

<!-- START_e3c21f664c1b89d1f4d38f60a5e80ced -->
## Show an Author

> Example request:

```bash
curl -X GET -G "/authors/1?id=maxime" 
```

```javascript
const url = new URL("/authors/1");

    let params = {
            "id": "maxime",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 0,
            "name": "Prof. Isabella Leffler",
            "email": "rowland14@hotmail.com",
            "github": "http:\/\/www.gottlieb.org\/ut-est-sit-et.html",
            "twitter": "http:\/\/www.corwin.com\/",
            "location": "759 Jerde Lock",
            "articles": []
        },
        {
            "id": 0,
            "name": "Prof. Isabella Leffler",
            "email": "rowland14@hotmail.com",
            "github": "http:\/\/www.gottlieb.org\/ut-est-sit-et.html",
            "twitter": "http:\/\/www.corwin.com\/",
            "location": "759 Jerde Lock",
            "articles": []
        }
    ]
}
```

### HTTP Request
`GET /authors/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  required  | The id of the author.

<!-- END_e3c21f664c1b89d1f4d38f60a5e80ced -->

<!-- START_bfb05bba6bd6e003fd9a428bfb610255 -->
## Create an Author

> Example request:

```bash
curl -X POST "/authors?%5CIlluminate%5CHttp%5CRequest=culpa&id=corporis" \
    -H "Content-Type: application/json" \
    -d '{"name":"est","email":"iure","password":"quae","github":"eum","twitter":"officiis","location":"minus","last":"reprehenderit"}'

```

```javascript
const url = new URL("/authors");

    let params = {
            "\Illuminate\Http\Request": "culpa",
            "id": "corporis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "est",
    "email": "iure",
    "password": "quae",
    "github": "eum",
    "twitter": "officiis",
    "location": "minus",
    "last": "reprehenderit"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Lilly Shanahan",
            "email": "bogisich.giuseppe@bergnaum.com",
            "github": "http:\/\/www.okeefe.com\/quasi-delectus-assumenda-consequatur-aliquid-ipsam-minima-exercitationem.html",
            "twitter": "http:\/\/bergstrom.com\/non-in-autem-eaque.html",
            "location": "30904 Gussie Locks Suite 992",
            "articles": []
        },
        {
            "id": 1,
            "name": "Lilly Shanahan",
            "email": "bogisich.giuseppe@bergnaum.com",
            "github": "http:\/\/www.okeefe.com\/quasi-delectus-assumenda-consequatur-aliquid-ipsam-minima-exercitationem.html",
            "twitter": "http:\/\/bergstrom.com\/non-in-autem-eaque.html",
            "location": "30904 Gussie Locks Suite 992",
            "articles": []
        }
    ]
}
```

### HTTP Request
`POST /authors`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name for the author.
    email | string |  required  | The email for the author.
    password | string |  required  | The password of the author.
    github | string. |  optional  | 
    twitter | string. |  optional  | 
    location | string |  optional  | This is required.
    last | article |  optional  | published string.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    \Illuminate\Http\Request |  optional  | $request
    id |  optional  | int

<!-- END_bfb05bba6bd6e003fd9a428bfb610255 -->

<!-- START_ee662c4968ea3eac541cd95370312164 -->
## Update an Author

> Example request:

```bash
curl -X PUT "/authors/1?%5CIlluminate%5CHttp%5CRequest=quidem&id=placeat" \
    -H "Content-Type: application/json" \
    -d '{"name":"aut","email":"vero","password":"veritatis","github":"nisi","twitter":"voluptates","location":"tempora","last":"et"}'

```

```javascript
const url = new URL("/authors/1");

    let params = {
            "\Illuminate\Http\Request": "quidem",
            "id": "placeat",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "aut",
    "email": "vero",
    "password": "veritatis",
    "github": "nisi",
    "twitter": "voluptates",
    "location": "tempora",
    "last": "et"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Lilly Shanahan",
            "email": "bogisich.giuseppe@bergnaum.com",
            "github": "http:\/\/www.okeefe.com\/quasi-delectus-assumenda-consequatur-aliquid-ipsam-minima-exercitationem.html",
            "twitter": "http:\/\/bergstrom.com\/non-in-autem-eaque.html",
            "location": "30904 Gussie Locks Suite 992",
            "articles": []
        },
        {
            "id": 1,
            "name": "Lilly Shanahan",
            "email": "bogisich.giuseppe@bergnaum.com",
            "github": "http:\/\/www.okeefe.com\/quasi-delectus-assumenda-consequatur-aliquid-ipsam-minima-exercitationem.html",
            "twitter": "http:\/\/bergstrom.com\/non-in-autem-eaque.html",
            "location": "30904 Gussie Locks Suite 992",
            "articles": []
        }
    ]
}
```

### HTTP Request
`PUT /authors/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name for the author.
    email | string |  required  | The email for the author.
    password | string |  required  | The password of the author.
    github | string. |  optional  | 
    twitter | string. |  optional  | 
    location | string |  optional  | This is required.
    last | article |  optional  | published string.
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    \Illuminate\Http\Request |  optional  | $request
    id |  optional  | int

<!-- END_ee662c4968ea3eac541cd95370312164 -->

<!-- START_c9de86a12209a07185a001b7a6cd90df -->
## Delete an Author

> Example request:

```bash
curl -X DELETE "/authors/1" 
```

```javascript
const url = new URL("/authors/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```

### HTTP Request
`DELETE /authors/{id}`


<!-- END_c9de86a12209a07185a001b7a6cd90df -->


