@extends('layouts.app')

@section('heading')
Invoices
@endsection

@section('content')

<table class="table table-striped table-bordered">
	<thead>
		<td>Reference #</td>
		<td>Client</td>
		<td>Creation date</td>
		<td>Due date</td>
        <td>Actions</td>
	</thead>
	@foreach ($invoices as $invoice)
	<tr>
        <td>{{ $invoice->reference_nb }}</td>
        <td>{{ $invoice->client->name }}</td>
        <td>{{ $invoice->created_at }}</td>
        <td>{{ $invoice->due_date }}</td>
        <td><a href="{!! URL::action('InvoicesController@show', ['id' => $invoice->id]) !!}" ><span class="glyphicon glyphicon-eye-open" /></span></a> <a href="{!! URL::action('InvoicesController@edit', ['id' => $invoice->id]) !!}" ><span class="glyphicon glyphicon-edit" /></span></a> <a href="{!! URL::action('InvoicesController@destroy', ['id' => $invoice->id]) !!}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash" /></span></a></td>

    </tr>
    @endforeach
</table>

{!! $invoices->links() !!}

@endsection

@section('page_scripts')
<script src="/js/fake-delete-request.js"></script>
@endsection
