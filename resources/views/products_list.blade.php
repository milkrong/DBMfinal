@extends('layouts.app');

@section('content');
	<div class="container-fluid main-wrapper">
		<div class="row">
			<div class="col-md-12 mt-30 mb-30 width-100 pull-left width-100">
				<h3 class="pull-left">{{$category}} <span class="text-muted small">showing: 9 products</span>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="clearfix visible-xs visible-sm"></div>
			<div class="col-md-10">
				<!-- PRODUCTS ROW -->
				<div class="container-fluid">
					<div class="row flex-list">
						@foreach($products as $product)
						<div class="col-md-4 col-sm-6">
							<div class="product-item">
								<div class="product-item-thumbnail text-center mb-15">
									<a class="product-item-thumbnail-link" href=" {{ url('/product_detail',$product->id) }}"></a>
									<img src="{{$product->picture}}" class="img-responsive" alt="product image">
								</div>
								<div class="row">
									<div class="col-xs-6">
										<a class="h5" href="{{ url('/product_detail',$product->id) }}">{{$product->name}}</a>
										<a href="{{ url('/cart/add',[$product->id ,'1','large']) }}" class="btn btn-default">add to cart</a>
									</div>
									<div class="col-xs-6 text-right">
										<span class="h5 product-item-price">${{ $product->product_detail[0]->price }}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
				<!-- / PRODUCTS ROW -->

				<!-- PAGINATION -->
                <div class="width-100">
                    <div class="widget-pagination pull-left pl-15">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
				<!-- / PAGINATION -->
			</div>
			
		</div>
	</div>
	@endsection

