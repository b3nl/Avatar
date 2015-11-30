<?php
namespace Avatar\Content;

use Avatar\Content;

class Observer {
    public function deleting(Content $content)
    {
        // TODO Delete childs.
    }

    public function saving(Content $content)
    {
        // Update left and right
    } // function
}
