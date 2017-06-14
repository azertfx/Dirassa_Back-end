@if (count($errors) > 0)
  <div class="senderrors">
    @foreach ($errors->all() as $error)
        <p class="errorssend">{{ $error }}</p>
    @endforeach
  </div>
@endif

@if (session()->has('error'))
  <div class="senderrors">
    <p style="color:red;">{{session()->get('error')}}</p>
  </div>
@endif

@if (session()->has('success'))
  <div class="sendsuccess">
    <p class="successsend">{{trans('accueil.success_insc')}}</p>
  </div>
@endif