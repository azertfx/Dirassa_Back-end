@extends(proj.'.index')
@section('dirassa')
@include(proj.'.exercices_first_title')
<!--content-->
<?php $exercicespdf = \App\Lesson::where('id','=',$idlesson)->get();
  foreach ($exercicespdf as $exercicepdf) {
    $exercicepdf_path = $exercicepdf->exercice_pdf;
    $exercicecorrpdf_path = $exercicepdf->exercice_corr_pdf;
    $exercicecorrpdf_id = $exercicepdf->id;
    $exercicecorrpdf_fr = $exercicepdf->fr_title;
  }
 ?>
    <div class="container">
      <h2 class="title_content">{{$ar_lessonname}}</h2>
      <span class="title_lign pink accent-2"></span>
    </div>
    <object data="{{ASSET}}/pdf/{{$exercicepdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/maths.pdf">تحميل الملف</a></p>
    </object>
    <h2 class="title_content">الحل</h2>
    <span class="title_lign pink accent-2"></span>
    <object data="{{ASSET}}/pdf/{{$exercicecorrpdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/examen.pdf">تحميل الملف</a></p>
    </object>
    <div class="container">
      <div class="fb-comments" data-href="http://developers.facebook.com/{{$exercicepdf_path}}" data-numposts="5"></div>
    </div>
    <div class="clear"></div>
@include(proj.'.round')
@include(proj.'.slide_post')
@stop