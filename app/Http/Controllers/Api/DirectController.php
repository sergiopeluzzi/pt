<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 14/12/16
 * Time: 22:31
 */

namespace PopTroco\Http\Controllers\Api;


use PopTroco\Http\Controllers\Controller;
use PopTroco\Http\Requests\TransactionRequest;
use PopTroco\Repositories\TransactionRepository;
use PopTroco\Repositories\UserRepository;
use PopTroco\Services\TransactionService;

class DirectController extends Controller
{


    /**
     * @var TransactionRepository
     */
    private $transactionRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var TransactionService
     */
    private $transactionService;

    function __construct(TransactionRepository $transactionRepository, UserRepository $userRepository, TransactionService $transactionService)
    {
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
        $this->transactionService = $transactionService;
    }

    public function create()
    {
        return view('client.direct.create');
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->all();

        $transaction = $this->transactionService->clientcreate($data);
        $transaction = $this->transactionRepository->with('clientTo')->find($transaction->id);

        return $transaction;
    }
}