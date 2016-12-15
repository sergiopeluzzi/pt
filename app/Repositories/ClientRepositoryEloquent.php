<?php

namespace PopTroco\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PopTroco\Repositories\ClientRepository;
use PopTroco\Models\Client;
use PopTroco\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace PopTroco\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
