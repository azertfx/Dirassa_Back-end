@extends(proj.'.index')
@section('dirassa')
@include(proj.'.news_first_title')
<!--content-->
    <div class="container page_n-2 page_news_n-1">
      <div class="row">
        <div class="col s12 m7 right">
          @foreach($findarticles as $findarticle)
            <!-- slider news -->
            <div class="slider">
              <ul class="slides">
                <li>
                  <a href="#!">
                    <img src="{{ASSET}}/images/{{$findarticle->images}}" alt="{{$findarticle->ar_titles}}"> <!-- random image -->
                  </a>
                </li>
              </ul>
            </div><!-- /slider news -->
            <div class="news_post_text" id="eee">
              <h2>{{$findarticle->ar_titles}}</h2>
              <p>{{$findarticle->ar_contents}}</p>
            </div>
            <hr class="hr_para" id="eee">
            <div class="fb-comments" data-href="http://developers.facebook.com/{{$findarticle->id}}/{{$findarticle->fr_titles}}" data-numposts="5"></div>
          @endforeach
        </div>
        <div class="col s12 m5">
          <div class="row">
            <div class="col s12 right">
              <div class="card">
                <div class="cour_back">
                    <h5>{{trans('author.news')}}</h5>
                </div>
                <table class="striped">
                  <tbody>
                    @foreach($newsarticles as $newsarticle)
                      <tr>
                        <td>
                          <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$newsarticle->id.'/'.$newsarticle->ar_titles) ?>">
                            <div class="square right">
                              <img style="height: 100%;width: 100%;" src="{{ASSET}}/images/{{$newsarticle->images}}" alt="{{$newsarticle->ar_titles}}" class="z-depth-1">
                            </div>
                            <div class="news_t_p">
                              <span class="title">{{$newsarticle->short_ar_titles}}</span>
                              <p>{{$newsarticle->short_ar_contents}}</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col s12" id="eee">
              <div class="card">
                <div class="cour_back back2">
                    <h5>{{trans('author.apresbac')}}</h5>
                </div>
                <table class="striped">
                  </tbody>
                    @foreach($bacarticles as $bacarticle)
                      <tr>
                        <td>
                          <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $news.'/'.$bacarticle->id.'/'.$bacarticle->ar_titles) ?>">
                            <div class="square right">
                              <img style="height: 100%;width: 100%;" src="{{ASSET}}/images/{{$bacarticle->images}}" alt="{{$bacarticle->ar_titles}}" class="z-depth-1">
                            </div>
                            <div class="news_t_p">
                              <span class="title">{{$bacarticle->short_ar_titles}}</span>
                              <p>{{$bacarticle->short_ar_contents}}</p>
                            </div>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--/content-->
@stop