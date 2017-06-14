@extends(athr.'.index')
@section('athr_content')
	<h3>{{ trans('author.addimage') }}</h3>
	<a href="{{url(athr.'/materialimage')}}">{{trans('author.back')}}</a>
	@include(athr.'.errors')


        {!! Form::open(['route'=>athr.'.materialimage.store','files'=>'true']) !!}
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

              <label style="font-size:18px;">{{trans('author.choicematerial')}}</label>
              <select name="parent" mastercat="master" class="browser-default sub">
                <option value="" selected>.....</option>
                @foreach($allmaster as $master)
                  <option value="{{$master->id}}">{{ $master->{lang} }}</option>
                @endforeach
              </select>

              <div class="getsub">

              </div>
            @endif
		    <h5>{{trans('author.materialimg')}}</h5>
            <div class="file-field input-field">
		      <div class="btn">
		        <span>{{trans('author.choice')}}</span>
		        <input type="file" name="material_img">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text" name="material_img">
		      </div>
		    </div>
		    <h5>{{trans('author.pdf_exam')}}</h5>
            <div class="file-field input-field">
		      <div class="btn">
		        <span>{{trans('author.choice')}}</span>
		        <input type="file" name="pdf_exam">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text" name="pdf_exam">
		      </div>
		    </div>
		    <h5>{{trans('author.pdf_exam_corr')}}</h5>
            <div class="file-field input-field">
		      <div class="btn">
		        <span>{{trans('author.choice')}}</span>
		        <input type="file" name="pdf_exam_corr">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text" name="pdf_exam_corr">
		      </div>
		    </div>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
@endsection
@stop