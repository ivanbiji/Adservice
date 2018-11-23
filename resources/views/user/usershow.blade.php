@extends('layouts.usernav')

@section('content')

<div class="container c-padding" id="usershow">
    <div class="card animated fadeIn ">
        <div class="card-body">

            <h2>Contact Information</h2>
            <hr>
            <div id="usershow2" class="container">
                <table class="table table-light table-hover table1">
                    <tbody>
                        <tr>
                            <td>Name </td>

                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>

                            <td> {{ Auth::user()->email }}</td>
                        </tr>
                        @if( Auth::user()->mobno!=NULL)
                        <tr>
                            <td>Contact </td>

                            <td><a href="tel:{{ Auth::user()->mobno }}">{{ Auth::user()->mobno }}</a></td>
                        </tr>
                        @endif
                        <tr>
                            <td>User Id</td>

                            <td> {{ Auth::user()->id }}</td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn bg-success" onclick="window.location.href='{{ route('home') }}/user/{{ Auth::user()->id }} '">View
                    your ads</button>

            </div>

        </div>
    </div>
</div>
<br>
<div class="container c-padding" id="usershow3">
    <div class="card animated fadeIn ">
        <div class="card-body">

            <h3>Your Wish List</h3>
            <hr>
            <div id="usershow4" class="container">
                <table class="table table-light table1">
                    <tbody>
                        @foreach($ads as $ad)
                        <tr>
                            <td>{{$ad->title}} </td>

                            <td>{{ $ad->price }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <button class="cctt btn bg-success" onclick="window.location.href='{{ route('ad') }}/view/{{ $ad->id }} '">View</button>
                            <button class="cctt btn bg-danger" onclick="event.preventDefault();  document.getElementById('deleter{{ $ad->id }}').submit();">Delete</button>
                            

                            <form id="deleter{{ $ad->id }}" action="{{ route('wish') }}/delete" method="POST" style="display: none;">
                                @csrf
                            <input name="userid" style="display:none" value="{{ Auth::user()->id }}">
                            <input name="adid" style="display:none" value="{{ $ad->id }}">
                            </form>
                        </td>
                        </tr>
                        @endforeach
                        @if(count($ads) == 0)
                        <tr>
                            <td> You dont have anything on your wishlist</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    (function ($) {
        var $window = $(window),
            $html = $('#usershow');
        $html2 = $('#usershow2');
        $html3 = $('#usershow3');
        $html4 = $('#usershow4');

        function resize() {
            if ($window.width() < 600) {

                $html3.removeClass('container');
                $html3.removeClass('c-padding');
                $html4.removeClass('container');
                $html2.removeClass('container');
                $html.removeClass('c-padding');
                return $html.removeClass('container');
            }

            $html.addClass('container');
            $html.addClass('c-padding');
            $html2.addClass('container');
            $html3.addClass('container');
            $html3.addClass('c-padding');
            $html4.addClass('container');
        }

        $window
            .resize(resize)
            .trigger('resize');
    })(jQuery);

</script>

@endsection
