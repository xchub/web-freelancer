@extends('layouts.app')

@section('heading')
Invoice # {!! $invoice->id !!}
@endsection

@section('content')
<div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <strong>{{ $invoice->client->name }}</strong><br />
                            {{$invoice->client->contact}} (<a href="mailto:{{$invoice->client->email}}">{{$invoice->client->email}}</a>)<br />
                            @if($invoice->client->address != null)
                            {{$invoice->client->address}}<br>
                            @endif
                            @if($invoice->client->city != null)
                            {{$invoice->client->city}}<br>
                            @endif
                            @if($invoice->client->country_id != null)
                            {{$invoice->client->country->name}}<br>
                            @endif
                            @if($invoice->client->phone != null)
                            @endif
                            {{$invoice->client->phone}}<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Informations</div>
                        <div class="panel-body">
                            Internal ref. #: {!! $invoice->reference_nb !!}<br />
                            Invoice generated at: {!! $invoice->created_at !!}<br />
                            Due date: {!! $invoice->due_date !!}<br />
                            Notes: {!! $invoice->notes !!}
                        </div>
                    </div>
                </div>
            </div>

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center"><strong>Order summary</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Item Name</strong></td>
                            <td class="text-center"><strong>Item Price</strong></td>
                            <td class="text-center"><strong>Item Quantity</strong></td>
                            <td class="text-right"><strong>Total</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $subtotal=0; ?>
                        @foreach ($invoice->items as $item)
                        <tr>
                            <td><b>{!! $item->name !!}</b><br />{!! $item->description !!}</td>
                            <td class="text-center">{{ number_format($item->cost, 2) }} $</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-right">{{ number_format($item->total, 2) }} $</td>
                        </tr>
                        <?php $subtotal=$subtotal+$item->total; ?>
                        @endforeach
                        <tr>
                            <td class="highrow"></td>
                            <td class="highrow"></td>
                            <td class="highrow text-right"><strong>Subtotal</strong></td>
                            <td class="highrow text-right">{{ number_format($subtotal, 2) }} $</td>
                        </tr>
                        <tr>
                            <td class="emptyrow"></td>
                            <td class="emptyrow"></td>
                            <td class="emptyrow text-right"><strong>Taxes ({!! $invoice->tax * 100 !!} %)</strong></td>
                            <td class="emptyrow text-right">{{ number_format(($subtotal * $invoice->tax),2) }} $</td>
                        </tr>
                        <tr>
                            <td class="emptyrow"></td>
                            <td class="emptyrow"></td>
                            <td class="emptyrow text-right"><strong>Total</strong></td>
                            <td class="emptyrow text-right">{{ number_format(($subtotal+($subtotal * $invoice->tax)),2 )}} $</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div>
    <p>
        <a href="{!! URL::action('InvoicesController@edit', ['id' => $invoice->id]) !!}">
            <button type="button" class="btn btn-xs btn-default">Edit</button>
        </a>
        <a href="{!! URL::action('InvoicesController@destroy', ['id' => $invoice->id]) !!}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
            <button type="button" class="btn btn-xs btn-danger">Delete</button>
        </a>
    </p>
</div>

@endsection

@section('page_scripts')
<script src="/js/fake-delete-request.js"></script>
@endsection
