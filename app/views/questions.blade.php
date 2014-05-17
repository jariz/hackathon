@extends('layout')

@section('content')
		<div class="question">
			<h1 class="wow fadeInDown" data-wow-delay="1s">Do you read and love books?</h1>

			<div class="wow fadeInUp answers" data-wow-delay="1s">
				<a href="#" class="button">Yes</a>
				<a href="#" class="button">No</a>
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
			<article class="item">
				<img data-original="{{$house->photo}}" class="lazy">
				<div class="overlay">

					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> {{$house->adres}}</li>
						<li><i class="fa fa-tags"></i> Pizza , Clubs</li>
						<li><i class="fa fa-star"></i> 3/5</li>
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
    <script type="text/javascript">
        $(function(){
        	$.ias({
        	    container : '.container',
        	    item: '.item',
        	    pagination: '.pagination',
        	    next: '.pagination li:last-child a',
        	    loader: '<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Meer nieuws aan het laden</div>',
        	    trigger: 'Meer huizen laden',
        	    triggerPageThreshold: 20,
        	    onLoadItems: function(){
                    $("img.lazy").lazyload();
        	    }
        	});

        });
    </script>
@stop