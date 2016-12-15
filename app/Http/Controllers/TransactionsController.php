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
use PopTroco\Services\TransactionService;

class TransactionsController extends Controller
{

    /**
     * @var TransactionRepository
     */
    private $repository;
    /**
     * @var TransactionService
     */
    private $service;

    function __construct(TransactionRepository $repository, TransactionService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $transactions = $this->repository->paginate();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('admin.transactions.create');
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $this->service->create($data);

        return redirect()->route('admin.transactions.index');
    }
}