@extends('main')
@section('content')
    @php
        $localization = App::getlocale();
    @endphp

    <nav class="navbar navbar-light bg-danger" style="height: 100px;">
        <div class="container-fluid">
            <a href="{{ route('home', $localization) }}" class="navbar-brand"><h1 class="text-white font-weight-bold">Amazing E-book</h1></a>
            <a href="/logout/{{ $localization }}"><button type="button"
                class="btn btn-warning mr-3 font-weight-bold text-danger">{{ __('msg.logout') }}</button></a>
        </div>
    </nav>
    @if (Auth::user()->role_id == '1')
        <nav class="navbar bg-warning justify-content-center align-items-center">
            <ul class="list-inline mb-0">
                <a class="navbar-brand text-danger font-weight-bold" href="/{{$localization}}">{{ __('msg.Home') }}</a>
                <a class="navbar-brand text-danger font-weight-bold" href="/cart/{{Auth::user()->id}}/{{$localization}}">{{ __('msg.Cart') }}</a>
                <a class="navbar-brand text-danger font-weight-bold" href="/profilePage/{{$localization}}">{{ __('msg.Profile') }}</a>
                <a class="navbar-brand text-danger font-weight-bold" href="/maintainPage/{{$localization}}">{{ __('msg.Account_Maintenance') }}</a>
            </ul>
        </nav>
    @else
    <nav class="navbar bg-warning justify-content-center align-items-center">
        <ul class="list-inline mb-0">
            <a class="navbar-brand text-danger font-weight-bold" href="/{{$localization}}">{{ __('msg.Home') }}</a>
            <a class="navbar-brand text-danger font-weight-bold" href="/cart/{{Auth::user()->id}}/{{$localization}}">{{ __('msg.Cart') }}</a>
            <a class="navbar-brand text-danger font-weight-bold" href="/profilePage/{{$localization}}">{{ __('msg.Profile') }}</a>
        </ul>
    </nav>
    @endif

    <div class="container mt-5">
            <h3 class="font-weight-bold mb-3"><u>E-Book Detail</u></h3>
            <div class="d-flex flex-row">
                <div class="d-flex flex-column align-items-start w-50">
                    <p>Title:</p>
                    <p>Author:</p>
                    <p>Description:</p>
                </div>
                <div class="d-flex flex-column align-items-start">
                    <p>{{ $book->title }}</p>
                    <p>{{ $book->author }}</p>
                    <p>{{ $book->description }}</p>
                </div>
            </div>
    </div>
    <div class="d-flex flex-row justify-content-end mr-5 mt-4">
        <a href="/rent/{{ Auth::user()->id }}/{{ $book->ebook_id }}/{{ $localization }}"
            class="btn btn-warning font-weight-bold text-white">{{ __('msg.Rent') }}</a>
    </div>

@endsection