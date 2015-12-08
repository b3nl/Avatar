<?php
namespace Avatar\Http\Controllers\API;

use Avatar\Http\Requests\API\Language\StoreRequest;
use Avatar\Http\Requests\API\Language\UpdateRequest;
use Avatar\Http\Requests;
use Avatar\Http\Controllers\Controller;
use b3nl\RESTScaffolding\Http\Controllers\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Avatar\Language;

/**
 * The basic controller for table api requests.
 * @category Controllers
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class LanguagesController extends Controller
{
    use PaginationTrait;

    /**
     * Deletes the given row.
     * @param Language $entity
     * @return Language
     */
    public function destroy(Language $entity)
    {
        $entity->delete();

        return $entity;
    } // function

    /**
     * Returns the class name for rendering the list.
     * @return string
     */
    protected function getListClassName() {
        return Language::class;
    } // function

    /**
     * Returns the entity.
     * @param Language $entity
     * @return Language
     */
    public function show(Language $entity)
    {
        return $entity;
    } // function

    /**
     * Saves the entity.
     * @param StoreRequest $request
     * @return Language
     */
    public function store(StoreRequest $request)
    {
        $savedEntity = Language::create($request->all());

        return Language::find($savedEntity->id);
    } // function

    /**
     * Updates the entity.
     * @param UpdateRequest $request
     * @param Language $entity
     * @return Language
     */
    public function update(UpdateRequest $request, Language $entity)
    {
        $entity->update($request->all());

        return $entity;
    } // function
}
