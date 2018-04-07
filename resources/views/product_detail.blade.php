@extends('layouts.app')

@section('content')
	<div class="container-fluid main-wrapper">
		<div class="row">
			@foreach($details as $detail)
			<div class="col-md-7 mt-15">
                <div class="width-100 pull-left">  	
                	<img  class="img-responsive" alt="carousel image" src="{{$detail->picture}}">
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

						<button class="btn btn-default mt-30" type="submit">Buy now</button>
						</fieldset>
					
				</div>
                <div class="product-description-row">
                        <h5>Information</h5>

                        <ul class="product-detail-list">
                            
                            <li>
                                <span class="product-detail-list-label small">In stock</span>
                                <span class="product-detail-value pull-right small">1400 items</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Fat</span>
                                <span class="product-detail-value pull-right small" id="product_fat">0</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Sugar</span>
                                <span class="product-detail-value pull-right small" id="product_sugar">0</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Calories</span>
                                <span class="product-detail-value pull-right small" id="product_calories">0</span>
                            </li>

                            <li>
                                <span class="product-detail-list-label small">Caffeine</span>
                                <span class="product-detail-value pull-right small" id="product_caffeine">0</span>
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
		}
	</script>
@endsection