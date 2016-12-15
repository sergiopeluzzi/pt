<?php

namespace PopTroco\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Transaction extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['from', 'to', 'date', 'value', 'history'];

    public function clientFrom()
    {
        return $this->hasOne(Client::class, 'id', 'from');
    }

    public function clientTo()
    {
        return $this->hasOne(Client::class, 'id', 'to');
    }

}
