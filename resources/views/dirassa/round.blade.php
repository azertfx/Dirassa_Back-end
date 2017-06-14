<!--content-->
    <div class="container page_n-2 reg_effect" data-animsition-in="fade-in-up-lg" data-animsition-in-duration="1500" data-animsition-out="fade-out-up-lg" data-animsition-out-duration="800">
        <h2 class="title_content">{{trans('accueil.material')}} {{$ar_materialname}}</h2>
        <span class="title_lign pink accent-2"></span>
      <div class="row">
        <div class="col s12 m6 right">
          <div class="card">
            <div class="cour_back">
                <h5>{{trans('accueil.round1')}}</h5>
                <a class="btn-floating btn-large waves-effect waves-light pink left">
                  <i class="zmdi" >1</i>
                </a>
            </div>
            <table class="striped">
              <thead>
                <tr> 
                    <th data-field="id">{{trans('accueil.exercices')}}</th>
                    <th data-field="name">{{trans('accueil.sommaries')}}</th>
                    <th data-field="price">{{trans('accueil.lessons')}}</th>
                </tr>
              </thead>
              <tbody>
              @foreach($rounds1 as $round1)
                @if($idmaterial == $round1->categories->id)
                <tr>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round1->id.'/'.$round1->ar_title.'/exercices') ?>">{{trans('accueil.exercice')}}</a></td>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round1->id.'/'.$round1->ar_title.'/resume') ?>">{{trans('accueil.sommary')}}</a></td>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round1->id.'/'.$round1->ar_title) ?>">{{$round1->ar_title}}</a></td>
                </tr>
                @endif
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="cour_back back2">
                <h5>{{trans('accueil.round2')}}</h5>
                <a class="btn-floating btn-large waves-effect waves-light pink left">
                  <i class="zmdi" >2</i>
                </a>
            </div>
            <table class="striped">
              <thead>
                <tr> 
                    <th data-field="id">{{trans('accueil.exercices')}}</th>
                    <th data-field="name">{{trans('accueil.sommaries')}}</th>
                    <th data-field="price">{{trans('accueil.lessons')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rounds2 as $round2)
                  @if($idmaterial == $round2->categories->id)
                  <tr>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round1->id.'/'.$round1->ar_title.'/exercices') ?>">{{trans('accueil.exercice')}}</a></td>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round2->id.'/'.$round2->ar_title.'/resume') ?>">{{trans('accueil.sommary')}}</a></td>
                    <td><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $idlevel.'/'.$level.'/'.$idspeciality.'/'.$speciality.'/'.$idmaterial.'/'.$material.'/'.$round2->id.'/'.$round2->ar_title) ?>">{{$round2->ar_title}}</a></td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!--/content-->