<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.register') }} - SkillUp Kazakhstan</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
 
  <header>
    <div class="navbar">
      <h2 class="logo">SkillUp <span>KZ</span></h2>
      <ul class="nav-links">
        <li><a href="/">{{ __('messages.home') }}</a></li>
        <li><a href="/register">{{ __('messages.register') }}</a></li>
        <li><a href="/login" class="btn-nav">{{ __('messages.login') }}</a></li>
      </ul>
      <div class="lang-switcher">
        <a href="/language/en">EN</a>
        <a href="/language/ru">RU</a>
        <a href="/language/kk">KK</a>
      </div>
    </div>
  </header>
 
  <section class="form-section">
    <div class="form-card">
      <h2>{{ __('messages.registration_form') }}</h2>
      <p>{{ __('messages.create_account') }}</p>
 
      <form method="POST" action="/register">
        @csrf
        <div class="form-group">
          <label>{{ __('messages.full_name') }}</label>
          <input type="text" name="name" placeholder="{{ __('messages.full_name') }}" required>
        </div>
        <div class="form-group">
          <label>{{ __('messages.email') }}</label>
          <input type="email" name="email" placeholder="{{ __('messages.email') }}" required>
        </div>
        <div class="form-group">
          <label>{{ __('messages.password') }}</label>
          <input type="password" name="password" placeholder="{{ __('messages.password') }}" required>
        </div>
        <div class="form-group">
          <label>{{ __('messages.confirm_password') }}</label>
          <input type="password" name="password_confirmation" placeholder="{{ __('messages.confirm_password') }}" required>
        </div>
        <button type="submit" class="form-btn">{{ __('messages.register') }}</button>
      </form>
 
      @if($errors->any())
        <div class="message error">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
 
      <div class="form-link">
        {{ __('messages.have_account') }} <a href="/login">{{ __('messages.login') }}</a>
      </div>
    </div>
  </section>
 
</body>
</html>