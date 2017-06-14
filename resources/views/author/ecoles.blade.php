@extends(athr.'.index')
@section('athr_content')
	<h3>{{trans('author.addecole')}}</h3>
	@include(athr.'.errors')
        {!! Form::open(['route'=>athr.'.ecoles.store']) !!}
        	<h5>{{trans('author.ecoletitle')}}</h5>
            <div class="input-field">
              <input id="fullarname" value="{{old('full_ar_name')}}" type="text" class="validate" name="full_ar_name" required>
              <label for="fullarname">{{trans('author.full_ar_name')}}</label>
            </div>
            <div class="input-field">
              <input id="resfrname" value="{{old('res_fr_name')}}" type="text" class="validate" name="res_fr_name" required>
              <label for="resfrname">{{trans('author.res_fr_name')}}</label>
            </div>
            <div class="input-field">
              <input id="fullfrname" value="{{old('full_fr_name')}}" type="text" class="validate" name="full_fr_name" required>
              <label for="fullfrname">{{trans('author.full_fr_name')}}</label>
            </div>
            <h5>{{trans('author.ville')}}</h5>
            <div class="input-field">
              <input id="ville" value="{{old('ville')}}" type="text" class="validate" name="ville" required>
              <label for="ville">{{trans('author.ville')}}</label>
            </div>
            <h5>{{trans('author.domain')}}</h5>
            <div class="input-field">
              <input id="domain" value="{{old('domain')}}" type="text" class="validate" name="domain" required>
              <label for="domain">{{trans('author.domain')}}</label>
            </div>
            <h5>{{trans('author.secteur')}}</h5>
            <select name="secteur" class="browser-default" required>
                <option value="" selected>.....</option>
                <option value="public">{{trans('author.public')}}</option>
                <option value="prive ">{{trans('author.privé')}}</option>
            </select>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
@endsection
@stop