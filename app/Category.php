<?php

namespace Avatar;

use Avatar\Model;

class Category extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * Which values should be casted?
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['language_id', 'parent_id', 'user_id', 'alias', 'left', 'select', 'right', 'title'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Getter for languages.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('Avatar\Language', 'language_id');
    } // function

    /**
     * Getter for the parent category.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('Avatar\Category', 'parent_id');
    } // function

    /**
     * Getter for users.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Avatar\User', 'user_id');
    } // function

    /**
     * Getter for contents.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contents()
    {
        return $this->belongsToMany('Avatar\Content');
    } // function

    /**
     * Getter for categories.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('Avatar\Category', 'id', 'parent_id');
    } // function
}
