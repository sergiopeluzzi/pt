<?php

namespace PopTroco\Presenters;

use PopTroco\Transformers\TransactionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransactionPresenter
 *
 * @package namespace PopTroco\Presenters;
 */
class TransactionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransactionTransformer();
    }
}
