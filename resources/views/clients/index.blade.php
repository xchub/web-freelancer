@extends('layouts.app')

@section('heading')
Clients
@endsection

@section('content')

<table class="table table-striped table-bordered">
	<thead>
		<td>Name</td>
		<td>Contact</td>
		<td>Website</td>
		<td>Actions</td>
	</thead>
	@foreach ($clients as $client)
	<tr>
        <td>{{ $client->name }}</td>
        <td>{{ $client->contact }}</td>
        @if ($client->website != "")
        <td><a href="{{ $client->website }}" target="_blank">{{ $client->website }}</a></td>
        @else
        <td></td>
        @endif
        <td><a href="{!! URL::action('ClientsController@show', ['id' => $client->id]) !!}" ><span class="glyphicon glyphicon-eye-open" /></span></a> <a href="{!! URL::action('ClientsController@edit', ['id' => $client->id]) !!}" ><span class="glyphicon glyphicon-edit" /></span></a> <a href="{!! URL::action('ClientsController@destroy', ['id' => $client->id]) !!}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash" /></span></a></td>

    </tr>
    @endforeach
</table>

{!! $clients->links() !!}

@endsection

@section('page_scripts')
<script src="/js/fake-delete-request.js"></script>
@endsection
