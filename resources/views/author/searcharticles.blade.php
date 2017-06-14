@if(count($allarticles) > 0)
  <table class="striped">
        <thead>
          <tr>
              <th>{{trans('author.delete')}}</th>
              <th>{{trans('author.edit')}}</th>
              <th>{{trans('author.articlesimage')}}</th>
              <th>{{trans('author.articlestype')}}</th>
              <th>{{trans('author.fr_title')}}</th>
              <th>{{trans('author.ar_title')}}</th>
              <th>{{trans('author.id')}}</th>
          </tr>
        </thead>

        <tbody>
          <?php $i = 1; ?>
          @foreach($allarticles as $articles)
          <tr>
            <td class="{{trans('author.right_left')}}">
              {!! Form::open(['method'=>'delete','url'=>athr.'/articles/'.$articles->id]) !!}
              {!! Form::submit('',['class'=>'btn-floating waves-effect waves-light red']) !!}
              {!! Form::close() !!}
            </td>
            <td class="{{trans('author.right_left')}}"><a href="{{url(athr.'/articles/'.$articles->id.'/edit')}}" class="btn-floating waves-effect waves-light green"><i class="material-icons">settings</i></a></td>
            <td class="{{trans('author.right_left')}}"><img style="width:100px;" src="{{ASSET}}/images/{{$articles->images}}" alt="{{$articles->ar_titles}}"></td>
            <td class="{{trans('author.right_left')}}">{{$articles->stat}}</td>
            <td class="{{trans('author.right_left')}}">{{$articles->fr_titles}}</td>
            <td class="{{trans('author.right_left')}}">{{$articles->ar_titles}}</td>
            <td class="{{trans('author.right_left')}}">{{$i}}</td>
            <?php $i++; ?>
          </tr>
          @endforeach
        </tbody>
      </table>
@else
  <h3>{{trans('author.no_content')}}</h3>
@endif