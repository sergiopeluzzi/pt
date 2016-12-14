<?php

namespace PopTroco\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

}
