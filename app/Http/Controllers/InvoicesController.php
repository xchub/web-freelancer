<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceItem;
use App\Client;
use Session;
use Redirect;
use Countries;

class InvoicesController extends Controller
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
     * GET: /invoice.
     *
     * @return Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(15);
        return view('invoices.index')->with('invoices', $invoices);
    }

  /**
   * Show the form for creating a new resource.
   * GET: /invoice/create.
   *
   * @return Response
   */
  public function create()
  {
      return view('invoices.create');
  }

  /**
   * Store a newly created resource in storage.
   * POST: /invoice.
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
      $invoice = Invoice::create($input);
      $invoice->save();

      Session::flash('success', 'Invoice successfully added.');

      return Redirect::route('invoices.index');
  }

  /**
   * Display the specified resource.
   * GET: /invoice/{client}.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $invoice = Invoice::findOrFail($id);

      return view('invoices.show')->with('invoice', $invoice);
  }

  /**
   * Show the form for editing the specified resource.
   * GET: /invoice/{client}/edit.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $invoice = Invoice::findOrFail($id);

      return view('invoices.edit')->with('id', $id)->with('invoice', $invoice);
  }

  /**
   * Update the specified resource in storage.
   * PUIT/PATCH: /invoice/{client}.
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
      $invoice = Invoice::findOrFail($id);
      $invoice->fill($input)->save();

      Session::flash('success', 'Invoice modification saved!');

      return Redirect::route('invoice.show', ['id' => $id]);
  }

  /**
   * Remove the specified resource from storage.
   * DELETE: /invoice/{client}.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Invoice::destroy($id);
      InvoiceItem::where('invoice_id', $id)->delete();
      Session::flash('success', 'Invoice successfully destroyed.');

      return Redirect::route('invoice.index');
  }
}
