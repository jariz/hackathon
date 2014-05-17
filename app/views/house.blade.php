@extends('layout')

 @section('content')
    <section>
       <div class="container">

            <h1>{{$house->adres}}</h1>
            <img src="{{$house->photo}}" />
            <p>{{$house->postal_code}}</p>
            <p>&euro;{{$house->money_format}}</p>
            <a href="{{$house->url}}">Kopen!</a>
        </div>
    </section>
 @stop