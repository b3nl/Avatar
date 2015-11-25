<?php
namespace Avatar\Http\Requests\API\Tag;

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
        return array (
        'tag' => 'required|string|unique:tags,tag',
        'user_id' => 'required|integer|exists:users,id',
        );
    } // function
}
