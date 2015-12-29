<?php

namespace App\Http\Controllers;

use App\Client;
use Session;
use Redirect;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * GET: /client
     *
     * @return Response
     */
    public function index()
    {
        $clients = Client::paginate(2);
        return view('clients.index')->with('clients', $clients);
    }

    /**
   * Show the form for creating a new resource.
   * GET: /client/create
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   * POST: /client
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   * GET: /client/{client}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   * GET: /client/{client}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   * PUIT/PATCH: /client/{client}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   * DELETE: /client/{client}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

    Client::destroy($id);
    Session::flash('success', 'Client successfully destroyed.');
    return Redirect::route('client.index');
    
  }
}
