@extends('layout')

@section('content')
		<div class="question">
			<h1 class="wow fadeInDown" data-wow-delay="1s">Do you read and love books?</h1>

			<div class="wow fadeInUp answers" data-wow-delay="1s">
				<a href="#" class="button">Yes</a>
				<a href="#" class="button">No</a>
			</div>
		</div>

	<section>
		<div class="container js-masonry wow slideInUp" data-wow-delay="1s">
			<article>
				<img src="http://www.kevinandamanda.com/whatsnew/wp-content/uploads/2012/10/new-house-1.jpg">
				<div class="overlay">
					<h3>Streetname</h3>
					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> Streetname &plus; number</li>
						<li><i class="fa fa-tags"></i> Pizza , Clubs</li>
						<li><i class="fa fa-star"></i> 3/5</li>
					</ul>
				</div>
			</article>

			<article>
				<img src="http://www.kevinandamanda.com/whatsnew/wp-content/uploads/2012/10/new-house-1.jpg">
				<div class="overlay">
					<h3>Streetname</h3>
					<ul class="tileinfo">
						<li><i class="fa fa-home"></i> Streetname &plus; number</li>
						<li><i class="fa fa-tags"></i> Pizza , Clubs</li>
						<li><i class="fa fa-star"></i> 3/5</li>
					</ul>
				</div>
			</article>

			<article>
				<img src="http://www.kevinandamanda.com/whatsnew/wp-content/uploads/2012/10/new-house-1.jpg">
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