@extends(athr.'.index')
@section('athr_content')
	<a href="{{url(athr.'/partners/create')}}" class="add_btn left">{{trans('author.addpartners')}}</a>
	<h3>{{trans('author.partners')}}</h3>
	@if(count($allpartners) > 0)
		<table class="striped">
	        <thead>
	          <tr>
	              <th>{{trans('author.delete')}}</th>
	              <th>{{trans('author.edit')}}</th>
	              <th>{{trans('author.partnerimage')}}</th>
	              <th>{{trans('author.partnername')}}</th>
	              <th>{{trans('author.id')}}</th>
	          </tr>
	        </thead>

	        <tbody>
	          <?php $i = 1; ?>
	          @foreach($allpartners as $partners)
	          <tr>
	            <td class="{{trans('author.right_left')}}">
	              {!! Form::open(['method'=>'delete','url'=>athr.'/partners/'.$partners->id]) !!}
              {!! Form::submit('',['style'=>'border-radius:50%;height:40px;width:40px;background:red;']) !!}
              {!! Form::close() !!}
	            </td>
	            <td class="{{trans('author.right_left')}}"><a href="{{url(athr.'/partners/'.$partners->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a></td>
	            <td class="{{trans('author.right_left')}}"><img style="width:100px;" src="{{ASSET}}/images/{{$partners->logo}}"</td>
	            <td class="{{trans('author.right_left')}}">{{$partners->name}}</td>
	            <td class="{{trans('author.right_left')}}">{{$i}}</td>
	            <?php $i++; ?>
	          </tr>
	          @endforeach
	        </tbody>
	    </table>
	@else
	  <h3>{{trans('author.no_content')}}</h3>
	@endif
@endsection
@stop