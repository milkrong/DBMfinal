@extends('layouts.app');

@section('content');
	<div class="container-fluid main-wrapper">
		<div class="row">
			<div class="col-md-12 mt-30 mb-30 width-100 pull-left width-100">
				<h3 class="pull-left">{{$category}} <span class="text-muted small">showing: 9 products</span>
				</h3>		

		        <div class="dropdown pull-right mt-15 pr-15 smartphone-inline-fw">
		            <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="dropdownMenu1" type="button" class="btn btn-default btn-sm dropdown-toggle">
		            sort by name A-Z
		            <span class="ti-angle-down"></span>
		            </button>
		            <ul aria-labelledby="dropdownMenu1" class="dropdown-menu">
		                <li><a href="#">name A-Z</a></li>
		                <li><a href="#">name Z-A</a></li>
		                <li><a href="#">price <span class="ti-arrow-up"></span></a></li>
		                <li><a href="#">price <span class="ti-arrow-down"></span></a></li>
		                <li><a href="#">date <span class="ti-arrow-up"></span></a></li>
		                <li><a href="#">date <span class="ti-arrow-down"></span></a></li>
		                <li class="divider" role="separator"></li>
		                <li><a href="#">show only specials</a></li>
		            </ul>
		        </div>	    
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
									</div>

									<div class="col-xs-6 text-right">
										<span class="h5 product-item-price">${{ $product->product_detail[0]->price }}</span>
									</div>
									<a href="{{ url('/cart/add',[$product->id ,'1','large']) }}" class="btn btn-pimary">add to cart</a>
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

