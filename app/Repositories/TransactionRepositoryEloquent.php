<?php

namespace PopTroco\Repositories;

use PopTroco\Presenters\TransactionPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PopTroco\Repositories\TransactionRepository;
use PopTroco\Models\Transaction;
use PopTroco\Validators\TransactionValidator;

/**
 * Class TransactionRepositoryEloquent
 * @package namespace PopTroco\Repositories;
 */
class TransactionRepositoryEloquent extends BaseRepository implements TransactionRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Transaction::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return TransactionPresenter::class;
    }
}
