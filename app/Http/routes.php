<?php
use Avatar\Content;
use Avatar\Language;
use Avatar\Category;
use Avatar\Tag;
use Avatar\ContentType;
use Illuminate\Routing\Router;

Route::group(['namespace' => 'API', 'prefix' => 'api'], function (Router $router) {
    $router->model('content_types', ContentType::class);
    $router->resource('content_types', 'ContentTypesController', ['except' => ['create', 'edit']]);
    $router->model('tags', Tag::class);
    $router->resource('tags', 'TagsController', ['except' => ['create', 'edit']]);
    $router->model('categories', Category::class);
    $router->resource('categories', 'CategoriesController', ['except' => ['create', 'edit']]);
    $router->model('contents', Content::class);
    $router->resource('contents', 'ContentsController', ['except' => ['create', 'edit']]);
    $router->model('languages', Language::class);
    $router->resource('languages', 'LanguagesController', ['except' => ['create', 'edit']]);

});
