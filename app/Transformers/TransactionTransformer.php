<?php

namespace PopTroco\Transformers;

use League\Fractal\TransformerAbstract;
use PopTroco\Models\Transaction;

/**
 * Class TransactionTransformer
 * @package namespace PopTroco\Transformers;
 */
class TransactionTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['clientTo', 'clientFrom'];

    /**
     * Transform the \Transaction entity
     * @param \Transaction $model
     *
     * @return array
     */
    public function transform(Transaction $model)
    {
        return [
            'id' => (int) $model->id,
            'value' => (float) $model->value,
            'history' => $model->history,
            'created_at' => $model->created_at
        ];
    }

    public function includeClientTo(Transaction $model)
    {
        return $this->item($model->clientTo, new ClientTransformer());
    }

    public function includeClientFrom(Transaction $model)
    {
        return $this->item($model->clientFrom, new ClientTransformer());
    }
}
