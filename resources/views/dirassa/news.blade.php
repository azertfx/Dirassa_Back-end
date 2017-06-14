@extends(proj.'.index')
@section('dirassa')
@include(proj.'.slide_news')
<!-- news post -->
    <div class="container">
      <div class="row">
        @if( strpos(URL::current(),'/nouvelles') )
          @foreach($newsarticles as $newsarticle)
            <div class="col s12 m6 l4 right">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img style="height:200px;" class="activator" src="{{ASSET}}/images/{{$newsarticle->images}}">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">{{$newsarticle->short_ar_titles}}<i class="material-icons left">more_vert</i></span>
                  <p><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$newsarticle->id.'/'.$newsarticle->ar_titles) ?>">{{trans('accueil.suite')}}</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">{{$newsarticle->short_ar_titles}}<i class="material-icons left">close</i></span>
                  <p>{{$newsarticle->short_ar_contents}}</p>
                  <p><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$newsarticle->id.'/'.$newsarticle->ar_titles) ?>">{{trans('accueil.suite')}}</a></p>
                </div>
              </div>
            </div>
          @endforeach
        @elseif( strpos(URL::current(),'/apres-bac') )
          <h2 class="title_content">بعد الباكالوريا</h2>
          <span class="title_lign pink accent-2"></span>
          <script type="text/javascript">
            $(document).ready(function(){
              $(document).on('click','.choiseannaire',function(){
                var ville = $('.ville').val();
                var domain = $('.domain').val();
                var secteur = $('.secteur').val();
                $.ajax({
                  url:'{{url(proj."/$id/$news/searchannuaire")}}',
                  dataType:'json',
                  data:{ville:ville,domain:domain,secteur:secteur,'_token':'{{csrf_token()}}'},
                  type:'post',
                  success: function(data, test){
                    if (data != '' || data != null) {
                        $('.annuaireresult').empty();
                        $('.annuaireresult').append(data);
                    }
                  }
                });
              });
            });
          </script>
          <div class="row">
            {!! Form::open() !!}
            <div class="col s6 m3 l3">
              <select name="annsecteur" class="browser-default secteur" required>
                  <option value="tout" selected>جميع الأنواع</option>
                  @foreach($annuairesecteur as $annsecteur)
                  <option value="{{$annsecteur->secteur}}">{{$annsecteur->secteur}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col s6 m3 l3">
              <select name="anndomain" class="browser-default domain" required>
                  <option value="tout" selected>جميع التخصصات</option>
                  @foreach($annuairedomain as $anndomain)
                  <option value="{{$anndomain->domain}}">{{$anndomain->domain}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col s6 m3 l3">
              <select name="annville" class="browser-default ville" required>
                  <option value="tout" selected>جميع المدن</option>
                  @foreach($annuaireville as $annville)
                  <option value="{{$annville->ville}}">{{$annville->ville}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col s6 m3 l3">
              <span class="annsbtn waves-effect waves-light btn choiseannaire pink accent-2" >{{trans('author.search')}}</span>
            </div>
            {!! Form::close() !!}
          </div>
        <div class="annuaireresult"></div>
          @foreach($bacarticles as $bacarticle)
            <div class="col s12 m6 l4 right">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img style="height:200px;" class="activator" src="{{ASSET}}/images/{{$bacarticle->images}}">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">{{$bacarticle->short_ar_titles}}<i class="material-icons left">more_vert</i></span>
                  <p><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$bacarticle->id.'/'.$bacarticle->ar_titles) ?>">{{trans('accueil.suite')}}</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">{{$bacarticle->short_ar_titles}}<i class="material-icons left">close</i></span>
                  <p>{{$bacarticle->short_ar_contents}}</p>
                  <p><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$bacarticle->id.'/'.$bacarticle->ar_titles) ?>">{{trans('accueil.suite')}}</a></p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div><!-- /news post -->
@stop