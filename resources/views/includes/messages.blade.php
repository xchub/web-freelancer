    @if (session('success'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15">Win!</h3>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('info'))
    <div class="alert alert-info alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15">FYI</h3>
        <p>{{ session('info') }}</p>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15">Look out!</h3>
        <p>{{ session('warning') }}</p>
    </div>
    @endif

    @if (session('fail'))
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15">Fumble :(</h3>
        <p>{{ session('fail') }}</p>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <h3 class="font-w300 push-15">Fumble :(</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
