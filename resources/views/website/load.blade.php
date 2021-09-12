

@if($products->isNotEmpty())
@foreach($products as $product)

    <div class="item col-xl-3 col-lg-4 col-6 ">
        <!--start product-grid-->
        <div class="product-grid">
            <div class="product-div ads-prod">

                <a  href="{{route('product-details',$product->id.'-'.$product->name)}}">
                    <div class="product-img">
                        <img src="{{asset('storage/'.$product->main_image)}}" alt="logo" />
                    </div>
                    <div class="product-details">
                        <h3 class="product-name first_color">{{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
 </h3>
                        @if($product->discount_ratio != null)
                            <span class="new-price price">{{$product->price-($product->price*$product->discount_ratio)/100 }} ر.س</span>
                            <span class="old-price price">{{$product->price}} ر.س</span>
                        @else
                            <span class="new-price price">{{$product->price}} ر.س</span>
                        @endif
                        <div class="two-btns">

                            @if($product->is_valid==1)
                                <button class="custom-btn sm-btn">مفعل</button>
                            @elseif($product->is_valid==0)
                                <button class="custom-btn sm-btn">تم تجميده</button>
                                @else
                                <button class="custom-btn sm-btn">قيد الانتظار </button>
                            @endif
                            <span class="product-time second_bg first_color">{{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}}</span>
                        </div>
                    </div>
                </a>
                <div class="edit-prouct-icons">
                    <a  href="{{route('product.change',$product->id)}}" title="تعديل"><i class="fa fa-edit"></i></a>
                    @if($product->is_valid==1)
                        <a  href="{{route('products.deactivate',$product->id)}}" title="تجميد"><i class="fa fa-cube"></i></a>

                    @elseif($product->is_valid==0)
{{--                        @if($product->activation_user_id==auth()->id())--}}
                            <a  href="{{route('products.deactivate',$product->id)}}" title="تفعيل"><i class="fas fa-retweet"></i></a>
{{--                        @endif--}}
                    @endif
                    <a  title="delete" onclick="return false;" object_id="{{ $product->id }}" delete_url="/products/delete/"
                       class="edit-btn-table remove-alert-website" href="#">
                        <i class="fa fa-times"></i> </a>

                </div>

            </div>
        </div>
        <!--end product-grid-->
    </div>

    @endforeach

@else
    <h4 class='empty-div-messages text-center'>لا يوجد منتجات</h4>
@endif

