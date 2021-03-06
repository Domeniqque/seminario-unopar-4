<?php

namespace App\Controllers;

use App\Repositories\ClientsRepository;
use Core\Request;

class ClientsController
{
    /**
     * @var ClientsRepository
     */
    protected $repository;

    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->repository = new ClientsRepository;
    }

    /**
     * Require the view
     */
    public function index()
    {
        return view("clients.index", array(
            'clients' => $this->repository->all()
        ));
    }

    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a category
     */
    public function store()
    {

        $response = $this->repository->save(Request::all());

        if ($response)
            message()->flash($response["type"], $response["message"]);

        return redirectTo("clients");
    }


}