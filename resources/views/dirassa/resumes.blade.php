@extends(proj.'.index')
@section('dirassa')
@include(proj.'.resumes_first_title')
<!--content-->
<?php $sommariespdf = \App\Lesson::where('id','=',$idlesson)->get();
  foreach ($sommariespdf as $sommariepdf) {
    $sommarypdf_path = $sommariepdf->sommary_pdf;
  }
 ?>
    <div class="container">
      <h2 class="title_content">{{$ar_lessonname}}</h2>
      <span class="title_lign pink accent-2"></span>
    </div>
    <object data="{{ASSET}}/pdf/{{$sommarypdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/{{$sommarypdf_path}}">تحميل الملف</a></p>
    </object>
    <div class="container">
      <div class="fb-share-button" data-href="https://developers.facebook.com/{{$sommarypdf_path}}" data-layout="button_count"></div>
      <div class="fb-comments" data-href="http://developers.facebook.com/{{$sommarypdf_path}}" data-numposts="5"></div>
    </div>
    <div class="clear"></div>
@include(proj.'.round')
@include(proj.'.slide_post')
@stop