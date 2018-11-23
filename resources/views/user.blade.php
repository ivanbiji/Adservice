@extends('layouts.adminnav')

@section('content')
<div class="container">
    <div class="row">
        @if(count($users)==0)
        <div class="container text-center animated fadeIn">
        <h1>No users found</h1>
        </div>
        @endif
        @if(count($users)>0)
        @foreach($users as $user)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12  card-custom animated fadeIn">
            <a href="{{ route('user') }}/view/{{ $user->id }}">
                <div class="card cardd">   
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}

                        </h5>
                        <p class="card-text">{{ $user->email }}

                        </p>
                        <h5 class="card-title-price">User Id : {{ $user->id }} </h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
