<?php

namespace Avatar;

use Avatar\Model;

class Content extends Model
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
    protected $fillable = ['content_type_id', 'language_id', 'parent_id', 'user_id', 'alias', 'display_date', 'is_draft', 'is_public', 'is_stackable', 'left', 'options', 'publish_date', 'right'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * Getter for content_types.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contenttype()
    {
        return $this->belongsTo('Avatar\ContentType', 'content_type_id');

    } // function

    /**
     * Getter for languages.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('Avatar\Language', 'language_id');

    } // function

    /**
     * Getter for contents.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo('Avatar\Content', 'parent_id');

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
     * Getter for categories.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('Avatar\Category');

    } // function

    /**
     * Getter for tags.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Avatar\Tag');

    } // function

    /**
     * Getter for contents.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany('Avatar\Content');

    } // function
}
