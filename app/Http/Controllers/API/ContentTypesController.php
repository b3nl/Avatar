<?php
namespace Avatar\Http\Controllers\API;

use Avatar\Http\Requests\API\ContentType\StoreRequest;
use Avatar\Http\Requests\API\ContentType\UpdateRequest;
use Avatar\Http\Requests;
use Avatar\Http\Controllers\Controller;
use b3nl\RESTScaffolding\Http\Controllers\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Avatar\ContentType;

/**
 * The basic controller for table api requests.
 * @category Controllers
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class ContentTypesController extends Controller
{
    use PaginationTrait;

    /**
     * Deletes the given row.
     * @param ContentType $entity
     * @return ContentType
     */
    public function destroy(ContentType $entity)
    {
        $entity->delete();

        return $entity;
    } // function

    /**
     * Returns the class name for rendering the list.
     * @return string
     */
    protected function getListClassName() {
        return ContentType::class;
    } // function

    /**
     * Returns the entity.
     * @param ContentType $entity
     * @return ContentType
     */
    public function show(ContentType $entity)
    {
        return $entity;
    } // function

    /**
     * Saves the entity.
     * @param StoreRequest $request
     * @return ContentType
     */
    public function store(StoreRequest $request)
    {
        $savedEntity = ContentType::create($request->all());

        return ContentType::find($savedEntity->id);
    } // function

    /**
     * Updates the entity.
     * @param UpdateRequest $request
     * @param ContentType $entity
     * @return ContentType
     */
    public function update(UpdateRequest $request, ContentType $entity)
    {
        $entity->update($request->all());

        return $entity;
    } // function
}
