@extends(athr.'.index')
@section('athr_content')
      {{trans('author.newcategories')}}
      <a href="{{url(athr.'/categories')}}">{{trans('author.back')}}</a>

      @include(athr.'.errors')


        {!! Form::open(['route'=>athr.'.categories.store']) !!}
            <div class="input-field">
              <input id="ar_name" value="{{old('ar_name')}}" type="text" class="validate" name="ar_name">
              <label for="ar_name">{{trans('author.ar_name')}}</label>
            </div>
            <div class="input-field">
              <input id="fr_name" value="{{old('fr_name')}}" type="tel" class="validate" name="fr_name">
              <label for="fr_name">{{trans('author.fr_name')}}</label>
            </div>
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
                  });
                });
              </script>

              <label style="font-size:18px;">{{trans('author.sub_cate')}}</label>
              <select name="parent" mastercat="master" class="browser-default sub">
                <option value="" selected>.....</option>
                @foreach($allmaster as $master)
                  <option value="{{$master->id}}">{{ $master->{lang} }}</option>
                @endforeach
              </select>

              <div class="getsub">

              </div>
            @endif
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
        
@endsection
@stop