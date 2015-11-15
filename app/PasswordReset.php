<?php

namespace Avatar;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'token'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_resets';
}
