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
		<div class="container wow slideInUp" data-wow-delay="1s">
            @foreach( $houses as $house)
			<article data-modal="modal-16" class="md-trigger item{{$meta[$house->id]['class']}}">
				<img data-original="{{$house->photo}}" class="lazy origin-image">
				<div class="overlay">
                    <p class="hide origin-postal_code">{{$house->postal_code}}</p>
                    <p class="hide original-price">{{$house->money_format}}</p>
                    <p class="hide origin-url">{{$house->url}}</p>
					<ul class="tileinfo">
						<li class="origin-adres"><i class="fa fa-home"></i> {{$house->adres}}</li>
                        @if(!empty($meta[$house->id]["tags"]))
						<li class="origin-tags"><i class="fa fa-tags"></i> {{$meta[$house->id]["tags"]}}</li>
                        @endif
						<li class="origin-price"><i class="fa fa-euro"></i> {{number_format($house->price)}}</li>
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
                        <p><i class="fa fa-home"></i> <span class="postal_code"></span></p>
    					<p><i class="fa fa-euro"></i> <span class="price">Wordt replaced met prijs</span></p>
    					<p><i class="fa fa-tags"></i> <span class="tags"></span></p>
    					<p>
    					<!--<ul>
    						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
    						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
    						<li><strong>Close:</strong> click on the button below to close the modal.</li>
    					</ul>-->
    					<a href="#" class="button modal url md-close">Meer info <i class="fa fa-arrow-right"></i></a>
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
        

            $(document).on('click', '.item', setModalCorrect);
        });
    </script>
    <script src="{{URL::asset('js/questions.js')}}"></script>
@stop