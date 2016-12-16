<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 14/12/16
 * Time: 22:31
 */

namespace PopTroco\Http\Controllers;


use PopTroco\Http\Requests\TransactionRequest;
use PopTroco\Repositories\TransactionRepository;
use PopTroco\Repositories\UserRepository;
use PopTroco\Services\TransactionService;

class MyQRController extends Controller
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
        return view('client.myqr.create');
    }

    public function store()
    {
        return redirect()->route('client.myqr.create');
    }


}