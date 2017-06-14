<!-- inscription slide -->
    <div class="ins_reg">
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="{{ASSET}}/images/2.jpg" alt="slide image"> <!-- random image -->
            <div class="container">
              <div class="caption register_box reg_effect" data-animsition-in="fade-in-up-lg" data-animsition-in-duration="1500" data-animsition-out="fade-out-up-lg" data-animsition-out-duration="800" >
                <div class="row ma_top">
                  <div class="col s12 m12 l6 right">
                    <div class="card-panel white">
                      <div class="row m_bot">
                        <div class="col s12">
                          <span class="text_color">سجل الآن في موقع دراسة.ما</span>
                        </div>
                        @include(athr.'.inscerrors')
                        {!! Form::open() !!}
                          <div class="col s12 form_ins">
                            <div class="row">
                              <div class="input-field col s12">
                                <i class="material-icons prefix left-align gray_color">account_circle</i>
                                <input value="{{old('username')}}" name="username" id="username" type="text" class="validate gray_color" required>
                                <label for="username">الإسم</label>
                              </div>
                              <div class="input-field col s12">
                                <i class="material-icons prefix left-align gray_color">email</i>
                                <input value="{{old('email')}}" name="email" id="email" type="email" class="validate gray_color" required>
                                <label for="email">البريد الالكتروني</label>
                              </div>
                            </div>
                          </div>
                          <div class="col s12">
                            <div class="row">
                              <div class="col s3 left-align lien_cancel">
                                <button style="border: none;background: transparent none;margin-top: 30px;color: rgb(162, 162, 162);" type="reset">إلغاء</button>
                              </div>
                              <div class="col s9">
                                <button type="submit" class="waves-effect waves-light btn-large indigo"><i class="material-icons right">perm_identity</i>التسجيل</button>
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
          </li>
        </ul>
      </div>
    </div><!-- /inscription slide -->
    <hr class="lign_shadow ins_sha">