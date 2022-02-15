@extends('main')
@section('content')

    @php
        $localization = App::getlocale();
    @endphp

    <nav class="navbar navbar-light bg-danger">
        <div class="container-fluid">
            <a href="{{ route('home', $localization) }}" class="navbar-brand"><h1 class="text-white font-weight-bold">Amazing E-book</h1></a>
            <a href="/logout/{{ $localization }}"><button type="button"
                class="btn btn-warning mr-3 font-weight-bold text-danger">{{ __('msg.logout') }}</button></a>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center" style="margin-top: 60px;">
        <div class="rounded-circle border-warning d-flex flex-column align-items-center justify-content-center" style="height: 500px; width: 500px; border:7px solid">
            <h2 class="text-center">{{ __('msg.Saved') }}!</h2>
            <a href="/{{ $localization }}">{{ __('msg.Click_here_to_go_to_HomePage') }}</a>
        </div>
    </div>
@endsection