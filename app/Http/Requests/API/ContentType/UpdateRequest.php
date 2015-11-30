<?php
namespace Avatar\Http\Requests\API\ContentType;

use Avatar\Http\Requests\Request;

/**
 * Request class updateing the entitiy.
 * @category Requests
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        // TODO Check for user!
        return true;
    } // function

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        $entity = $this->route('content_types');

        return [
        'class' => 'string|class_exists',
        'name' => "string|unique:content_types,name,{$entity->id},id"
        ];
    } // function
}
