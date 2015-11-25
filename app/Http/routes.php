<?php
use Avatar\Tag;
use Avatar\ContentType;
use Illuminate\Routing\Router;

Route::group(['namespace' => 'API', 'prefix' => 'api'], function (Router $router) {
    $router->model('content_types', ContentType::class);
    $router->resource('content_types', 'ContentTypesController', ['except' => ['create', 'edit']]);
    $router->model('tags', Tag::class);
    $router->resource('tags', 'TagsController', ['except' => ['create', 'edit']]);

});
