<?php

namespace Mushketer888\LaravelDblog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DBLog extends Model {
    use SoftDeletes;

    protected $table='logs';

    protected $fillable = [
        'env',
        'message',
        'level',
        'context',
        'extra'
    ];

    protected $casts = [
        'context' => 'array',
        'extra'   => 'array'
    ];
}