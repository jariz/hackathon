@extends('layout')

@section('content')
		<div class="question">
			<h1 class="wow fadeInDown" data-wow-delay="1s">Do you read and love books?</h1>

			<div class="wow fadeInUp answers" data-wow-delay="1s">
				<a href="#" class="button green yes">Yes</a>
				<a href="#" class="button no">No</a>
			</div>

			<h3 class="wow fadeInUp" data-wow-delay="1s">3/2500 suitable houses found</h3>
		</div>

	<section>
		<div class="container">
			<!--<article class="wow fadeInUp">
				<img data-original="http://www.kevinandamanda.com/whatsnew/wp-content/uploads/2012/10/new-house-1.jpg" class="lazy">
				<div class="overlay">
					<h3>Streetname</h3>
					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> Streetname &plus; number</li>
						<li><i class="fa fa-tags"></i> Pizza , Clubs</li>
						<li><i class="fa fa-star"></i> 3/5</li>
					</ul>
				</div>
			</article>

			<article class="wow fadeInUp">
				<img data-original="http://www.kevinandamanda.com/whatsnew/wp-content/uploads/2012/10/new-house-1.jpg" class="lazy">
				<div class="overlay">
					<h3>Streetname</h3>
					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> Streetname &plus; number</li>
						<li><i class="fa fa-tags"></i> Pizza , Clubs</li>
						<li><i class="fa fa-star"></i> 3/5</li>
					</ul>
				</div>
			</article> -->
            @foreach( $houses as $house)
			<article class="item{{$meta[$house->id]['class']}}">
				<img data-original="{{$house->photo}}" class="lazy">
				<div class="overlay">

					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> {{$house->adres}}</li>
                        @if(!empty($meta[$house->id]["tags"]))
						<li><i class="fa fa-tags"></i> {{$meta[$house->id]["tags"]}}</li>
                        @endif
						<li><i class="fa fa-dollar"></i> {{number_format($house->price)}}</li>
					</ul>
				</div>
			</article>

		@endforeach
        {{$houses->links()}}


		</div>
	</section>
@stop

@section('css')
    <link rel="stylesheet" href="{{URL::asset('js/plugins/infinite-scroll/css/jquery.ias.css')}}" type="text/css" />
@stop

@section('js')
    <script src="{{URL::asset('js/plugins/infinite-scroll/jquery-ias.js')}}"></script>
    <script>
        var questions = {{json_encode($questions)}};
    </script>
    <script src="{{URL::asset('js/questions.js')}}"></script>
@stop