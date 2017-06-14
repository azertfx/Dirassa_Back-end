@extends(proj.'.index')
@section('dirassa')
@include(proj.'.first_title')
	<!--content-->
    <div class="container">
      <h2 class="title_content">{{trans('accueil.materiales')}}</h2>
      <span class="title_lign pink accent-2"></span>
      <div class="row">
      	<?php $i = 'ok'; ?>
        @foreach($alllessons as $alllesson)
        @if($alllesson->categories->id != $i)
        <?php $exams = \App\Exam::where('categories_id','=',$alllesson->categories->id)->get(); 
        	  $idlevelss = \App\Category::where('id','=',$alllesson->categories->parent)->get();
        	  foreach ($idlevelss as $idlevels) {
        	  	$levelid = $idlevels->parent;
        	  	$id_speciality = $idlevels->id;
        	  }
        ?>
        @if($idlevel == $levelid && $idspeciality == $id_speciality)
        <div class="col l4 m6 s12 right cardpost">
          <div class="card">
            <div class="card-image">
              <img src="{{ASSET}}/images/@foreach($exams as $exam){{$exam->image}} @endforeach" alt="{{$alllesson->categories->ar_name}}">
            </div>
            <div class="card-content">
              <h2 class="box_title">{{$alllesson->categories->ar_name}}</h2>
              <div class="row mar_top">
                <div class="col s4 center-align">
                  <a href="#!" class="btn-floating btn-large waves-effect waves-light gray_bg tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.quiz')}}"><img class="ver_align" src="{{ASSET}}/images/cup.png" alt="cup"></a>
                </div>
                <div class="col s4 center-align">
                  <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name.'/examen') ?>" class="btn-floating btn-large waves-effect waves-light pink accent-2 tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.exams')}}"><img class="ver_align" src="{{ASSET}}/images/labs.png" alt="labs"></a>
                </div>
                <div class="col s4 center-align">
                  <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name) ?>" class="btn-floating btn-large waves-effect waves-light indigo tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.lesson_sommary')}}"><img class="ver_align" src="{{ASSET}}/images/book.png" alt="book"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        <?php $i = $alllesson->categories->id; ?>
        @endif
        @endforeach
      </div>
    </div><!--/content-->
@stop