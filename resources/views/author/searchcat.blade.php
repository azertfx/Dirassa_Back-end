@foreach($namecat as $categories)
  <h3>{{ $categories->{lang} }}</h3>
  {!! Form::open(['method'=>'delete','url'=>athr.'/categories/'.$categories->id]) !!}
  {!! Form::submit('',['class'=>'btn-floating waves-effect waves-light red']) !!}
  {!! Form::close() !!}
  <a href="{{url(athr.'/categories/'.$categories->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a>
  @endforeach
@if(count($allcat) > 0)
	<table class="striped">
        <thead>
          <tr>
              <th>{{trans('author.delete')}}</th>
              <th>{{trans('author.edit')}}</th>
              <th>{{trans('author.fr_name')}}</th>
              <th>{{trans('author.ar_name')}}</th>
              <th>{{trans('author.id')}}</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; ?>
          @foreach($allcat as $categories)
          <tr>
            <td class="{{trans('author.right_left')}}">
              {!! Form::open(['method'=>'delete','url'=>athr.'/categories/'.$categories->id]) !!}
              {!! Form::submit('',['class'=>'btn-floating waves-effect waves-light red']) !!}
              {!! Form::close() !!}
            </td>
            <td class="{{trans('author.right_left')}}"><a href="{{url(athr.'/categories/'.$categories->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a></td>
            <td class="{{trans('author.right_left')}}">{{$categories->fr_name}}</td>
            <td class="{{trans('author.right_left')}}">{{$categories->ar_name}}</td>
            <td class="{{trans('author.right_left')}}">{{$i}}</td>
            <?php $i++; ?>
          </tr>
          @endforeach
        </tbody>
      </table>
@else
  <h3>{{trans('author.no_content')}}</h3>
@endif