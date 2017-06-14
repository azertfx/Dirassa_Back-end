@extends(athr.'.index')
@section('athr_content')
	<a href="{{url(athr.'/articles/create')}}" class="add_btn left">{{trans('author.addarticles')}}</a>
	<h3>{{trans('author.articles')}}</h3>
	{!! Form::open(['route'=>athr.'.articles.store']) !!}

            @if($countarticles > 0)

              <script type="text/javascript">
                $(document).ready(function(){
                  $(document).on('change','.article',function(){
                    var articlestat = $(this).val();
                    $.ajax({
                      url:'{{url(athr."/articles/searcharticles")}}',
                      dataType:'json',
                      data:{articlestat:articlestat,'_token':'{{csrf_token()}}'},
                      type:'post',
                      success: function(data){
                        if (data != '' || data != null) {
                            $('.getarticles').empty();
                            $('.getarticles').append(data);
                        }
                      }
                    });
                  });
                });
              </script>

              <label style="font-size:18px;">{{trans('author.articlestype')}}</label>
              <select mastercat="master" class="browser-default article">
                <option value="" selected>.....</option>
                <option value="nouvelles">{{trans('author.news')}}</option>
                <option value="apres-bac">{{trans('author.apresbac')}}</option>
              </select>
            @endif
        {!! Form::close() !!}

        <div class="getarticles">

        </div>
@endsection
@stop