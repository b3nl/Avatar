<?php
namespace Avatar\ContentType;

use Avatar\Content;
use Avatar\Contracts\ContentType\Adapter;

abstract class BaseAdapter implements Adapter
{
    /**
     * Returns the additional rules for storing an content.
     * @return array
     */
    public function getStoreValidationRules()
    {
        return [];
    }// function

    /**
     * Returns the additional validation rules for updating a content.
     * @param Content $content
     * @return array
     */
    public function getUpdateValidationRules(Content $content)
    {
        return [];
    } // function
}
