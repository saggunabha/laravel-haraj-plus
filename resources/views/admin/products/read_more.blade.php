<!--start div-->
@if($products->isEmpty())
    <div class="more-link-grid text-center col-12">
        <span class="more-link color-bg full-width-btn"> لا توجد منتجات </span>
    </div>
@else

    @foreach($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-6 products-grid  ">
            <div class="product-div">
                <div class="product-img">
                    <a href="{{asset("storage/".$product->main_image)}}" class="html5lightbox" data-group="set-0">
                        <img src="{{asset("storage/".$product->main_image)}}" alt="product" />
                    </a>
                </div>

                <div class="product-details">
                    <form class="needs-validation" novalidate>
                        <div class="row no-marg-row">
                            <div class="col-12">
                                <div class="pro-main-details">
                                    <div class="pro-det form-control">  الاسم:{{$product->name}}   </div>
                                    <i class="fa fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pro-main-details">
                                    <div class="pro-det form-control">السعر : {{$product->price}}ريال</div>
                                    <i class="fa fa-money-bill-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pro-main-details">
                                    <div class="pro-det form-control">
                                @if($product->is_valid==1)
                                @elseif($product->is_valid==3) بانتظار التفعيل 
                                @else تم تجميده
                                @endif
                                </div>
                                    <i class="fa fa-money-bill-alt"></i>
                                </div>
                            </div>

                            {{--      <div class="col-md-12">

                                      <div class="pro-main-details">
                                          <div class="pro-det form-control">الكمية : 5 </div>
                                          <i class="fa fa-highlighter"></i>
                                      </div>
                                  </div>--}}

                            <div class="col-md-12">
                                <div class="pro-main-details">
                                    <div class="pro-det form-control"> القسم : {{isset($product->category)?$product->category->name:""}}  </div>
                                    <i class="fa fa-file-archive"></i>
                                </div>
                            </div>



            <div class="col-12">
                <div class="more-div left-text-dir">
                                    <span class="more-text">المزيد <i
                                            class="fa fa-chevron-left"></i></span>
                    <div class="more-list">
                        <ul class="list-unstyled">

                            @if($product->user_id!=auth()->id())
                            <li><a href="{{route('chatUserPro',$product->id)}}" ><i
                                        class="fa fa-envelope"></i> مراسله صاحب المنتج</a></li>
                            @endif
                            @if($product->is_valid==3)
                            <li><a href="{{route("products.activate",$product->id)}}"><i
                                        class="fa fa-edit"></i>تفعيل المنتج</a></li>
                            @endif
                            <li><a href="{{route("products.edit",$product->id)}}"><i
                                        class="fa fa-edit"></i>تعديل المنتج</a></li>
                                        @if($product->is_valid ==3)
                            <li class="show_invalid_pro"><a href="#"><i
                                        class="fa fa-eye"></i>عرض المنتج</a></li>
                                        @else 
                                        <li><a href="{{route("product-details",$product->id.'-'.$product->name)}}"><i
                                            class="fa fa-eye"></i>عرض المنتج</a></li>
                                        @endif
                            <li><a href="{{route("deleteProduct",$product->id)}}"><i
                                        class="fa fa-trash"></i>حذف المنتج</a></li>


                        </ul>
                    </div>
                </div>
            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--end div-->

    @endforeach



@endif
