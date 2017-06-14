@include(proj.'.header')
<div style="position: fixed;width: 100%;height: 100%;padding-top: 60px;">
  <div class="container">
    <div class="container">
      <div class="container">
        @include(athr.'.errors')
        <div style="margin-top:140px;" class="caption register_box reg_effect" data-animsition-in="fade-in-up-lg" data-animsition-in-duration="1500" data-animsition-out="fade-out-up-lg" data-animsition-out-duration="800" >
          <div class="card-panel white">
            <div class="row m_bot">
              <div style="text-align:center;" class="col s12">
                <img src="{{ASSET}}/images/logo_v2.png" alt="logo dirassa">
              </div>
              {!! Form::open() !!}
                <div class="col s12 form_ins">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix left-align gray_color">account_circle</i>
                      <input value="{{old('email')}}" id="email" type="email" name="email" class="validate gray_color" required>
                      <label for="email">البريد الإلكتروني</label>
                    </div>
                    <div class="input-field col s12">
                      <i class="material-icons prefix left-align gray_color">lock_outline</i>
                      <input value="{{old('password')}}" id="password" name="password" type="password" class="validate gray_color" required>
                      <label for="password">كلمة السر</label>
                    </div>
                  </div>
                </div>
                <div class="col s12">
                  <div class="row">
                    <div class="col s3 left-align lien_cancel">
                      <button style="border: none;background: transparent none;margin-top: 30px;color: rgb(162, 162, 162);" type="reset">إلغاء</button>
                    </div>
                    <div class="col s9">
                      <button type="submit" class="waves-effect waves-light btn-large indigo"><i class="material-icons right">perm_identity</i>الدخول</button>
                    </div>
                  </div>  
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include(proj.'.footer_script')