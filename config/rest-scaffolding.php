<?php
return [
    'categories' => [
        'model' => 'Avatar\\Category',
        'validators' => [
            'store' => [
                'language_id' => 'required|integer|exists:languages,id',
                'parent_id' => 'integer|exists:categories,id',
                'user_id' => 'required|integer|exists:users,id',
                'alias' => 'string|unique:categories,alias,NULL,id,language_id,1', // TODO Get the language
                'select' => 'string',
                'sort' => 'integer',
                'title' => 'required|string'
            ],
            'update' => [
                'language_id' => 'integer|exists:languages,id',
                'parent_id' => 'integer|exists:categories,id',
                'user_id' => 'integer|exists:users,id',
                'alias' => 'string|unique:categories,alias,{$entity->id},id,language_id,{$entity->language_id}',
                'select' => 'string',
                'sort' => 'integer',
                'title' => 'string'
            ]
        ]
    ],
    'content_types' => [
        'model' => 'Avatar\\ContentType',
        'validators' => [
            'store' => [
                'class' => 'required|string|class_exists',
                'name' => 'required|string|unique:content_types,name'
            ],
            'update' => [
                'class' => 'string|class_exists',
                'name' => 'string|unique:content_types,name,{$entity->id},id'
            ]
        ]
    ],
    'contents' => [
        'model' => 'Avatar\\Content',
        'validators' => [
            'store' => [
                'alias' => 'string|unique:contents,alias',
                'content_type_id' => 'required|integer|exists:content_types,id',
                'language_id' => 'required|integer|exists:languages,id',
                'user_id' => 'required|integer|exists:users,id',
                'display_date' => 'date',
                'is_draft' => 'boolean',
                'is_public' => 'boolean',
                'publish_date' => 'date'
            ],
            'update' => [

            ]
        ]
    ],
    'languages' => [
        'model' => 'Avatar\\Language',
        'validators' => [
            'store' => [
                'name' => 'required|string|unique:languages,name'
            ],
            'update' => [
                'name' => 'string|unique:languages,name'
            ]
        ]
    ],
    'tags' => [
        'model' => 'Avatar\\Tag',
        'validators' => [
            'store' => [
                'tag' => 'required|string|unique:tags,tag', // TODO Add language_id
                'user_id' => 'required|integer|exists:users,id'
            ],
            'update' => [
                'tag' => 'string|unique:tags,tag', // TODO Add language_id
                'user_id' => 'integer|exists:users,id'
            ]
        ]
    ]
];
