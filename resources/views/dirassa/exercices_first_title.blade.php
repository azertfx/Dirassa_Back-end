<!-- first title background -->
    <div class="f_title_bg">
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="{{ASSET}}/images/news_bg.jpg" alt="slide image"> <!-- random image -->
            <div class="caption center-align">
              <?php $materials = \App\Category::where('id','=',$idmaterial)->get(); 
                foreach ($materials as $material) {
                  $ar_material = $material->ar_name;
                }
              ?>
              <h1>{{trans('accueil.exercices')}}</h1>
            </div>
          </li>
        </ul>
      </div>
    </div><!-- /first title background -->
    <!-- title links -->
    <nav class="indigo">
      <div class="nav-wrapper container">
        <ul class="right">
          <li class="no_hover">{{trans('accueil.exercices')}}</li>    
          <li class="no_hover">&nbsp;<&nbsp;</li>  
          <li class="no_hover">{{$ar_lessonname}}</li> 
          <li class="no_hover">&nbsp;<&nbsp;</li>  
          <li class="no_hover">{{$ar_material}}</li>    
          <li class="no_hover">&nbsp;<&nbsp;</li>       
          <li class="no_hover">{{$ar_specialityname}}</li>       
          <li class="no_hover">&nbsp;<&nbsp;</li>       
          <li class="no_hover">{{$ar_levelname}}</li>   
        </ul>
      </div>
    </nav><!-- /title links -->