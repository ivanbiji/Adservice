@extends('layouts.adminnav')

@section('content')
@foreach($users as $user)
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

                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>

                            <td> {{ $user->email }}</td>
                        </tr>
                        @if( Auth::user()->mobno!=NULL)
                        <tr>
                            <td>Contact </td>

                            <td>{{ $user->mobno }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>User Id</td>

                            <td> {{ $user->id }}</td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn bg-success" onclick="window.location.href='{{ route('admin') }}/view/{{ $user->id }} '">View
                    {{$user->name}}'s ads</button>
                <br><br>


                <button class="btn bg-danger" type="button" onclick="event.preventDefault(); document.getElementById('logout-form-adshow').submit();"
                    class="btn btn-block btn-danger">Delete User</button>


            
                <form id="logout-form-adshow" action="/user/delete" method="POST" style="display: none;">
                    @csrf
                    <input style="display:none;" name="id" value="{{ $user->id }}">
                </form>

            </div>

        </div>
    </div>
</div>
<script>
    (function ($) {
        var $window = $(window),
            $html = $('#usershow');
        $html2 = $('#usershow2');

        function resize() {
            if ($window.width() < 600) {
                $html2.removeClass('container');
                $html.removeClass('c-padding');
                return $html.removeClass('container');
            }

            $html.addClass('container');
            $html.addClass('c-padding');
            $html2.addClass('container');
        }

        $window
            .resize(resize)
            .trigger('resize');
    })(jQuery);

</script>
@endforeach
@endsection
