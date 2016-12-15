<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 14/12/16
 * Time: 21:46
 */

namespace PopTroco\Services;


use Carbon\Carbon;
use PopTroco\Repositories\ClientRepository;
use PopTroco\Repositories\TransactionRepository;
use PopTroco\Repositories\UserRepository;

class TransactionService
{

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    function __construct(ClientRepository $clientRepository, TransactionRepository $transactionRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->transactionRepository = $transactionRepository;
    }


    public function create(array $data)
    {
        $value = $data['value'];

        $this->transactionRepository->create($data);

        $from = $this->clientRepository->find($data['from']);
        $from->balance -= $value;
        $from->save();

        $to = $this->clientRepository->find($data['to']);
        $to->balance += $value;
        $to->save();
    }
}