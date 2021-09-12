@extends('website.layouts.app')

@section('content')
    <!-- start-commission-title -->
    <div class="refused-title wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>سياسة دفع العمولة</h1>
                    <p>العمولة أمانة في ذمة المعلن سواء تمت المبايعة عن طريق الموقع أو بسببه، وموضحة قيمتها بما يلي:</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end-commission-title -->
<div class="refused-blog  wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>عمولة السيارات:</h2>
                <p>
                    <b>بيع السيارات</b>:1% من قيمة السيارة <br>
                    <b>سيارات للتنازل</b> :1% من قيمة التنازل إذا كان التنازل بمقابل. <br>
                    <b>تبادل السيارات:</b>1% من قيمة المبادلة إذا كان هناك مقابل للمبادلة.
                </p>


                <h2>عمولة العقارات:</h2>
                <p>
                    <b>عمولة العقارات:</b> 1% من قيمة العقار. <br>
                    <b>بيع عقار عن طريق وسيط:</b>يعتبر الموقع شريك في الوساطة ويقتسم السعي مع الوسطاء بالتساوي ، أو
                    يدفع المعلن للموقع 1% من قيمة العقار. <br>
                    <b>تأجير عقارات:</b> 1% من قيمة عقد الإيجار الجديد فقط ، وليس العقد المجدد لنفس الشخص. <br>
                </p>


                <h2>عمولة السلع و الخدمات الأخرى: </h2>
                <p>
                    <b>بيع سلعة:</b>1% من قيمة السلعة المباعة <br>
                    <b>تأجير سلع(معدات وغيرها):</b>1% من قيمة مبلغ الإيجار. <br>
                    <b>تقديم خدمات:</b> 1% من قيمة الخدمة المقدمة. وفي حالة تقديم الخدمة لأكثر من شخص فيتم تحويل 1%
                    عن كل خدمة تم تقديمها. <br>
                </p>

                <h3>إذا كانت قيمة العمولة أقل من 20 ريال سعودي ، فيمكن التصدق بها إلى أحد الجهات الخيرية الرسمية نيابة عن الموقع. </h3>

            </div>
        </div>
    </div>
</div>

    <!-- start frame -->
    <div class="container">
        <div class="foema-commission  wow fadeIn">
            <div class="container top-froma1">
                <div class="row">
                    <div class="forma col-lg-12">
                        <h2>حساب العمولة</h2>
                    </div>
                    <div class="col-lg-3">
                        <h3>حساب قيمة العمولة:</h3>
                    </div>
                    <div class="col-lg-9">
                        <form class="result-commission">

                            <span>إذا تم بيع السلعة بسعر</span>
                            <input type="number" id="money_amount" value="" min="1">
                            <b>ريال</b>
                        </form>
                    </div>
                    <div class="col-lg-3"> </div>
                    <div class=" result col-lg-9">
                        <form class="result2-commission">

                            <span>فأن المبلغ المستحق دفعه هو:</span>
                            <input type="number" id="commission_amount" disabled value="">
                            <b> ريال</b>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bottom-forma container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <h3>التفاصيل :</h3>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">

                        <p>عمولة الموقع مع ضريبة القيمة المضافة هي : 00 ريال</p>
                        <ul>
                            <li>{{$ownerVC}} </li>
                            <li>سجل تجاري رقم: 1010283122</li>
                            <li>الرقم الضريبي: 300710482300003</li>
                            <li>قرطبة، الرياض ، المملكة العربية السعودية.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end forma -->




<!-- start commmission title Banks  -->
<div class="commmission-banks-title  wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>دفع العمولة</h2>
                <p>يمكنك استخدام التحويل البنكي لدفع العمولة عن طريق إرسال حواله إلى حساباتنا في البنوك المحلية. </p>
            </div>
        </div>
    </div>
</div>
<!-- end commmission title Banks  -->


    <!-- start commmission  Banks  -->
    <div class="commmission-divs-banks  wow fadeIn">
        <div class="container">
            <div class="row">
                @foreach($bankAccounts as $bankAccount)
                <div class="col-lg-4 col-md-6">
                    <div class="bank1">
                        <div class="bank-custom-img">
                            <img src="{{asset('/storage/' . $bankAccount->logo)}}" alt="bank">
                        </div>
                        <h2>{{$bankAccount->name}}</h2>
                        <p><span>{{$ownerVC}}</span></p>
                        <p>{{' رقم الحساب ' . $bankAccount->number  }}</p>
                        <p>{{' الايبان ' . $bankAccount->iban_number}}</p>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>

