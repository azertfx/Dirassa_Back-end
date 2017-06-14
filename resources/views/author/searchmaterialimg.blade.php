@if(count($find_exam) > 0)
	<table class="striped">
        <thead>
          <tr>
              <th>{{trans('author.delete')}}</th>
              <th>{{trans('author.edit')}}</th>
              <th>{{trans('author.materialimg')}}</th>
              <th>{{trans('author.pdf_exam_corr')}}</th>
              <th>{{trans('author.pdf_exam')}}</th>
              <th>{{trans('author.material')}}</th>
              <th>{{trans('author.id')}}</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; ?>
          @foreach($find_exam as $exam)
          <tr>
            <td class="{{trans('author.right_left')}}">
              {!! Form::open(['method'=>'delete','url'=>athr.'/materialimage/'.$exam->id]) !!}
              {!! Form::submit('',['class'=>'btn-floating waves-effect waves-light red']) !!}
              {!! Form::close() !!}
            </td>
            <td class="{{trans('author.right_left')}}"><a href="{{url(athr.'/materialimage/'.$exam->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a></td>
            <td class="{{trans('author.right_left')}}"><img style="width:100px;" src="{{ASSET}}/images/{{$exam->image}}" alt="{{$exam->id}}"></td>
            <td class="{{trans('author.right_left')}}"><i style="font-size: 30px;" class="large material-icons">library_books</i></td>
            <td class="{{trans('author.right_left')}}"><i style="font-size: 30px;" class="large material-icons">library_books</i></td>
            <td class="{{trans('author.right_left')}}">{{$exam->categories->ar_name}}</td>
            <td class="{{trans('author.right_left')}}">{{$i}}</td>
            <?php $i++; ?>
          </tr>
          @endforeach
        </tbody>
      </table>
@else
  <h3>{{trans('author.no_content')}}</h3>
@endif