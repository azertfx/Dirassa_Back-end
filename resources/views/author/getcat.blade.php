@if(count($allcat) > 0)
	<label style="font-size:18px;">{{trans('author.sub_cate')}}</label>
	<select name="parent" class="browser-default sub">
	@foreach($allcat as $catparent)
	<option value="{{ $catparent->parent }}" selected>.....</option>
	@endforeach
	@foreach($allcat as $master)
	  <option value="{{$master->id}}">{{ $master->{lang} }}</option>
	@endforeach
	</select>
@endif
