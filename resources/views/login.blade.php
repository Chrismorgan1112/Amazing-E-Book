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

    <div class="container d-flex flex-column align-items-center justify-content-center mt-5 w-50">
        
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <h1 class="mb-4">
            {{ __('msg.Log_In') }}
        </h1>

        <form action="{{ route('login', $localization) }}" method="post" class="w-50">
            @csrf
            <div>
                <label for="email" class="form-label">{{ __('msg.Email_address') }}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
            </div>
            <div class="my-3">
                <label for="password" class="form-label">{{ __('msg.Password') }}</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
            </div>
            <div class="d-flex flex-column align-items-center mt-4">
                <button type="submit" class="btn btn-danger w-50 font-weight-bold text-white">{{ __('msg.Submit') }}</button>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('registerPage', $localization) }}">{{ __('msg.Dont_have_an_account?') }}</a>
        </div>
    </div>
    
@endsection