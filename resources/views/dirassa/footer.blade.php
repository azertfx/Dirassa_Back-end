<!--footer-->
    <footer class="page-footer gray_bg">
      <div class="container">
        <div class="row">
          <div class="col l3 m6 s12" id="eee">
            <h2>صفحة الفيسبوك</h2>
            <span class="titleline"></span>
            <div class="clear"></div>
            <div class="fb-page" data-href="https://www.facebook.com/ecoleweb" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ecoleweb"><a href="https://www.facebook.com/ecoleweb">eWA : Ecole Web Avancé</a></blockquote></div></div>
          </div>
          <div class="col l3 m6 s12" id="eee">
            <h2>الدراسة بعد الباك</h2>
            <span class="titleline"></span>
            <div class="clear"></div>
            <ul class="list_news">
              @foreach($bacallarticles as $bacarticles)
              <li>
                <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $bacarticles->id.'/'.$bacarticles->fr_titles) ?>">
                  <div class="square right">
                    <img style="height:100%;width:100%;" src="{{ASSET}}/images/{{$bacarticles->images}}" alt="{{$bacarticles->ar_titles}}" class="z-depth-1">
                  </div>
                  <span class="title">{{$bacarticles->short_ar_titles}}</span>
                  <p>{{$bacarticles->short_ar_contents}}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col l3 m6 s12" id="eee">
            <h2>المستجدات</h2>
            <span class="titleline"></span>
            <div class="clear"></div>
            <ul class="list_news">
              @foreach($newsallarticles as $newsarticles)
              <li>
                <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $newsarticles->id.'/'.$newsarticles->fr_titles) ?>">
                  <div class="square right">
                    <img style="height:100%;width:100%;" src="{{ASSET}}/images/{{$newsarticles->images}}" alt="{{$newsarticles->ar_titles}}" class="z-depth-1">
                  </div>
                  <span class="title">{{$newsarticles->short_ar_titles}}</span>
                  <p>{{$newsarticles->short_ar_contents}}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col l3 m6 s12" id="eee">
            <h2>دراسة.ما</h2>
            <span class="titleline"></span>
            <div class="clear"></div>
            <p>موقع دراسة.ما هو موقع يسعى الى تسهيل
            الدراسة على التلميد المغربي, حيث يمكن
            للتلميد المراجعة و الدراسة عبر حاسوبه
            المكتبي وأيضا عبر هاتفه الشخصي
            ولوحته الإلكترونية</p>
            <div class="row">
              <div class="col s3">
                <a class="btn-floating waves-effect waves-light indigo darken-3 first"><i class="zmdi zmdi-facebook"></i></a>
              </div>
              <div class="col s3">
                <a class="btn-floating waves-effect waves-light blue"><i class="zmdi zmdi-twitter"></i></a>
              </div>
              <div class="col s3">
                <a class="btn-floating waves-effect waves-light red darken-4"><i class="zmdi zmdi-play-circle"></i></a>
              </div>
              <div class="col s3">
                <a class="btn-floating waves-effect waves-light red"><i class="zmdi zmdi-google"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright indigo">
        <div class="container">
          <div class="row">
            <div class="col l4 m12 s12 copy_r">
              {{trans('accueil.copyright')}}
            </div>
            <div class="col l8 m12 s12 hide-on-med-and-down">
              <ul id="nav-mobile" class="right">
                @foreach($allcat as $categories)
                  <li>
                    <a>{{ $categories->{lang} }}</a>
                  </li> 
                @endforeach
                <li><a href="{{url('/'.proj)}}">{{trans('accueil.accueil')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer><!--/footer-->
    @include(proj.'.footer_script')