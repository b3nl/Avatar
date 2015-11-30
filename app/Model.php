<?php
namespace Avatar;

use Avatar\Contracts\Model as ModelInterface;
use Closure;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

/**
 * The basic model for the avatar system.
 * @author b3nl <code@b3nl.de>
 * @category models
 * @package Avatar
 * @version $id$
 */
class Model extends BaseModel implements ModelInterface
{
    /**
     * The custom get-mutators.
     * @var Closure[]
     */
    protected $getMutators = [];

    /**
     * Create a new Eloquent model instance.
     * @param  array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fireModelEvent('constructing', false);

        parent::__construct($attributes);

        $this->fireModelEvent('constructed', false);
    } // function

    /**
     * Adds a custom get mutator.
     * @param string $key
     * @param Closure $closure
     * @return $this
     */
    public function addCustomGetMutator($key, Closure $closure)
    {
        $this->getMutators[Str::studly($key)] = $closure;

        return $this;
    } // function

    /**
     * Sets the attributes that should be casted to native types.
     * @param array $casts
     * @return mixed
     */
    public function casts(array $casts)
    {
        $this->casts = $casts;

        return $this;
    } // function

    /**
     * Returns the attributes that should be casted to native types.
     * @return array
     */
    public function getCasts()
    {
        return $this->casts;
    } // function

    /**
     * Has this class a custom mutator?
     * @param string $key
     * @return bool
     */
    public function hasCustomGetMutator($key)
    {
        return array_key_exists(Str::studly($key), $this->getMutators);
    } // function

    /**
     * Determine if a get mutator exists for an attribute.
     * @param  string $key
     * @return bool
     */
    public function hasGetMutator($key)
    {
        return $this->hasCustomGetMutator($key) ?: parent::hasGetMutator($key);
    } // function

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    protected function mutateAttribute($key, $value)
    {
        return $this->hasCustomGetMutator($key)
            ? $this->getMutators[Str::studly($key)]($value)
            : parent::mutateAttribute($key, $value);
    } // function
}
