<!-- slider news -->
@if(count($allarticles) > 0)
    @if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') )
      <h2 class="title_content" id="eee">مستجدات</h2>
      <span class="title_lign pink accent-2" id="eee"></span>
    @endif
    <div class="slider" id="{{ Request::path() === 'website' ? 'eee' : '' }}">
      <ul class="slides">
        @if( strpos(URL::current(),'/nouvelles') )
          @foreach($newsarticles as $newsarticle)
            <li>
              <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$newsarticle->id.'/'.$newsarticle->ar_titlestitles) ?>">
                <img src="{{ASSET}}/images/{{$newsarticle->images}}" alt="{{$newsarticle->ar_titles}}"> <!-- random image -->
                <div class="caption center-align">
                  <h3>{{$newsarticle->short_ar_titles}}</h3>
                  <h5 class="light grey-text text-lighten-3">{{$newsarticle->short_ar_contents}}</h5>
                </div>
              </a>
            </li>
          @endforeach
        @elseif( strpos(URL::current(),'/apres-bac') )
          @foreach($bacarticles as $bacarticle)
            <li>
              <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$bacarticle->id.'/'.$bacarticle->ar_titlestles) ?>">
                <img src="{{ASSET}}/images/{{$bacarticle->images}}" alt="{{$bacarticle->ar_titles}}"> <!-- random image -->
                <div class="caption center-align">
                  <h3>{{$bacarticle->short_ar_titles}}</h3>
                  <h5 class="light grey-text text-lighten-3">{{$bacarticle->short_ar_contents}}</h5>
                </div>
              </a>
            </li>
          @endforeach
        @else
          @foreach($allarticles as $articles)
            <li>
              <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $articles->stat.'/'.$articles->id.'/'.$articles->ar_titles) ?>">
                <img src="{{ASSET}}/images/{{$articles->images}}" alt="{{$articles->ar_titles}}"> <!-- random image -->
                <div class="caption center-align">
                  <h3>{{$articles->short_ar_titles}}</h3>
                  <h5 class="light grey-text text-lighten-3">{{$articles->short_ar_contents}}</h5>
                </div>
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div><!-- /slider news -->
@endif