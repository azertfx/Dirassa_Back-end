@if(count($alllessons) > 0)
<!-- slider post -->
    <div class="container" id="eee">
      <div id="owl-example" class="row owl-carousel slider_post_m_top">
        @foreach($alllessons as $alllesson)
        <?php $exams = \App\Exam::where('categories_id','=',$alllesson->categories->id)->get(); 
              $specialitiesid = \App\Category::where('id','=',$alllesson->categories->parent)->get(); 
              foreach ($specialitiesid as $specialityid) {
                $iddspeciality = $specialityid->id;
                $fr_speciality = $specialityid->fr_name;
                $id_speciality = $specialityid->parent;
              }
              $levelsid = \App\Category::where('id','=',$id_speciality)->get(); 
              foreach ($levelsid as $levelid) {
                $fr_level = $levelid->fr_name;
                $id_level = $levelid->id;
              }
        ?>
        @if( strpos(URL::current(),'dirassa/') )
          @if($idlevel == $id_level && $iddspeciality == $idspeciality)
          <div class="col s12 cardpost">
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
                    <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $id_level.'/'.$fr_level.'/'.$iddspeciality.'/'.$fr_speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name.'/examen') ?>" class="btn-floating btn-large waves-effect waves-light pink accent-2 tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.exams')}}"><img class="ver_align" src="{{ASSET}}/images/labs.png" alt="labs"></a>
                  </div>
                  <div class="col s4 center-align">
                    <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $id_level.'/'.$fr_level.'/'.$iddspeciality.'/'.$fr_speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name) ?>" class="btn-floating btn-large waves-effect waves-light indigo tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.lesson_sommary')}}"><img class="ver_align" src="{{ASSET}}/images/book.png" alt="book"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
        @else
        <div class="col s12 cardpost">
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
                  <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $id_level.'/'.$fr_level.'/'.$iddspeciality.'/'.$fr_speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name.'/examen') ?>" class="btn-floating btn-large waves-effect waves-light pink accent-2 tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.exams')}}"><img class="ver_align" src="{{ASSET}}/images/labs.png" alt="labs"></a>
                </div>
                <div class="col s4 center-align">
                  <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $id_level.'/'.$fr_level.'/'.$iddspeciality.'/'.$fr_speciality.'/'.$alllesson->categories->id.'/'.$alllesson->categories->fr_name) ?>" class="btn-floating btn-large waves-effect waves-light indigo tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('accueil.lesson_sommary')}}"><img class="ver_align" src="{{ASSET}}/images/book.png" alt="book"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div><!-- /slider post -->
@endif