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
        <td> ... </td>
    </tr>
    @endforeach
</table>

{!! $clients->links() !!}

@endsection
