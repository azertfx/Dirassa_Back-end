@extends(athr.'.index')
@section('athr_content')
	<h3>{{trans('author.editmaterialimg')}}</h3>
	<a href="{{url(athr.'/materialimage')}}">{{trans('author.back')}}</a>
	@include(athr.'.errors')

        {!! Form::open(['method'=>'PATCH','url'=>athr.'/materialimage/'.$examfind->id,'files'=>'true']) !!}
            <input type="hidden" value="{{$examfind->categories->id}}" name="parent">
            <h5>{{trans('author.material')}}</h5>
            <h6>{{$examfind->categories->ar_name}}</h6>
            <h5>{{trans('author.materialimg')}}</h5>
            <div class="file-field input-field">
              <div class="btn">
                <span>{{trans('author.choice')}}</span>
                <input type="file" name="material_img">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" value="{{$examfind->image}}" type="text" name="material_img">
              </div>
            </div>
            <h5>{{trans('author.pdf_exam')}}</h5>
            <div class="file-field input-field">
              <div class="btn">
                <span>{{trans('author.choice')}}</span>
                <input type="file" name="pdf_exam">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" value="{{$examfind->exam_pdf}}" type="text" name="pdf_exam">
              </div>
            </div>
            <h5>{{trans('author.pdf_exam_corr')}}</h5>
            <div class="file-field input-field">
              <div class="btn">
                <span>{{trans('author.choice')}}</span>
                <input type="file" name="pdf_exam_corr">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" value="{{$examfind->exam_corr_pdf}}" type="text" name="pdf_exam_corr">
              </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn">{{trans('author.add')}}</button>
        {!! Form::close() !!}
@endsection
@stop