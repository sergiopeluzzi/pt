<?php

namespace PopTroco\Transformers;

use League\Fractal\TransformerAbstract;
use PopTroco\Models\Client;

/**
 * Class ClientToTransformer
 * @package namespace PopTroco\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['user'];

    /**
     * Transform the \ClientTo entity
     * @param \ClientTo $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id' => (int) $model->id,
            'code' => $model->code,
            'balance' => (float) $model->balance
        ];
    }

    public function includeUser(Client $model)
    {
        return $this->item($model->user, new UserTransformer());
    }
}
