<?php

namespace Avatar\Category;

use Avatar\Category;
use Illuminate\Support\Facades\DB;

class Observer
{
    public function creating(Category $category)
    {
        $prevSibling = Category::where('parent_id', $category->parent_id)
            ->orderBy('left', 'desc')
            ->take(1)
            ->first();

        $leftStart = 0;

        if ($prevSibling) {
            $leftStart = $prevSibling->right;
        } else if ($parent = $category->parent) {
            $leftStart = $parent->left;
        } // elseif

        $category->left = $leftStart + 1;
        $category->right = $leftStart + 2;
    } // function

    public function deleted(Category $category)
    {
        Category::where('left', '>', $category->right)
            ->where('id', '!=', $category->id)
            ->update([
                'left' => DB::raw('`left` - 1'),
                'right' => DB::raw('`right` - 1')
            ]);
    }

    public function deleting(Category $category)
    {
        /** @var Category $childCategory */
        foreach ($category->children() as $childCategory) {
            $childCategory->delete();
        } // foreach
    }

    public function saved(Category $category)
    {
        /** @var Category $parent */
        $parent = $category->parent;

        // Only after fresh insert.
        if (!$category->getOriginal('id')) {
            Category::where('left', '>=', $category->left)
                ->where('id', '!=', $category->id)
                ->update([
                    'left' => DB::raw('`left` + 1'),
                    'right' => DB::raw('`right` + 1')
                ]);


            if ($parent) {
                $parent->right = $category->right + 1;
                $parent->saveOrFail();
            } // if
        }
    }
}
