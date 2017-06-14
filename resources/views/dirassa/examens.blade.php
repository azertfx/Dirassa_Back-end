@extends(proj.'.index')
@section('dirassa')
@include(proj.'.examens_first_title')
<!--content-->
<?php $examenspdf = \App\Exam::where('categories_id','=',$idmaterial)->get();
  foreach ($examenspdf as $examenpdf) { 
    $examenpdf_path = $examenpdf->exam_pdf;
    $examencorrpdf_path = $examenpdf->exam_corr_pdf;
    $examencorrpdf_id = $examenpdf->id;
    $examencorrpdf_fr = $examenpdf->fr_title;
  }
 ?>
    <div class="container">
      <h2 class="title_content">{{$ar_materialname}}</h2>
      <span class="title_lign pink accent-2"></span>
    </div>
    <object data="{{ASSET}}/pdf/{{$examenpdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/maths.pdf">تحميل الملف</a></p>
    </object>
    <h2 class="title_content">الحل</h2>
    <span class="title_lign pink accent-2"></span>
    <object data="{{ASSET}}/pdf/{{$examencorrpdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/examen.pdf">تحميل الملف</a></p>
    </object>
    <div class="container">
      <div class="fb-comments" data-href="http://developers.facebook.com/{{$examencorrpdf_path}}" data-numposts="5"></div>
    </div>
    <div class="clear"></div>
@include(proj.'.round')
@include(proj.'.slide_post')
@stop