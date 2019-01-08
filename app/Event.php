<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Events extends Model
{
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'starts_at',
        'ends_at',
        'status',
        'summary',
        'location',
        'uid'
    ];

    /**
     * The rules for data entry
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'starts_at' => 'required',
        'ends_at' => 'required',
        'status' => 'required',
        'summary' => 'required',
        'location' => 'required',
        'uid' => 'required'
    ];
}