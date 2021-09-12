@extends('admin.layouts.app')

@section('pageTitle','لوحة التحكم ')

@section('pageSubTitle','بيانات المنتج')



<!-- start header
     ================ -->
@section('content')


    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>المنتجات</li>

            </ul>
        </div>
        <!--end div-->


        <!--start row-->
        <div class="main-products-row row  no-marg-row col-12">
            <!-- MultiStep Form -->
            <div class="col-12">
                <div id="msform">
                    <form  method="post" action='{{route('products.update',$product->id)}}'class="needs-validation icons-form" enctype="multipart/form-data" novalidate>
                        <!-- progressbar -->
                        @method('put')
                        @csrf
                        <ul id="progressbar">
                            <li class="active">البيانات الأساسية</li>
                           {{-- <li>بيانات فرعية</li>
                            <li>خيارات المنتج</li>--}}
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <h2 class="fs-title">البيانات الأساسية</h2>
                            <h3 class="fs-subtitle">جميع الحقول إجباريه</h3>
                            <div class="row no-marg-row multi-steps-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم المنتج<span class="starrisk">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="اسم المنتج" name="name" value="{{$product->name}}" required />
                                        <div class="invalid-feedback">من فضلك أدخل اسم صحيح</div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div style="display:block;" class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم صاحب المنتج<span class="starrisk">*</span></label>
                                        <a href="{{route('users.show',$product->user_id)}}"  class=" btn form-control "
                                         name="user_id" value="">
                                            {{(isset($product->user))?$product->user->name:'المستخدم قد تم حذفه'}}
                                    </a>


                                    </div>

                                </div>
{{--
                                <div class="form-group  col-md-6">
                                    <label>الدولة <span class="starrisk">*</span></label>
                                    <select class="form-control" value="{{$product->city->country->id}}" onchange="showCities(this)"  required>
                                        <option style="display: none" selected disabled>{{$product->city->country->name}} </option>
                                        @foreach($countries as $key=>$value)
                                            <option  style="@if($value==$product->city->name) display:none;@endif" value="{{$key}}">{{$value}} </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        من فضلك إختر دولة صحيحة
                                    </div>
                                </div>--}}

                                <div class="form-group  col-md-6">
                                    <label>المدينه <span class="starrisk">*</span></label>
                                    <select class="form-control"  id="citysel" name="city_id"required>
                                        <option value="{{ $product->city->name }}" selected disabled>
                                            {{ $product->city->name }}
                                        </option>

                                         @foreach($cities as $key=>$value)
                                              <option  value="{{$key}}" {{$product->city->name==$value ? "selected": ""}}>{{$value}} </option>
                                              @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        من فضلك إختر مدينه صحيحة
                                    </div>




                                </div>


                                <div class="form-group  col-md-6">
                                    <label>القسم الرئيسي <span class="starrisk">*</span></label>
                                    <select class="form-control"  onchange="showSubCategories(this)" value="{{$product->category->category->name}}">

                                        <option value="" selected disabled>{{ $product->category->category ? $product->category->category->name : ''}}</option>
                                        @if($categories)
                                        @foreach($categories as $key=>$value)
                                            <option value="{{$key}}"  >{{$value}}</option>
                                        @endforeach
                                        @endif


                                    </select>
                                    <div class="invalid-feedback">
                                        من فضلك إختر قسم
                                    </div>
                                </div>


                                <div class="form-group  col-md-6">
                                    <label>القسم الفرعي <span class="starrisk">*</span></label>
                                    <select class="form-control"  name="category_id" id="catstyle" >

                                        <option  value="{{ $product->category ? $product->category->name : ''}}" selected disabled> {{ $product->category ? $product->category->name : ''}}</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        من فضلك إختر قسم
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>سعر المنتج<span class="starrisk">*</span></label>
                                        <input type="number" name="price" class="form-control" min="1"
                                               placeholder="سعر المنتج"  value="{{$product->price}}" name="price"required />
                                        <div class="invalid-feedback">من فضلك أدخل سعر صحيح</div>
                                        @if ($errors->has('price'))
                                            <div style="display:block;" class="invalid-feedback">{{ $errors->first('price') }}</div>
                                        @endif

                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>حالة المنتج <span class="starrisk">*</span></label>
                                        <select class="form-control"  value="" id="status" name="status"required>

                                            <option @if($product->status==1)selected @endif value="1">جديد</option>
                                            <option @if($product->status==1)selected @endif value="2">مستعمل </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            من فضلك إختر حالة المنتج
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>صلاحيه المنتج<span class="starrisk">*</span></label>
                                        <input type="text" value="{{$product->is_valid?'صالح':'غير صالح'}}" class="form-control" min="1"
                                              readonly required />
                                        <div class="invalid-feedback">من فضلك أدخل الحاله</div>
                                    </div>

                                </div>



                                <div class="col-12">
                                    <div class="form-group">
                                        <label> وصف المنتج<span class="starrisk">*</span></label>
                                        <textarea class="form-control" placeholder="نص الوصف"
                                                name="description"  required>{{$product->description}}</textarea>
                                        <div class="invalid-feedback">من فضلك أدخل نص صحيح</div>
                                        @if ($errors->has('description'))
                                            <div style="display:block;" class="invalid-feedback">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>

                                </div>


                                <div class="form-group  col-12">
                                    <div class="generate-form row no-marg-row">
                                        <div class="form-group text-right-dir  col-12">
                                                        <span class="more-link color-bg inline-block-btn"
                                                              id="generate-img-form-link">صورة
                                                            إضافية</span>
                                        </div>


                                        <div class="form-group col-md-6 secondary-img-upload">

                                            <input type="file"
                                                   class="img-form-shape file-input form-control"  name='main_image' value="{{$product->main_image}}"
                                                   >

                                            <label class="file-input-label" for="main-01"><img
                                                    src="{{asset('storage/'.$product->main_image)}}"
                                                    alt="product" /></label>



                                            <div class="invalid-feedback">
                                                من فضلك أدخل صورة المنتح
                                            </div>


                                            <div class="img_contain">
                                                <img id="preview-main-01" /></div>
                                            <div class="form-check custom-radio-check text-right-dir"><input
                                                    type="radio" class="form-check-input" id="test-00"
                                                    checked name="optradio1"><label
                                                    class="form-check-label color-title" for="test-00">
                                                    الصورة الأساسية
                                                </label> </div>
                                        </div>

                                        @php $i = 1; @endphp
                                        @foreach ($images as $image)
                                            <div class="form-group col-md-6 secondary-img-upload img-append-div">
                                                <input type="file" name="image[]" disabled
                                                       class="img-form-shape file-input form-control" value="{{ $image->image }}"
                                                       id="main-{{ $i }}" >
                                                <label class="file-input-label" for="main-{{ $i }}"><img
                                                        src= "{{ asset('storage/'.$image->path)}}"
                                                        alt="product" /></label>
                                                <div class="form-group form-check custom-radio-check append-custom-div mg text-right-dir"><label>صورة اضافية </label>
                                                    <span class="remove-img">
                                                                     <input type="button" id ="delete-image" value="{{ $image->id }}" onclick="deleteImage()">
                                                                        <i class="fa fa-trash"> </i></span>

                                                </div>

                                                <div class="img_contain">
                                                    <img id="preview-main-{{ $i }}"/>
                                                </div>
                                            </div>

                                            @php $i++  @endphp
                                        @endforeach
                                    </div>



                                </div>

                                <div class="form-group  margin-top-div text-center col-12">

                                    @if($product->is_valid==1 )

                                        <a href="{{route('product_status',[$product->id,0])}}" class="more-link color-bg inline-block-btn remove-btn m-0 ">تجميد</a>
                                      @elseif($product->is_valid==0)
                                        @if($product->activation_user_id==auth()->id())
                                            <a href="{{route('product_status',[$product->id,1])}}"  class="remove-btn">تفعيل</a>
                                        @endif
                                         @endif
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" name="next" class="more-link color-bg inline-block-btn m-0"
                                            > تعديل</button>
                                </div>
                            </div>


                       </fieldset>

                    </form>
                </div>
            </div>
        </div> <!-- /.MultiStep Form -->

    </div>

    @endsection


@section('scripts')

    <script type="text/javascript" src="{{asset('/admin/js/edit-product.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/js/main.js')}}"></script>

    @endsection
