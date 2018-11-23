@extends('layouts.usernav')

@section('content')
<div class="container">
    <div class="row">
        @if(count($ads)==0)
        <div class="container text-center animated fadeIn">
        <h1>No results found</h1>
        </div>
        @endif
        @if(count($ads)>0)
        @foreach($ads as $ad)
        <div class="col-sm-4 card-custom animated fadeIn">
            <a href="{{ route('ad') }}/view/{{ $ad->id }}">
                <div class="card cardd">
                    @if($ad->img != NULL)
                    <img class="card-img-top" src="{{ asset('img/'.$ad->img) }}"
                        alt="Image not Available">
                    @else
                    <img class="card-img-top" src="{{ asset('/img/noimage.jpg') }}"
                        alt="Image not Available">
                    @endif    
                    <div class="card-body">
                        <h5 class="card-title">{{ str_limit($ad->title,36) }}

                            @if(36>strlen($ad->title)) 
                            @for ($i =36 - strlen($ad->title) + 10;$i!= 0;$i--)
                            &nbsp;  
                            @endfor
                            @endif
                        </h5>
                        <p class="card-text">{{ str_limit($ad->description,60) }}
                            @if(60>strlen($ad->description)) 
                            @for ($i =60 - strlen($ad->description) + 2;$i!= 0;$i--)
                            &nbsp;  
                            @endfor
                            @endif
                        </p>
                        <h5 class="card-title-price">Rs.{{ $ad->price }} </h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
