@extends('main')
@section('content')

    @php
        $localization = App::getlocale();
    @endphp

    <nav class="navbar navbar-light bg-danger">
        <div class="container-fluid">
            <a href="{{ route('home', $localization) }}" class="navbar-brand"><h1 class="text-white font-weight-bold">Amazing E-book</h1></a>
        </div>
    </nav>

    <div class="container-fluid d-flex flex-column align-items-center justify-content-center mt-5 mb-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mb-4">
            {{ __('msg.Sign_Up') }}
        </h1>

        <form class="d-flex flex-column align-items-center w-75" action="{{ route('register', $localization) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-row justify-content-around w-75">
                <div style="width: 40%;">
                    <div>
                        <label for="first_name" class="form-label">{{ __('msg.First_name') }}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="nameHelp">
                    </div>
                    <div class="my-3">
                        <label for="last_name" class="form-label">{{ __('msg.Last_name') }}</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="nameHelp">
                    </div>
                    <label for="gender">{{ __('msg.Gender') }}</label>
                    <div class="d-flex flex-row">
                        <div class="radio mr-3">
                            <label><input name="gender" type="radio" value=1 checked>{{ __('msg.Male') }}</label>
                        </div>
                        <div class="radio ">
                            <label><input name="gender" type="radio" value=2>{{ __('msg.Female') }}</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">{{ __('msg.Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                
                <div style="width: 40%;">
                    <div>
                        <label for="middle_name" class="form-label">{{ __('msg.Middle_name') }}</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" aria-describedby="nameHelp">
                    </div>
                    <div class="my-3">
                        <label for="email" class="form-label">{{ __('msg.Email_address') }}</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <label for="role">{{ __('msg.Role') }}:</label>
                    <select name="role" class="form-control">
                        <option value=1>{{ __('msg.Admin') }}</option>
                        <option value=2>{{ __('msg.User') }}</option>
                    </select>
                    <div class="mt-3">
                        <label for="profile_picture">{{ __('msg.Display_Picture') }}</label>
                        <div class="form-group border border-dark d-flex mb-3 ">
                            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" style="border:none">
                        </div>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-danger font-weight-bold w-25 mt-4" value="register">{{ __('msg.Register') }}</button>
        </form>
        <div class="text-center">
            <a href="{{ route('loginPage', $localization) }}">{{ __('msg.Already_have_an_account?') }}</a>
        </div>
    </div>
    
@endsection