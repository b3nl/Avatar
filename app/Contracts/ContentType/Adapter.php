<?php
namespace Avatar\Contracts\ContentType;

use Avatar\Content;

interface Adapter
{
    /**
     * Returns the additional rules for storing an content.
     * @return array
     */
    public function getStoreValidationRules(); // function

    /**
     * Returns the additional validation rules for updating a content.
     * @param Content $content
     * @return array
     */
    public function getUpdateValidationRules(Content $content); // function
}
