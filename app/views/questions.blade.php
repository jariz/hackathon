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
		<div class="container js-masonry wow slideInUp" data-wow-delay="1s">
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
			</article>



		</div>
	</section>
@stop