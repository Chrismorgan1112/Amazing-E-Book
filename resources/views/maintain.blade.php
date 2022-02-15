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
                <a class="navbar-brand text-danger font-weight-bold" href="/maintainPage/{{$localization}}"><u>{{ __('msg.Account_Maintenance') }}</u></a>
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
            <?php
                $number = 1;
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">{{ __('msg.Account') }}</th>
                        <th scope="col">{{ __('msg.Action') }}</th>
                      </tr>
                </thead>
                @if (count($accounts) > 1)
                <tbody>
                    @foreach ($accounts as $account)
                        @if ($account->id != Auth::user()->id)
                            <tr>
                                <td>
                                    {{ $number }}
                                </td>
                                <td>
                                    {{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }} - {{ $account->role->role_desc }}
                                </td>
                                <td>
                                    <a href="/updateRole/{{ $account->id }}/{{$localization}}" class="btn btn-outline-dark mr-3">{{ __('msg.Update_Role') }}</a>
                                    <a href="/deleteAccount/{{ $account->id }}/{{$localization}}" class="btn btn-outline-danger">{{ __('msg.Delete') }}</a>
                                </td>
                            </tr>
                            <?php
                                $number += 1;
                            ?>
                        @endif
                    @endforeach
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td>
                            No Data
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
    </div>
@endsection