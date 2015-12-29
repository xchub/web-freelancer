@extends('layouts.app')

@section('heading')
Edit a client
@endsection

@section('content')

{!! Form::open(array('route' => array('client.update', $id), 'method' => 'PUT')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Client name: *') !!}
        {!! Form::text('name', $client->name, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('contact', 'Contact name:') !!}
        {!! Form::text('contact', $client->contact, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Contact email: *') !!}
        {!! Form::text('email', $client->email, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('website', 'Website:') !!}
        {!! Form::text('website', $client->website, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone number:') !!}
        {!! Form::text('phone', $client->phone, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', $client->address, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', $client->city, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_id', 'Country:') !!}
        {!! Form::select('country_id', $countries, $client->country_id, array('class' => 'form-control', 'placeholder' => 'Choose wisely')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit() !!}
    </div>
{!! Form::close() !!}

@endsection

@section('page_scripts')
@endsection
