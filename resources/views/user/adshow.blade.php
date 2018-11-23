@extends('layouts.usernav')

@section('content')
<div class="container">
    @foreach ($ads as $ad)
    @foreach ($seller as $seller)
    <div class="card cardy animated fadeIn">

        <div class="card-body">
            <div class="row">
                @if($ad->img != NULL)
                <div class="col-md-5" style="padding-top:6vh; padding-bottom:3vh;">
                    <img class="img-fluid mx-auto d-block" src="{{ asset('img/'.$ad->img)}}" alt="Image not Available">
                </div>
                @else
                <div class="col-md-5" style="padding-top:6vh; padding-bottom:3vh;">
                        <img class="img-fluid mx-auto d-block" src="{{ asset('img/noimage.jpg')}}" alt="Image not Available">
                    </div>
                @endif
                <div class="col-sm-7">
                    @if($ad->category == 1)
                    <h2>Books</h2>
                    @endif
                    @if($ad->category == 2)
                    <h2>Electronics</h2>
                    @endif
                    @if($ad->category == 3)
                    <h2>Vehicles</h2>
                    @endif
                    @if($ad->category == 4)
                    <h2>Others</h2>
                    @endif
                    <h6>AD NO: {{ $ad->id }}</h6>
                    <hr>

                    <h3 class="card-title">{{ $ad->title }} </h3>
                    <p class="card-text">{{ $ad->description }}</p>
                    <h4 class="card-title-price">Rs.{{ $ad->price }} </h4>


                    <hr>
                    <h2>Contact Seller</h2>
                    <hr>
                    <h5>Name&nbsp;&nbsp;&nbsp;: {{ $seller->name }}</h5>
                    <h5>Email&nbsp;&nbsp;&nbsp;&nbsp;: {{ $seller->email }}</h5>
                    @if( $seller->mobno!=NULL)
                    <h5>Contact : {{ $seller->mobno }}</h5>
                    @endif

                    @if(Auth::user()->id == $ad->userid)
                    <br>
                    <div class="container">

                        <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form-adshow').submit();"
                            class="btn btn-block btn-danger">Delete</button>
                    </div>


                    <form id="logout-form-adshow" action="/ad/delete" method="POST" style="display: none;">
                        @csrf
                        <input style="display:none;" name="id" value="{{ $ad->id }}">
                    </form>
                    @elseif(count($wishs) == 0)
                    <br>
                    <div class="container">

                        <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form-adshow2').submit();"
                            class="btn btn-block btn-success">Wishlist</button>
                    </div>


                    <form id="logout-form-adshow2" action="/wish/add" method="POST" style="display: none;">
                        @csrf
                        <input style="display:none;" name="id" value="{{ $ad->id }}">
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach



</div>
@endsection
