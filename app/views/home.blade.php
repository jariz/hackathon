@extends('layout')

@section('content')
<header>
	<div class="container">
		<img src="images/logo.png" class="wow fadeInDown logo" data-wow-delay="1s">
		<h2 class="wow fadeInUp" data-wow-delay="1s">Find yourself a house that fits your interests!</h2>
		<em class="wow fadeInUp" data-wow-delay="1s">Based on a couple simple questions</em>
		<a href="{{URL::route('questions')}}" class="wow fadeInUp button" data-wow-delay="1s">Let's start!</a>
	</div>
</header>
@stop