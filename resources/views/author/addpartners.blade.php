@extends(athr.'.index')
@section('athr_content')
  <h3>{{trans('author.addpartners')}}</h3>
  <a href="{{url(athr.'/partners')}}">{{trans('author.back')}}</a>
  @include(athr.'.errors')

  {!! Form::open(['route'=>athr.'.partners.store','files'=>'true']) !!}
      <h5>{{trans('author.partnername')}}</h5>
      <div class="input-field">
        <input id="partnername" value="{{old('partnername')}}" type="text" class="validate" name="partnername">
        <label for="partnername">{{trans('author.partnername')}}</label>
      </div>
      <h5>{{trans('author.partnerimage')}}</h5>
      <div class="file-field input-field">
        <div class="btn">
          <span>{{trans('author.partnerimage')}}</span>
          <input type="file" name="partnerimage">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" name="partnerimage">
        </div>
      </div>
      <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
  {!! Form::close() !!}
@endsection
@stop