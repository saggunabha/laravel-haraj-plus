<!DOCTYPE html>
<!--
  To change this license header, choose License Headers in Project Properties.
  To change this template file, choose Tools | Templates
  and open the template in the editor.
-->
<html lang="ar">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>حراج بلص</title>
    <!--
      Meta tags
      ================
    -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

</head>

<body style="direction: rtl">

<!--start mail
         ================-->
<div class="mail-div"
     style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 700px; text-align: center; margin: auto; border: 1px solid #e2e0e0">
    <div class="mail-content"
         style="color:#fff;background: #2b3e4f; line-height:30px; font-size: 20px; padding: 20px 30px">
        موقع حراج بلس
    </div>
    <div
        style="background: #f6f6f6; z-index: 5; font-size: 14px; line-height: 24px; color: #2b3e4f; position: relative; padding:  20px; text-align: right;">
        <h3 style="margin-bottom: 10px;font-size: 17px;"> عزيزي العميل : </h3>
        لقد تم الرد من {{ $data['emailAdmin'] }}
        <div style="color:#2b3e4f; margin-top: 30px; text-align: center;">
            <h3 style="margin-bottom: 10px;font-size: 17px;">الرساله الخاصه بك : </h3>
            {{ $data['messageUser'] }}
            
          <h3 style="margin-bottom: 10px;font-size: 17px;"> الموضوع الخاص بك : </h3>
             {{ $data['subject'] }}
            
            <hr>
          <h3 style="margin-bottom: 10px;font-size: 17px;"> الرد الخاص بالدعم : </h3>
             {{ $data['messageAdmin'] }}            
        </div>
    </div>
</div>
<!--end mail-->



</body>

</html>
