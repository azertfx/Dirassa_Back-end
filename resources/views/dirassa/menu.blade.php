<!--navbar-->
    <nav class="gray_bg">
      <div class="nav-wrapper container">
        <a id="logo-container" href="{{url('/'.proj)}}" class="logo brand-logo right hide-on-med-and-down"><img src="{{ASSET}}/images/logo.png" alt="logo"></a>
        <ul class="left">
          <li><a href="{{url('/'.proj.'/nous')}}">{{trans('author.our')}}</a></li>
          <li><a href="{{url('/'.proj.'/contactnous')}}">{{trans('author.our_contact')}}</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav right">
          <li style="background:#fff !important;"><a href="{{url('/'.proj)}}" class="logo" style="background:#fff !important;"><img src="{{ASSET}}/images/logo_v2.png" alt="logo"></a></li>
          <li class="divider"></li>
          <li class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif"><a href="{{url('/'.proj)}}" class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif">{{trans('accueil.accueil')}}</a></li>
          @foreach($asccat as $categories)
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li class="collapsible-header waves-effect waves-light @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">
                <a href="@if( $categories->fr_name == '1ere bac' || $categories->fr_name == '2eme bac' )#!@else {{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>@endif" class="collapsible-header waves-effect waves-light @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">{{ $categories->{lang} }}</a>
                <div class="collapsible-body">
                  <ul class="right_margin">
                    @foreach($fullcat as $cats)
                      @if($cats->parent == $categories->id)
                        <li><a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>/<?= str_replace(' ', '-', $cats->id.'/'.$cats->fr_name) ?>">{{ $cats->{lang} }}</a></li>
                      @endif
                    @endforeach 
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          @endforeach
        </ul>
        <a href="#" data-activates="nav-mobile" class="right button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
    <!--navbar dropdown -->
    @foreach($allcat as $categories)
    <table id="{{ $categories->id }}" class="dropdown-content sous_menu gray_bg">
      <tbody>
        <tr>
          @foreach($fullcat as $cats)
            @if($categories->id == $cats->parent)
              <td>
                <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>/<?= str_replace(' ', '-', $cats->id.'/'.$cats->fr_name) ?>">{{ $cats->{lang} }}</a>
              </td>
            @endif
          @endforeach 
        </tr>
      </tbody>
    </table>
    @endforeach
    <nav class="second_nav indigo hide-on-med-and-down" style="z-index:9999 !important;">
      <div class="nav-wrapper container">
        <ul id="nav-mobile" class="right">
          @foreach($allcat as $categories)
            <li class=" @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">
              <a href="@if( $categories->fr_name == '1ere bac' || $categories->fr_name == '2eme bac' )#!@else {{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>@endif" data-activates="{{ $categories->id }}" class="@foreach($fullcat as $cats) @if($cats->parent == $categories->id) dropdown-button @endif @endforeach @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">{{ $categories->{lang} }}</a>
            </li> 
          @endforeach
          <li class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif"><a href="{{url('/'.proj)}}" class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif">{{trans('accueil.accueil')}}</a></li>
        </ul>
      </div>
    </nav><!--/navbar-->
    <!--navbar fexed dropdown -->
    @foreach($allcat as $categories)
    <table id="{{ $categories->id }}{{ $categories->id }}" class="dropdown-content sous_menu gray_bg">
      <tbody>
        <tr>
          @foreach($fullcat as $cats)
              @if($cats->parent == $categories->id)
                <td>
                  <a href="{{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>/<?= str_replace(' ', '-', $cats->id.'/'.$cats->fr_name) ?>">{{ $cats->{lang} }}</a>
                </td>
              @endif
          @endforeach 
        </tr>
      </tbody>
    </table>
    @endforeach
    <!--navbar fexed-->
    <nav class="second_nav indigo hide-on-med-and-down fix_nav">
      <div class="nav-wrapper container">
        <ul id="nav-mobile" class="right">
          @foreach($allcat as $categories)
            <li class=" @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">
              <a href="@if( $categories->fr_name == '1ere bac' || $categories->fr_name == '2eme bac' )#!@else {{url('/'.proj)}}/<?= str_replace(' ', '-', $categories->id.'/'.$categories->fr_name) ?>@endif" data-activates="{{ $categories->id }}{{ $categories->id }}" class="@foreach($fullcat as $cats) @if($cats->parent == $categories->id) dropdown-button @endif @endforeach @if( strpos(URL::current(), str_replace(' ', '-', '/'.$categories->fr_name)) ) active @endif">{{ $categories->{lang} }}</a>
            </li> 
          @endforeach
          <li class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif"><a href="{{url('/'.proj)}}" class="@if( strpos(URL::current(),'dirassa') AND !strpos(URL::current(),'dirassa/') ) active @endif">{{trans('accueil.accueil')}}</a></li>
        </ul>
      </div>
    </nav><!--/navbar fexed-->