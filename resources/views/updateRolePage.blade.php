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
        <form class="d-flex flex-column align-items-center" enctype="multipart/form-data"
            action="/updateAccount/{{ $account->id }}/{{ $localization }}" method="post">
            @csrf
            <div>
                <h3 class="font-weight-bold"><u>{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }}</u></h3>
            </div>

            @if ($account->role_id == 1)
                <div class="form-group d-flex flex-column align-items-center mt-5 w-25">
                    <label for="role_id"><h5>{{ __('msg.Role') }}</h5></label>
                    <select name="role_id" class="form-control">
                        <option value="1" selected>{{ __('msg.Admin') }}</option>
                        <option value="2">{{ __('msg.User') }}</option>
                    </select>
                </div>
            @else
                <div class="form-group d-flex flex-column align-items-center mt-5 w-25">
                    <label for="role_id"><h5>{{ __('msg.Role') }}</h5></label>
                    <select name="role_id" class="form-control">
                        <option value="1">{{ __('msg.Admin') }}</option>
                        <option value="2" selected>{{ __('msg.User') }}</option>
                    </select>
                </div>
            @endif

            <button type="submit" class="btn btn-warning text-danger font-weight-bold mt-3" style="width: 15%;">{{ __('msg.Update') }}</button>
        </form>
    </div>
@endsection