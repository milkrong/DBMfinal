@extends('layouts.app')

@section('content')

	<div class="container-fluid main-wrapper">
		<div class="row">
			<!-- HOME SLIDER -->
			<div class="home col-md-12 no-padding">
				<div class="home-slider home-slider-full-page">
					<div class="swiper-wrapper">
						<div class="swiper-slide home-slider-centered" style="background-image:url(assets/img/slider/slide-02.png)">
						</div>

						<div class="swiper-slide home-slider-centered" style="background-image:url(assets/img/slider/slide-02.png)">
						</div>

					</div>
					<!-- Add Pagination -->
					<div class="home-slider-pagination"></div>
					<span class="ti-angle-left home-slider-prev"></span>
					<span class="ti-angle-right home-slider-next"></span>
				</div>
			</div>
			<!-- / HOME SLIDER -->
		</div>
	</div>
@endsection
