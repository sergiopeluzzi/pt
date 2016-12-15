<?php

namespace PopTroco\Models;

use Illuminate\Database\Eloquent\Model;
use PopTroco\Http\Requests\TransactionRequest;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['user_id', 'code', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function from()
    {
        return $this->belongsTo(Transaction::class, 'from');
    }

    public function to()
    {
        return $this->belongsTo(Transaction::class, 'to');
    }
}