<!-- start commmission forma -title -->
@if(auth()->user())
<div class="title-forma-data">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>نموذج تحويل العمولة</h2>
                <p>بعد إرسال المبلغ،يجب مراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء:</p>
            </div>
        </div>
    </div>
</div>
<!-- end commmission forma -title -->


<!-- start commission-from group -->

<form class="needs-validation" method="post" action="{{route('commission.store')}}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-group  wow fadeIn">
        <div class="container bg-form-group">
            <div class="form-group row">
                {{--<div class="col-lg-3 title-from-grop">--}}
                    {{--<label>اسم المستخدم :</label>--}}
                {{--</div>--}}
                {{--<div class="col-lg-9 input-from-group">--}}
                    {{--<input type="text" class="form-control" name="name" value="{{auth()->user()->name}}" required>--}}
                    {{--<div class="invalid-feedback">--}}
                        {{--من فضلك ادخل اسم المستخدم--}}
                    {{--</div>--}}
                {{--</div>--}}


                <div class="col-lg-3 title-from-grop">
                    <label>مبلغ العمولة :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                    <input type="number" class="form-control" name="money_amount" min="1" required>
                    <div class="invalid-feedback">
                        من فضلك ادخل مبلغ العمولة !
                    </div>
                </div>


                <div class="col-lg-3  title-from-grop">
                    <label>البنك الذي تم التحويل إليه :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                    <select class="form-control form-control-lg" name="bankAccount_id" required>

                        <option value="" selected disabled>اختر اسم البنك</option>
                        @foreach($bankAccounts as $bankAccount)
                        <option value="{{$bankAccount->id}}">{{$bankAccount->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        اختر اسم البنك
                    </div>
                </div>

                <div class="col-lg-3 title-from-grop">
                    <label>متى تم التحويل؟ :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                   <input type="date" class="form-control" name="transfer_date" required>
                    <div class="invalid-feedback">من فضلك أدخل تاريخ التحويل</div>
                </div>

                <div class="col-lg-3 title-from-grop">
                    <label>اسم المحول :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                    <input type="text" class="form-control" name="transferee_name" required>
                    <div class="invalid-feedback">من فضلك ادخل اسم المحول </div>
                </div>

                {{--<div class="col-lg-3 title-from-grop">--}}
                    {{--<label>رقم الجوال المرتبط بعضويتك :</label>--}}
                {{--</div>--}}
                {{--<div class="col-lg-9 input-from-group">--}}
                    {{--<input type="tel" class="form-control" name="phone" value="{{auth()->user()->phone}}" required>--}}
                    {{--<div class="invalid-feedback">من فضلك ادخل رقم الجوال المرتبط بعضويتك</div>--}}
                {{--</div>--}}

                <div class="col-lg-3 title-from-grop">
                    <label>رقم الإعلان :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                    <select class="form-control form-control-lg" name="product_id" required>

                        <option value="" selected disabled>اختر رقم الاعلان</option>
                        @foreach($products as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback"> من فضلك ادخل رقم الاعلان </div>
                </div>

                <div class="col-lg-3 title-from-grop">
                    <label>صورة الحوالة :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                    <input type="file" class="form-control" name="image" required>
                    <div class="invalid-feedback"> من فضلك ارفع صورة الحوالة </div>
                </div>


                <div class="col-lg-3 title-from-grop">
                    <label>ملاحظات :</label>
                </div>
                <div class="col-lg-9 input-from-group">
                        <textarea name="notes" id="" cols="30" rows="10">

                            </textarea>
                    <div class="valid-feedback">من فضلك ادخل ملاحظات</div>
                </div>

                <div class="col-lg-12 button-form-group">
                    <p>نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقة</p>
                    <a  href="{{route('commission-privacy')}}">سياسة العمولة</a>
                    <button type="submit" class="custom-btn"> ارسال</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endsection
@section('footer')
    @include('website.layouts.footer')
@endsection
