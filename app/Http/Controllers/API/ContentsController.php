<?php
namespace Avatar\Http\Controllers\API;

use Avatar\ContentType\Factory;
use Avatar\Http\Requests\API\Content\StoreRequest;
use Avatar\Http\Requests\API\Content\UpdateRequest;
use Avatar\Http\Requests;
use Avatar\Http\Controllers\Controller;
use b3nl\RESTScaffolding\Http\Controllers\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Avatar\Content;

/**
 * The basic controller for table api requests.
 * @category Controllers
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class ContentsController extends Controller
{
    use PaginationTrait;

    /**
     * Deletes the given row.
     * @param Content $entity
     * @return Content
     */
    public function destroy(Content $entity)
    {
        $entity->delete();

        return $entity;
    } // function

    /**
     * Returns the class name for rendering the list.
     * @return string
     */
    protected function getListClassName()
    {
        return Content::class;
    } // function

    /**
     * Returns the entity.
     * @param Content $entity
     * @return Content
     */
    public function show(Content $entity)
    {
        return $entity;
    } // function

    /**
     * Saves the entity.
     * @param StoreRequest $request
     * @return Content
     */
    public function store(StoreRequest $request)
    {
        $adapter = app(Factory::class)->getAdapter($request->get('content_type_id'));

        if ($validationRules = $adapter->getStoreValidationRules()) {
            $this->validate($request, $validationRules);
        } // if

        // this would only return the inserted attributes without the default ones.
        $savedEntity = Content::create($request->all());

        return Content::find($savedEntity->id);
    } // function

    /**
     * Updates the entity.
     * @param UpdateRequest $request
     * @param Content $entity
     * @return Content
     */
    public function update(UpdateRequest $request, Content $entity)
    {
        $adapter = app(Factory::class)->getAdapter($request->get('content_type_id') ?: $entity->content_type_id);

        if ($validationRules = $adapter->getUpdateValidationRules()) {
            $this->validate($request, $validationRules);
        } // if

        $entity->update($request->all());

        return $entity;
    } // function
}
