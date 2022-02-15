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
                <a class="navbar-brand text-danger font-weight-bold" href="/profilePage/{{$localization}}"><u>{{ __('msg.Profile') }}</u></a>
                <a class="navbar-brand text-danger font-weight-bold" href="/maintainPage/{{$localization}}">{{ __('msg.Account_Maintenance') }}</a>
            </ul>
        </nav>
    @else
    <nav class="navbar bg-warning justify-content-center align-items-center">
        <ul class="list-inline mb-0">
            <a class="navbar-brand text-danger font-weight-bold" href="/{{$localization}}">{{ __('msg.Home') }}</a>
            <a class="navbar-brand text-danger font-weight-bold" href="/cart/{{Auth::user()->id}}/{{$localization}}">{{ __('msg.Cart') }}</a>
            <a class="navbar-brand text-danger font-weight-bold" href="/profilePage/{{$localization}}"><u>{{ __('msg.Profile') }}</u></a>
        </ul>
    </nav>
    @endif

    <div class="container-fluid mt-5" style="margin-bottom: 100px;">
        @auth
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form class="d-flex flex-column align-items-center"
            action="/updateProfile/{{ Auth::user()->id }}/{{ $localization }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-around w-75">
                    <div class="">
                        <img class="justify-content-center align-items-center" width="200px" height="200px"
                            src={{ Storage::url(Auth::user()->display_picture_link) }}>
                    </div>
                    <div style="width: 35%;">
                        <div>
                            <label for="first_name" class="form-label">{{ __('msg.First_name') }}</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value={{ Auth::user()->first_name }}>
                        </div>
                        <div class="my-3">
                            <label for="last_name" class="form-label">{{ __('msg.Last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value={{ Auth::user()->last_name }}>
                        </div>
                        @if (Auth::user()->gender_id == 1)
                            <label for="gender">{{ __('msg.Gender') }}</label>
                            <div class="d-flex flex-row">
                                <div class="radio mr-3">
                                    <label><input name="gender" type="radio" value=1 checked>{{ __('msg.Male') }}</label>
                                </div>
                                <div class="radio">
                                    <label><input name="gender" type="radio" value=2>{{ __('msg.Female') }}</label>
                                </div>
                            </div>
                        @else
                            <label for="gender">{{ __('msg.Gender') }}</label>
                            <div class="d-flex flex-row">
                                <div class="radio mr-3">
                                    <label><input name="gender" type="radio" value=1>{{ __('msg.Male') }}</label>
                                </div>
                                <div class="radio">
                                    <label><input name="gender" type="radio" value=2 checked>{{ __('msg.Female') }}</label>
                                </div>
                            </div>
                        @endif
                        <div class="my-3">
                            <label for="password" class="form-label">{{ __('msg.Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div style="width: 35%;">
                        <div>
                            <label for="middle_name" class="form-label">{{ __('msg.Middle_name') }}</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value={{ Auth::user()->middle_name }}>
                        </div>
                        <div class="my-3">
                            <label for="email" class="form-label">{{ __('msg.Email_address') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value={{ Auth::user()->email }}>
                        </div>
                        <label for="title">{{ __('msg.Role') }}:</label>
                        <select name="role" class="form-control mb-3" disabled>
                            @if (Auth::user()->role_id == 1)
                                <option value=1>{{ __('msg.Admin') }}</option>
                            @else
                                <option value=2>{{ __('msg.User') }}</option>
                            @endif
                        </select>
                        <label for="profile_picture">{{ __('msg.Display_Picture') }}</label>
                        <div class="form-group border d-flex border-dark mb-3">
                            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" style="border:none">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning text-danger w-25 mt-4">{{ __('msg.Save') }}</button>
            </form>
        @endauth
    </div>

@endsection