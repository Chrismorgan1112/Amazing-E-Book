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
                <a class="navbar-brand text-danger font-weight-bold" href="/{{$localization}}"><u>{{ __('msg.Home') }}</u></a>
                <a class="navbar-brand text-danger font-weight-bold" href="/cart/{{Auth::user()->id}}/{{$localization}}">{{ __('msg.Cart') }}</a>
                <a class="navbar-brand text-danger font-weight-bold" href="/profilePage/{{$localization}}">{{ __('msg.Profile') }}</a>
                <a class="navbar-brand text-danger font-weight-bold" href="/maintainPage/{{$localization}}">{{ __('msg.Account_Maintenance') }}</a>
            </ul>
        </nav>
    @else
    <nav class="navbar bg-warning justify-content-center align-items-center">
        <ul class="list-inline mb-0">
            <a class="navbar-brand text-danger font-weight-bold" href="/{{$localization}}"><u>{{ __('msg.Home') }}</u></a>
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
                        <th scope="col">{{ __('msg.Author') }}</th>
                        <th scope="col">{{ __('msg.Title') }}</th>
                      </tr>
                </thead>
                @if (count($books) != 0)
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $book->author }}
                            </td>
                            <td>
                                <a href="/bookDetail/{{$book->ebook_id}}/{{$localization}}" class="text-decoration-none">{{ $book->title }}</a>
                            </td>
                        </tr>
                        <?php
                            $number += 1;
                        ?>
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