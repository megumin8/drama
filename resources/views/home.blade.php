@extends('layout.client')
@section('content')
@include('includes.components.dramaCard')
<section class="section columns">
   @if (isset($key_word))
   <div class="column">
    <h2>Search Result : {{$key_word}}</h2>
    <a href="{{route('client_home')}}">Go back</a>
   </div>
   @endif
    <div class="column col-12 flex_row">
        @foreach ($dramas as $drama )
            <div class="drama" onclick="showcard('{{json_encode($drama)}}')">
                <img src="{{$drama->cover}}" alt="" class="dramacover">
                <i class="dramaname">{{$drama->name}}</i>
            </div>
        @endforeach
    </div>



</section>

@endsection
