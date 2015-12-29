@extends('layouts.app')

@section('heading')
Show a client
@endsection

@section('content')

<div>
    <p>Name: {!! $client->name !!}</p>
</div>
<div>
    <p>Contact: {!! $client->contact !!}</p>
</div>
<div>
    <p>Email: <a href="mailto::{!! $client->email !!}" target="_blank">{!! $client->email !!}</a></p>
</div>
<div>
    <p>Website: <a href="{!! $client->website !!}" target="_blank">{!! $client->website !!}</a></p>
</div>
<div>
    <p>Phone number: {!! $client->phone !!}</p>
</div>
<div>
    <p>Address: {!! $client->address !!}</p>
</div>
<div>
    <p>City: {!! $client->city !!}</p>
</div>
<div>
    <p>Country: {!! Countries::getOne($client->country_id)['name'] !!}</p>
</div>

<div>
    <p>
        <a href="{!! URL::action('ClientsController@edit', ['id' => $client->id]) !!}">
            <button type="button" class="btn btn-xs btn-default">Edit</button>
        </a>
        <a href="{!! URL::action('ClientsController@destroy', ['id' => $client->id]) !!}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
            <button type="button" class="btn btn-xs btn-danger">Delete</button>
        </a>
    </p>
</div>

@endsection

@section('page_scripts')
<script src="/js/fake-delete-request.js"></script>
@endsection
