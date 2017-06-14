<!-- contact -->
    <h2 class="title_content" id="{{ Request::path() === 'website' ? 'eee' : '' }}">للتواصل</h2>
    <span class="title_lign pink accent-2" id="{{ Request::path() === 'website' ? 'eee' : '' }}"></span>
    <div class="container" id="{{ Request::path() === 'website' ? 'eee' : '' }}">
      @include(athr.'.contacterrors')
      {!! Form::open() !!}
        <div class="row form_ins">
          <div class="col s12">
            <div class="row">
              <div class="input-field col s12 m6 l6">
                <i class="material-icons prefix left-align">account_circle</i>
                <input value="{{old('name')}}" id="name" name="name" type="text" class="validate" required>
                <label for="name">الاسم</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <i class="material-icons prefix left-align">email</i>
                <input value="{{old('email')}}" id="email" name="email" type="email" class="validate" required>
                <label for="email">الربيد الإلكتروني</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix left-align">mode_edit</i>
                <textarea value="{{old('message')}}" id="message" name="message" class="materialize-textarea" required></textarea>
                <label for="message right">الرسالة</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="waves-effect waves-light btn-large indigo btn_comm"><i class="zmdi zmdi-mail-send left"></i>إرسال</button>
      {!! Form::open() !!}
    </div><!-- /contact -->