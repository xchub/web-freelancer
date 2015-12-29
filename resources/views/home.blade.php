@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    <ul class="nav nav-sidebar">
                        <li>Clients</li>
                        <li><a href="#">List</a></li>
                        <li><a href="#">Add new</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
