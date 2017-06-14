@extends(athr.'.index')
@section('athr_content')
      <span class="athr_title">{{trans('author.categories')}}</span>

      <a href="{{url(athr.'/categories/create')}}" class="add_btn left">{{trans('author.addcategories')}}</a>

      {!! Form::open(['route'=>athr.'.categories.store']) !!}

            @if($countmaster > 0)

              <script type="text/javascript">
                $(document).ready(function(){
                  $(document).on('change','.sub',function(){
                    var id = $(this).val();
                    var master = $(this).attr('mastercat');
                    $.ajax({
                      url:'{{url(athr."/categories/getcat")}}',
                      dataType:'json',
                      data:{id:id,'_token':'{{csrf_token()}}'},
                      type:'post',
                      success: function(data){

                        if (data != '' || data != null) {
                          if (master == 'master') {
                            $('.getsub').empty();
                          }
                            $('.getsub').append(data);
                        }
                      }
                    });
                    $.ajax({
                      url:'{{url(athr."/categories/searchcat")}}',
                      dataType:'json',
                      data:{id:id,'_token':'{{csrf_token()}}'},
                      type:'post',
                      success: function(data){

                        if (data != '' || data != null) {
                            $('.getsearch').empty();
                            $('.getsearch').append(data);
                        }
                      }
                    });
                  });
                });
              </script>

              <label style="font-size:18px;">{{trans('author.parent_cate')}}</label>
              <select name="parent" mastercat="master" class="browser-default sub">
                <option value="" selected>.....</option>
                @foreach($allmaster as $master)
                  <option value="{{$master->id}}">{{ $master->{lang} }}</option>
                @endforeach
              </select>

              <div class="getsub">

              </div>
              <div class="selected_cate"></div>
            @endif
        {!! Form::close() !!}

        <div class="getsearch">

        </div>

@endsection
@stop