@include(proj.'.header')
@include(proj.'.menu')
<!--   quiz  -->
    <div class="container test_height">
      <h2 class="title_content">الحال</h2>
      <span class="title_lign pink accent-2"></span>
      <div class="result_platform z-depth-1">
        <h1>الوقت المستغرق</h1>
        <div class="span_time">
          <span class="span1"></span><span class="span2"></span><span class="span3"></span><span class="span4"></span>
        </div>
        <div class="row">
          <div class="col s12 m4 hide_in_s">
              <h2>الأجوبة الخاطئة</h2>
              <span class="false_rep"></span>
          </div>
          <div class="col s12 m4">
              <h2>الأجوبة الصحيحة</h2>
              <span class="true_rep"></span>
          </div>
          <div class="col s12 m4">
              <h2>المستوى</h2>
              <span class="result_fin"></span>
          </div>
        </div>
        <a class="waves-effect waves-light btn-large pink accent-2" id="again_btn">مجددا</a>
      </div>
      <div class="result_quiz">
        <a class="waves-effect waves-light btn-large pink accent-2" id="result_btn">النتائج</a>
      </div>
      <div class="start_quiz">
        <a class="waves-effect waves-light btn-large pink accent-2" id="start_btn">إبدأ</a>
      </div>
      <form id="quiz" action="#">
        <div class="time_up left">
          <label id="minutes">00</label>:<label id="seconds">00</label>
        </div>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst1" type="radio" id="sh1" value="1"/>
                  <label for="sh1">جوابا لكيف لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst1" type="radio" id="sh2" value="0"/>
                  <label for="sh2">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst1" type="radio" id="sh3" value="0"/>
                  <label for="sh3">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst1" type="radio" id="sh4" value="0"/>
                  <label for="sh4">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>: الحال جملة</p>
                <p>
                  <input class="with-gap" name="qst2" type="radio" id="sh5" value="0"/>
                  <label for="sh5">هو ما جاء علي صورة كلمة واحدة منصوبة</label>
                </p>
                <p>
                  <input class="with-gap" name="qst2" type="radio" id="sh6" value="0"/>
                  <label for="sh6">هو ما جاء علي صورة جملة اسمية </label>
                </p>
                <p>
                  <input class="with-gap" name="qst2" type="radio" id="sh7" value="1"/>
                  <label for="sh7">هو ما جاء علي صورة جملة فعلية -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst2" type="radio" id="sh8" value="0"/>
                  <label for="sh8">هو ما جاء علي صورة جملة اسمية أو فعلية</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>: الحال</p>
                <p>
                  <input class="with-gap" name="qst3" type="radio" id="sh9" value="0"/>
                  <label for="sh9">وصف مرفوع يأتي جوابا لكيف </label>
                </p>
                <p>
                  <input class="with-gap" name="qst3" type="radio" id="sh10" value="1"/>
                  <label for="sh10">وصف لا يمكن الاستغناء عنه -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst3" type="radio" id="sh11" value="0"/>
                  <label for="sh11"> وصف  منصوب يأتي جوابا " لماذا " </label>
                </p>
                <p>
                  <input class="with-gap" name="qst3" type="radio" id="sh12" value="0"/>
                  <label for="sh12">وصف منصوب يقع في جواب كيف </label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst4" type="radio" id="sh13" value="0"/>
                  <label for="sh13">جوابا لكيف لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst4" type="radio" id="sh14" value="0"/>
                  <label for="sh14">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst4" type="radio" id="sh15" value="1"/>
                  <label for="sh15">مرفوعا لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst4" type="radio" id="sh16" value="0"/>
                  <label for="sh16">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst5" type="radio" id="sh17" value="0"/>
                  <label for="sh17">جوابا لكيف لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst5" type="radio" id="sh18" value="0"/>
                  <label for="sh18">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst5" type="radio" id="sh19" value="0"/>
                  <label for="sh19">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst5" type="radio" id="sh20" value="1"/>
                  <label for="sh20">مجرورا لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst6" type="radio" id="sh21" value="1"/>
                  <label for="sh21">جوابا لكيف لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst6" type="radio" id="sh22" value="0"/>
                  <label for="sh22">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst6" type="radio" id="sh23" value="0"/>
                  <label for="sh23">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst6" type="radio" id="sh24" value="0"/>
                  <label for="sh24">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst7" type="radio" id="sh25" value="0"/>
                  <label for="sh25">جوابا لكيف لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst7" type="radio" id="sh26" value="1"/>
                  <label for="sh26">سؤالا لجواب طرح من طرف المتكلم -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst7" type="radio" id="sh27" value="0"/>
                  <label for="sh27">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst7" type="radio" id="sh28" value="0"/>
                  <label for="sh28">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst8" type="radio" id="sh29" value="1"/>
                  <label for="sh29">جوابا لكيف لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst8" type="radio" id="sh30" value="0"/>
                  <label for="sh30">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst8" type="radio" id="sh31" value="0"/>
                  <label for="sh31">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst8" type="radio" id="sh32" value="0"/>
                  <label for="sh32">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst9" type="radio" id="sh33" value="0"/>
                  <label for="sh33">جوابا لكيف لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst9" type="radio" id="sh34" value="1"/>
                  <label for="sh34">سؤالا لجواب طرح من طرف المتكلم -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst9" type="radio" id="sh35" value="0"/>
                  <label for="sh35">مرفوعا لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst9" type="radio" id="sh36" value="0"/>
                  <label for="sh36">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
        <h3></h3>
        <section>
            <div>
              <p>كيف يأتي الحال؟</p>
                <p>
                  <input class="with-gap" name="qst10" type="radio" id="sh37" value="0"/>
                  <label for="sh37">جوابا لكيف لبيان هيئة صاحب الحال</label>
                </p>
                <p>
                  <input class="with-gap" name="qst10" type="radio" id="sh38" value="0"/>
                  <label for="sh38">سؤالا لجواب طرح من طرف المتكلم</label>
                </p>
                <p>
                  <input class="with-gap" name="qst10" type="radio" id="sh39" value="1"/>
                  <label for="sh39">مرفوعا لبيان هيئة صاحب الحال -------- صحيح</label>
                </p>
                <p>
                  <input class="with-gap" name="qst10" type="radio" id="sh40" value="0"/>
                  <label for="sh40">مجرورا لبيان هيئة صاحب الحال</label>
                </p>
            </div>
        </section>
      </div>
    </form><!--   /quiz  -->
@include(proj.'.slide_post')
@include(proj.'.footer')