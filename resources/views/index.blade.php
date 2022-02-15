@extends('main')
@section('content')

    @php
        $localization = App::getlocale();
    @endphp

    <nav class="navbar navbar-light bg-danger">
        <div class="container-fluid">
            <a href="{{ route('home', $localization) }}" class="navbar-brand"><h1 class="text-white font-weight-bold">Amazing E-book</h1></a>
            <div>
                <a href="{{ route('registerPage', $localization) }}"><button type="button"
                    class="btn btn-warning mr-3 font-weight-bold text-danger">{{ __('msg.Sign_Up') }}</button></a>
                <a href="{{ route('loginPage', $localization) }}"><button type="button"
                    class="btn btn-warning font-weight-bold text-danger">{{ __('msg.Log_In') }}</button></a>
            </div>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center" style="margin-top: 60px;">
        <div class="rounded-circle border-warning d-flex align-items-center justify-content-center" style="height: 500px; width: 500px; border:7px solid">
            <h2 class="flex-column text-center">{{ __('msg.Find_and_Rent_Your_E_book_Here!') }}</h2>
        </div>
    </div>
@endsection