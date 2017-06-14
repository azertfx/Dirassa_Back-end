@extends(proj.'.index')
@section('dirassa')
@include(proj.'.lessons_first_title')
<!--content-->
<?php $lessonspdf = \App\Lesson::where('id','=',$idlesson)->get();
  foreach ($lessonspdf as $lessonpdf) {
    $lessonspdf_path = $lessonpdf->lesson_pdf;
    $lessonspdf_id = $lessonpdf->id;
    $lessonspdf_fr = $lessonpdf->fr_title;
  }
 ?>
    <div class="container">
      <h2 class="title_content">{{$ar_lessonname}}</h2>
      <span class="title_lign pink accent-2"></span>
    </div>
    <object data="{{ASSET}}/pdf/{{$lessonspdf_path}}" type="application/pdf" width="100%" height="800px">
      <p>أنت لا تتوفر على تطبيق pdf في متصفحك ليمكنك من مشاهدة مباشرة للملف لكن يمكنك تحميل الملف من هنا <a href="{{ASSET}}/pdf/maths.pdf">تحميل الملف</a></p>
    </object>
    <div class="container">
      <div class="fb-comments" data-href="http://developers.facebook.com/{{$lessonspdf_path}}" data-numposts="5"></div>
    </div>
    <div class="clear"></div>
@include(proj.'.round')
@include(proj.'.slide_post')
@stop