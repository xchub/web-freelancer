<div class="col-md-2 sidebar">
    <div class="panel panel-default">
    <div class="panel-heading">Menu</div>
        <div class="panel-body">
            <ul class="nav nav-sidebar">
                <li>Clients</li>
                <li><a href="{{ url('/client') }}">List</a></li>
                <li><a href="{{ url('/client/create') }}">Create</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>Invoices</li>
                <li><a href="{{ url('/invoice') }}">List</a></li>
                <li><a href="{{ url('/invoice/create') }}">Create</a></li>
            </ul>
        </div>
    </div>
</div>