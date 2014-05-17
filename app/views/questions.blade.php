@extends('layout')

@section('content')
		<div class="question">
			<h1 class="wow fadeInDown" data-wow-delay="1s">Do you read and love books?</h1>

			<div class="wow fadeInUp answers" data-wow-delay="1s">
				<a href="#" class="button green yes">Yes</a>
				<a href="#" class="button no">No</a>
			</div>

			<h3 class="wow fadeInUp" data-wow-delay="1s"><span id="current">{{$total}}</span>/<span id="total">{{$total}}</span> suitable houses found</h3>
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
			<article data-modal="modal-16" class="md-trigger item{{$meta[$house->id]['class']}}">
				<img data-original="{{$house->photo}}" class="lazy origin-image">
				<div class="overlay">
                    <p class="hide origin-postal_code">{{$house->postal_code}}</p>
                    <p class="hide original-price">&euro; {{$house->money_format}}</p>
                    <p class="hide origin-url">{{$house->url}}</p>
					<ul class="tileinfo">
						<li class="origin-adres"><i class="fa fa-home"></i> {{$house->adres}}</li>
                        @if(!empty($meta[$house->id]["tags"]))
						<li class="origin-tags"><i class="fa fa-tags"></i> {{$meta[$house->id]["tags"]}}</li>
                        @endif
						<li class="origin-price"><i class="fa fa-dollar"></i> {{number_format($house->price)}}</li>
					</ul>
				</div>
			</article>

		@endforeach
        {{$houses->links()}}


		</div>
	</section>
	 <div class="md-modal md-effect-16" id="modal-16">
    			<div class="md-content">
    				<h3 class="adres">Wordt replaced met adres</h3>
    				<div>
    				    <img class="house-image" src="#" />
    					<p class="postal_code">Wordt replaced met postcode</p>
    					<p><i class="fa fa-dollar"></i> <span class="price">Wordt replaced met prijs</span></p>
    					<p><i class="fa fa-tags"></i> <span class="tags"></span></p>
    					<p>
    					<!--<ul>
    						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
    						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
    						<li><strong>Close:</strong> click on the button below to close the modal.</li>
    					</ul>-->
    					<a href="#" class="button green url md-close">Meer info <i class="fa fa-arrow-right"></i></a>
    				</div>
    			</div>
    		</div>

    		<div class="md-overlay"></div>
@stop

@section('css')
    <link rel="stylesheet" href="{{URL::asset('js/plugins/infinite-scroll/css/jquery.ias.css')}}" type="text/css" />
@stop

@section('js')
    <script src="{{URL::asset('js/plugins/infinite-scroll/jquery-ias.js')}}"></script>
    <script>
        var questions = {{json_encode($questions)}};
        $(function(){
            $(document).on('click', '.md-trigger', function(){
                var modal =  $('.md-content');

                var adres = $(this).find('.origin-adres').text();
                modal.find('.adres').text(adres);

                var image = $(this).find('.origin-image').attr('src');
                modal.find('.house-image').attr('src', image);

                var postal_code = $(this).find('.origin-postal_code').text();
                modal.find('.postal_code').text(postal_code);

                var price = $(this).find('.original-price').text();
                modal.find('.price').text(price);

                var url = $(this).find('.origin-url').text();
                modal.find('.url').attr('href', url);

                var tags = $(this).find('.origin-tags').text();
                modal.find('.tags').text(tags);
            });
        });
    </script>
    <script src="{{URL::asset('js/questions.js')}}"></script>
@stop