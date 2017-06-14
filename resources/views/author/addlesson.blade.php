@extends(athr.'.index')
@section('athr_content')
	<h3>{{trans('author.addlesson')}}</h3>
	<a href="{{url(athr.'/lessons')}}">{{trans('author.back')}}</a>
	@include(athr.'.errors')


        {!! Form::open(['route'=>athr.'.lessons.store','files'=>'true']) !!}
        	<h5>{{trans('author.round')}}</h5>
        	<p class="{{trans('author.right')}}">
	    		<input class="with-gap" value="2eme-session" name="round" type="radio" id="session2" />
	    		<label for="session2">{{trans('author.session2')}}</label>
	        	<input class="with-gap" value="1ere-session" name="round" type="radio" id="session1" checked />
	    		<label for="session1">{{trans('author.session1')}}</label>
    		</p>
    		<div class="clear"></div>
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
            <h5>{{trans('author.lessontitle')}}</h5>
            <div class="input-field">
              <input id="ar_lesson" value="{{old('ar_lesson')}}" type="text" class="validate" name="ar_lesson">
              <label for="ar_lesson">{{trans('author.ar_name')}}</label>
            </div>
            <div class="input-field">
              <input id="fr_lesson" value="{{old('fr_lesson')}}" type="text" class="validate" name="fr_lesson">
              <label for="fr_lesson">{{trans('author.fr_name')}}</label>
            </div>
            <h5>{{trans('author.pdf_lesson')}}</h5>
            <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_lesson">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_lesson">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_sommary')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_sommary">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_sommary">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_exercice')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_exercice">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_exercice">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_exercice_corr')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_exercice_corr">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_exercice_corr">
    		      </div>
    		    </div>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
@endsection
@stop