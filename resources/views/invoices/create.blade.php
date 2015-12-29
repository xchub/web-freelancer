@extends('layouts.app')

@section('heading')
Create a new client
@endsection

@section('content')

{!! Form::open(array('route' => 'client.store', 'method' => 'POST')) !!}
    <div class="form-group">
        {!! Form::label('name', 'Client name: *') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('contact', 'Contact name:') !!}
        {!! Form::text('contact', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Contact email: *') !!}
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('website', 'Website:') !!}
        {!! Form::text('website', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone number:') !!}
        {!! Form::text('phone', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country_id', 'Country:') !!}
        {!! Form::select('country_id', $countries, null, array('class' => 'form-control', 'placeholder' => 'Choose wisely')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit() !!}
    </div>
{!! Form::close() !!}

@endsection

@section('page_scripts')
@endsection
