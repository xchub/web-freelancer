<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Client;
use Session;
use Redirect;
use Countries;

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
   foreach (Countries::getList('name') as $key => $value) {
     $countries[$key] = $value['name'];
   }

    return view('clients.create')->with('countries', $countries);
  }

  /**
   * Store a newly created resource in storage.
   * POST: /client
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'website' => 'url',
    ]);

    $input = $request->all();
    $client = Client::create($input);
    $client->save();

    Session::flash('success', 'Client successfully added.');
    return Redirect::route('client.index');
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
    $client = Client::findOrFail($id);
    return view('clients.show')->with('client', $client);
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
    foreach (Countries::getList('name') as $key => $value) {
     $countries[$key] = $value['name'];
   }

    $client = Client::findOrFail($id);
    return view('clients.edit')->with('id', $id)->with('client', $client)->with('countries', $countries);
  }

  /**
   * Update the specified resource in storage.
   * PUIT/PATCH: /client/{client}
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'website' => 'url',
    ]);

    $input = $request->all();
    $client = Client::findOrFail($id);
    $client->fill($input)->save();

    Session::flash('success', 'Client modification saved!');
    return Redirect::route('client.show', ['id' => $id]);
    
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
