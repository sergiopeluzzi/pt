<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 14/12/16
 * Time: 22:31
 */

namespace PopTroco\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;
use PopTroco\Http\Controllers\Controller;
use PopTroco\Http\Requests\TransactionRequest;
use PopTroco\Presenters\TransactionPresenter;
use PopTroco\Repositories\TransactionRepository;
use PopTroco\Repositories\UserRepository;
use PopTroco\Services\TransactionService;

class MyTransactionsController extends Controller
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

    public function index()
    {
        $fromId = $this->userRepository->find(Auth::user()->id)->client->id;

        $transactionsPaid = $this->transactionRepository->skipPresenter(false)->with('clientTo')->scopeQuery(function ($query) use($fromId) {
            return $query->where('from', '=', $fromId);
        })->paginate();

        $transactionsReceived = $this->transactionRepository->skipPresenter(false)->with(['clientFrom'])->scopeQuery(function ($query) use($fromId) {
            return $query->where('to', '=', $fromId);
        })->paginate();

        return [$transactionsPaid, $transactionsReceived];
    }

    public function show($id)
    {
        $transaction = $this->transactionRepository->skipPresenter(false)->with('clientTo')->find($id);
        //$transaction->clientTo->user;

        return $transaction;

    }

}