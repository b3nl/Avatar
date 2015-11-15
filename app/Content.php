<?php

namespace Avatar;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

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
    protected $fillable = ['alias', 'display_date', 'is_draft', 'is_public', 'publish_date', 'user_id', 'language_id', 'content_type_id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * Getter for users.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Avatar\User', 'user_id');
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
     * Getter for content_types.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contenttype()
    {
        return $this->belongsTo('Avatar\ContentType', 'content_type_id');
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
}
