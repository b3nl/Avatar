<?php
    return [
        'content_types' => [
            'model' => 'Avatar\\ContentType',
            'validators' => [
                'store' => [
                    'name' => 'required|string|unique:content_types,name'
                ],
                'update' => [
                    'tag' => 'string|unique:content_types,name',
                    'user_id' => 'exists:users,id'
                ]
            ]
        ],
        'tags' => [
            'model' => 'Avatar\\Tag',
            'validators' => [
                'store' => [
                    'tag' => 'required|string|unique:tags,tag', // TODO Add language_id
                    'user_id' => 'required|exists:users,id'
                ],
                'update' => [
                    'tag' => 'string|unique:tags,tag', // TODO Add language_id
                    'user_id' => 'exists:users,id'
                ]
            ]
        ]
    ];
