<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    public $table = "users";
}