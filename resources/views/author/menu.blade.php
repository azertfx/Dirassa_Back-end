<nav class="gray_bg">
  <div class="container nav-wrapper">
    <div class="container">
      <span>{{auth()->user()->name}}</span>
      <ul class="left">
        <li><a href="{{url('/adlogout')}}">تسجيل الخروج</a></li>
      </ul>
    </div>
    <a href="#" data-activates="nav-mobile" class="right button-collapse"><i class="material-icons">menu</i></a>

  </div>
  <ul id="nav-mobile" class="side-nav fixed right-aligned" style="right:0 !important;left:auto !important;">
    <li><a href="{{url('/'.proj)}}" class="logo"><img src="{{ASSET}}/images/logo_v2.png" alt="logo"></a></li>
    <li class="divider"></li>
    <li class="@if( strpos(URL::current(), '/categories') ) active @endif"><a class="@if( strpos(URL::current(), '/categories') ) active @endif" href="{{url('/'.athr.'/categories')}}">المواد/التخصصات</a></li>
    <li class="@if( strpos(URL::current(), '/lessons') ) active @endif"><a class="@if( strpos(URL::current(), '/lessons') ) active @endif" href="{{url('/'.athr.'/lessons')}}">الدروس</a></li>
    <li class="@if( strpos(URL::current(), '/materialimage') ) active @endif"><a class="@if( strpos(URL::current(), '/materialimage') ) active @endif" href="{{url('/'.athr.'/materialimage')}}">إمتحانات/صور المواد</a></li>
    <li class="@if( strpos(URL::current(), '/articles') ) active @endif"><a class="@if( strpos(URL::current(), '/articles') ) active @endif" href="{{url('/'.athr.'/articles')}}">مقالات</a></li>
    <li class="@if( strpos(URL::current(), '/ecoles') ) active @endif"><a class="@if( strpos(URL::current(), '/ecoles') ) active @endif" href="{{url('/'.athr.'/ecoles')}}">المدارس</a></li>
    <li class="@if( strpos(URL::current(), '/partners') ) active @endif"><a class="@if( strpos(URL::current(), '/partners') ) active @endif" href="{{url('/'.athr.'/partners')}}">الشركاء</a></li>
  </ul>
</nav>

