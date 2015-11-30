<?php
namespace Avatar\Http\Requests\API\Content;

use Avatar\Http\Requests\Request;

/**
 * Request class storing the entitiy.
 * @category Requests
 * @package Avatar
 * @subpackage Http
 * @version $id$
 */
class StoreRequest extends Request
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
        return [
            'alias' => 'string|unique:contents,alias',
            'content_type_id' => 'required|integer|exists:content_types,id',
            'language_id' => 'required|integer|exists:languages,id',
            'user_id' => 'required|integer|exists:users,id',
            'display_date' => 'date',
            'is_draft' => 'boolean',
            'is_public' => 'boolean',
            'publish_date' => 'date'
        ];
    } // function
}
