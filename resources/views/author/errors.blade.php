@if (count($errors) > 0)
  <div class="errors">
    <h4>{{trans('author.error')}}</h4>
      <ul>
          @foreach ($errors->all() as $error)
              <li style="color:red;">{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if (session()->has('error'))
  <div class="errors">
    <h4>{{trans('author.error')}}</h4>
    <p style="color:red;">{{session()->get('error')}}</p>
  </div>
@endif

@if (session()->has('success'))
  <div class="success">
    <h4 style="color:green;">{{trans('author.success_add')}}</h4>
  </div>
@endif