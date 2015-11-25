<?php
namespace Avatar\Http\Controllers\API;

use Avatar\Http\Requests\API\Tag\StoreRequest;
use Avatar\Http\Requests\API\Tag\UpdateRequest;
use Avatar\Http\Requests;
use Avatar\Http\Controllers\Controller;
use b3nl\RESTScaffolding\Http\Controllers\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Avatar\Tag;

/**
 * The basic controller for table api requests.
 * @category Controllers
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class TagsController extends Controller
{
    use PaginationTrait;

    /**
     * Deletes the given row.
     * @param Tag $entity
     * @return Tag
     */
    public function destroy(Tag $entity)
    {
        $entity->delete();

        return $entity;
    } // function

    /**
     * Returns the class name for rendering the list.
     * @return string
     */
    protected function getListClassName() {
        return Tag::class;
    } // function

    /**
     * Returns the entity.
     * @param Tag $entity
     * @return Tag
     */
    public function show(Tag $entity)
    {
        return $entity;
    } // function

    /**
     * Saves the entity.
     * @param StoreRequest $request
     * @return Tag
     */
    public function store(StoreRequest $request)
    {
        return Tag::create($request->all());
    } // function

    /**
     * Updates the entity.
     * @param UpdateRequest $request
     * @param Tag $entity
     * @return Tag
     */
    public function update(UpdateRequest $request, Tag $entity)
    {
        $entity->update($request->all());

        return $entity;
    } // function
}
