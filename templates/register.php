<form class="form" action="index.html" method="post">
            <div class="form__row">
              <label class="form__label" for="email">E-mail <sup>*</sup></label>

              <input class="form__input form__input--error" type="text" name="email" id="email" value="" placeholder="Введите e-mail">

              <p class="form__message">E-mail введён некорректно</p>
            </div>

            <div class="form__row">
              <label class="form__label" for="password">Пароль <sup>*</sup></label>

              <input class="form__input" type="password" name="password" id="password" value="" placeholder="Введите пароль">
            </div>

            <div class="form__row">
              <label class="form__label" for="name">Имя <sup>*</sup></label>

              <input class="form__input" type="text" name="name" id="name" value="" placeholder="Введите имя">
            </div>

            <div class="form__row form__row--controls">
              <p class="error-massage">Пожалуйста, исправьте ошибки в форме</p>

              <input class="button" type="submit" name="" value="Зарегистрироваться">
            </div>
 </form>