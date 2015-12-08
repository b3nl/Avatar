<?php
namespace Avatar\Http\Controllers\API;

use Avatar\Http\Requests\API\Category\StoreRequest;
use Avatar\Http\Requests\API\Category\UpdateRequest;
use Avatar\Http\Requests;
use Avatar\Http\Controllers\Controller;
use b3nl\RESTScaffolding\Http\Controllers\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Avatar\Category;

/**
 * The basic controller for table api requests.
 * @category Controllers
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class CategoriesController extends Controller
{
    use PaginationTrait;

    /**
     * Deletes the given row.
     * @param Category $entity
     * @return Category
     */
    public function destroy(Category $entity)
    {
        $entity->delete();

        return $entity;
    } // function

    /**
     * Returns the class name for rendering the list.
     * @return string
     */
    protected function getListClassName() {
        return Category::class;
    } // function

    /**
     * Returns the entity.
     * @param Category $entity
     * @return Category
     */
    public function show(Category $entity)
    {
        return $entity;
    } // function

    /**
     * Saves the entity.
     * @param StoreRequest $request
     * @return Category
     */
    public function store(StoreRequest $request)
    {
        // this would only return the inserted attributes without the default ones.
        $savedEntity = Category::create($request->all());

        return Category::find($savedEntity->id);
    } // function

    /**
     * Updates the entity.
     * @param UpdateRequest $request
     * @param Category $entity
     * @return Category
     */
    public function update(UpdateRequest $request, Category $entity)
    {
        $entity->update($request->all());

        return $entity;
    } // function
}
