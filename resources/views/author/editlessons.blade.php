@extends(athr.'.index')
@section('athr_content')
	<h3>{{trans('author.editlessons')}}</h3>
	<a href="{{url(athr.'/lessons')}}">{{trans('author.back')}}</a>
	@include(athr.'.errors')

        {!! Form::open(['method'=>'PATCH','url'=>athr.'/lessons/'.$lessonfind->id,'files'=>'true']) !!}
        	<h5>{{trans('author.round')}}</h5>
        	<p class="{{trans('author.right')}}">
	    		<input class="with-gap" value="2eme-session" name="round" type="radio" id="session2" <?php if($lessonfind->round == "2eme-session"){echo "checked";} ?> />
	    		<label for="session2">{{trans('author.session2')}}</label>
	        	<input class="with-gap" value="1ere-session" name="round" type="radio" id="session1" <?php if($lessonfind->round == "1ere-session"){echo "checked";} ?> />
	    		<label for="session1">{{trans('author.session1')}}</label>
    		</p>
    		<div class="clear"></div>
            <input type="hidden" value="{{$lessonfind->categories->id}}" name="parent">
            <h5>{{trans('author.material')}}</h5>
            <h6>{{$lessonfind->categories->ar_name}}</h6>
            <h5>{{trans('author.lessontitle')}}</h5>
            <div class="input-field">
              <input id="ar_lesson" value="{{$lessonfind->ar_title}}" type="text" class="validate" name="ar_lesson">
              <label for="ar_lesson">{{trans('author.ar_name')}}</label>
            </div>
            <div class="input-field">
              <input id="fr_lesson" value="{{$lessonfind->fr_title}}" type="text" class="validate" name="fr_lesson">
              <label for="fr_lesson">{{trans('author.fr_name')}}</label>
            </div>
            <h5>{{trans('author.pdf_lesson')}}</h5>
            <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_lesson">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_lesson" value="{{$lessonfind->lesson_pdf}}">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_sommary')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_sommary">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_sommary" value="{{$lessonfind->sommary_pdf}}">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_exercice')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_exercice">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_exercice" value="{{$lessonfind->exercice_pdf}}">
    		      </div>
    		    </div>
    		    <h5>{{trans('author.pdf_exercice_corr')}}</h5>
                <div class="file-field input-field">
    		      <div class="btn">
    		        <span>{{trans('author.choice')}}</span>
    		        <input type="file" name="pdf_exercice_corr">
    		      </div>
    		      <div class="file-path-wrapper">
    		        <input class="file-path validate" type="text" name="pdf_exercice_corr" value="{{$lessonfind->exercice_corr_pdf}}">
    		      </div>
    		    </div>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
@endsection
@stop