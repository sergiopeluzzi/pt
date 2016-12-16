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

        $from = $this->clientRepository->find($data['from']);
        $from->balance -= $value;
        $from->save();

        $to = $this->clientRepository->find($data['to']);
        $to->balance += $value;
        $to->save();

        return $this->transactionRepository->create($data);
    }

    public function clientcreate(array $data)
    {
        $value = $data['value'];
        $from = $this->clientRepository->findByField('user_id', auth()->user()->id)[0]->id;
        $to = $this->clientRepository->findByField('code', $data['code'])[0]->id;
        $history = 'From: ' . $this->clientRepository->find($from)->user->name . ' To: ' . $this->clientRepository->find($to)->user->name;

        $save = ['from' => $from, 'to' => $to, 'value' => $value, 'history' => $history];

        return $this->create($save);
    }
}