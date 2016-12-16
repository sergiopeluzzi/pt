<?php

namespace PopTroco\Repositories;

use PopTroco\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PopTroco\Repositories\UserRepository;
use PopTroco\Models\User;
use PopTroco\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace PopTroco\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
        return UserPresenter::class;
    }
}
