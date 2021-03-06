@extends('layouts.app')

@section('content')
	<div class="container-fluid main-wrapper">
		<div class="row">
			@foreach($details as $detail)
				<div class="col-md-7">
					<div class="carousel  slide product-slide carousel-fade" id="product-carousel">
						<div class="carousel-inner no-padding width-100">
							<div class="item active"><img alt="carousel image" src="{{ $detail->picture }}" title=""></div>
							<div class="item"></div>
							<div class="item"></div>
						</div>

						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#product-carousel"> <img alt="" src="{{ $detail->picture }}" class="img-thumbnail"> </li>
						</ol>
					</div>
				</div>

			<div class="clearfix visible-xs visible-sm"></div>
			
			<div class="col-md-5">
				
				<!-- PRODUCT TITLE -->
				<h3 class="pull-left width-100 mt-60">{{$detail->name}} <br><span class="text-muted small">enjoy</span>
				</h3>
				<!-- / PRODUCT TITLE -->
				<div class="product-buy">
						<span class="h2 product-price" id="product_price">${{$detail->product_detail[0]->price}}</span>

						<fieldset class="width-100 pull-left mb-30">
						<legend>Product options</legend>
							<div class="form-group">
								<div class="width-100 pull-left">
									<div class="custom-radio radio-primary pl-0">
										<input id="radio-96" type="radio" name="delivery" onclick="changePrice('{{$detail->product_detail[2]}}')">
										<label for="radio-96">
											bottle small
										</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="width-100 pull-left">
									<div class="custom-radio radio-primary pl-0">
										<input id="radio-95" type="radio" name="delivery" onclick="changePrice('{{$detail->product_detail[1]}}')">
										<label for="radio-95">
											bottle medium
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="width-100 pull-left">
									<div class="custom-radio radio-primary pl-0">
										<input id="radio-94" type="radio" name="delivery" checked onclick="changePrice('{{$detail->product_detail[0]}}')">
										<label for="radio-94">
											bottle large
										</label>
									</div>
								</div>
							</div>

						<a class="btn btn-default mt-30" id="cart_link" href="{{ url('cart/add',$detail->id,1,$detail->product_detail[0]->size) }}">Add to Cart</a>
						</fieldset>
					
				</div>
                <div class="product-description-row">
                        <h5>Information</h5>

                        <ul class="product-detail-list">
                            
                            <li>
                                <span class="product-detail-list-label small">In stock</span>
                                <span class="product-detail-value pull-right small">1000 items</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Fat</span>
                                <span class="product-detail-value pull-right small" id="product_fat">{{ $detail->product_detail[0]->fat }}</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Sugar</span>
                                <span class="product-detail-value pull-right small" id="product_sugar">{{ $detail->product_detail[0]->sugar }}</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Calories</span>
                                <span class="product-detail-value pull-right small" id="product_calories">{{ $detail->product_detail[0]->calories }}</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Caffeine</span>
                                <span class="product-detail-value pull-right small" id="product_caffeine">{{ $detail->product_detail[0]->caffeine }}</span>
                            </li>
                        </ul>
                </div>
			</div>
			@endforeach
			
        </div>
		</div>
	</div>
	<script>
		function changePrice(x) {	
			document.getElementById('product_price').innerHTML = '$'+JSON.parse(x).price;
			document.getElementById('product_fat').innerHTML = JSON.parse(x).fat;
			document.getElementById('product_sugar').innerHTML = JSON.parse(x).sugar;
			document.getElementById('product_calories').innerHTML = JSON.parse(x).calories;
			document.getElementById('product_caffeine').innerHTML = JSON.parse(x).caffeine;
			document.getElementById('cart_link').href = "/cart/add/" + JSON.parse(x).product_id +"/1/"+JSON.parse(x).size;
		}
	</script>
@endsection