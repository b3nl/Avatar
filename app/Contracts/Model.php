<?php

namespace Avatar\Contracts;

use Closure;

/**
 * The interface for the avatar model.
 * @author b3nl <code@b3nl.de>
 * @category Contracts
 * @package Avatar
 * @subpackage Contracts
 * @version $id$
 */
interface Model
{
    /**
     * Adds a custom get mutator.
     * @param string $key
     * @param Closure $closure
     * @return $this
     */
    public function addCustomGetMutator($key, Closure $closure); // function

    /**
     * Sets the attributes that should be casted to native types.
     * @param array $casts
     * @return mixed
     */
    public function casts(array $casts);

    /**
     * Set the fillable attributes for the model.
     * @param  array $fillable
     * @return $this
     */
    public function fillable(array $fillable); // function

    /**
     * Returns the attributes that should be casted to native types.
     * @return array
     */
    public function getCasts(); // function

    /**
     * Get the fillable attributes for the model.
     * @return array
     */
    public function getFillable();
} // interface
