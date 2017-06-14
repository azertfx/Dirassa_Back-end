@if (count($errors) > 0)
  <div class="errors">
    @foreach ($errors->all() as $error)
        <p class="errorsinsc">{{ $error }}</p>
    @endforeach
  </div>
@endif

@if (session()->has('error'))
  <div class="errors">
    <p style="color:red;">{{session()->get('error')}}</p>
  </div>
@endif

@if (session()->has('success'))
  <div class="success">
    <p class="successinsc">{{trans('accueil.success_insc')}}</p>
  </div>
@endif