@if(count($find_lesson) > 0)
	<table class="striped">
        <thead>
          <tr>
              <th>{{trans('author.delete')}}</th>
              <th>{{trans('author.edit')}}</th>
              <th>{{trans('author.round')}}</th>
              <th>{{trans('author.fr_name')}}</th>
              <th>{{trans('author.ar_name')}}</th>
              <th>{{trans('author.id')}}</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; ?>
          @foreach($find_lesson as $lesson)
          <tr>
            <td class="{{trans('author.right_left')}}">
              {!! Form::open(['method'=>'delete','url'=>athr.'/lessons/'.$lesson->id]) !!}
              {!! Form::submit('',['class'=>'btn-floating waves-effect waves-light red']) !!}
              {!! Form::close() !!}
            </td>
            <td class="{{trans('author.right_left')}}"><a href="{{url(athr.'/lessons/'.$lesson->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a></td>
            <td class="{{trans('author.right_left')}}">{{$lesson->round}}</td>
            <td class="{{trans('author.right_left')}}">{{$lesson->fr_title}}</td>
            <td class="{{trans('author.right_left')}}">{{$lesson->ar_title}}</td>
            <td class="{{trans('author.right_left')}}">{{$i}}</td>
            <?php $i++; ?>
          </tr>
          @endforeach
        </tbody>
      </table>
@else
  <h3>{{trans('author.no_content')}}</h3>
@endif