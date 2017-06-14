@extends(athr.'.index')
@section('athr_content')
	<h3>{{trans('author.editarticles')}}</h3>
	<a href="{{url(athr.'/articles')}}">{{trans('author.back')}}</a>
	@include(athr.'.errors')


        {!! Form::open(['method'=>'PATCH','url'=>athr.'/articles/'.$articlefind->id,'files'=>'true']) !!}
        	<h5>{{trans('author.articlestype')}}</h5>
        	<p class="{{trans('author.right')}}">
	    		<input class="with-gap" value="apres-bac" name="stat" type="radio" id="apresbac" <?php if($articlefind->stat == "apres-bac"){echo "checked";} ?> />
	    		<label for="apresbac">{{trans('author.apresbac')}}</label>
	        	<input class="with-gap" value="nouvelles" name="stat" type="radio" id="nouvelles" <?php if($articlefind->stat == "nouvelles"){echo "checked";} ?> />
	    		<label for="nouvelles">{{trans('author.news')}}</label>
    		</p>
    		<div class="clear"></div>
    		<h5>{{trans('author.articlestitle')}}</h5>
            <div class="input-field">
              <input id="artitle" value="{{$articlefind->ar_titles}}" type="text" class="validate" name="ar_title">
              <label for="artitle">{{trans('author.ar_title')}}</label>
            </div>
            <div class="input-field">
              <input id="frtitle" value="{{$articlefind->fr_titles}}" type="text" class="validate" name="fr_title">
              <label for="frtitle">{{trans('author.fr_title')}}</label>
            </div>
    		<h5>{{trans('author.articlescontent')}}</h5>
	        <div class="input-field">
	          <textarea id="arcontent" class="materialize-textarea" name="ar_contents">{{$articlefind->ar_contents}}</textarea>
	          <label for="arcontent">{{trans('author.ar_contents')}}</label>
	        </div>
    		<div class="input-field">
	          <textarea id="frcontent" class="materialize-textarea" name="fr_contents">{{$articlefind->fr_contents}}</textarea>
	          <label for="frcontent">{{trans('author.fr_contents')}}</label>
	        </div>
    		<h5>{{trans('author.articlesimage')}}</h5>
    		<div class="file-field input-field">
		      <div class="btn">
		        <span>{{trans('author.articlesimage')}}</span>
		        <input type="file" name="articlesimage">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" value="{{$articlefind->images}}" type="text" name="articlesimage">
		      </div>
		    </div>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.edit')}}</button>
        {!! Form::close() !!}
@endsection
@stop