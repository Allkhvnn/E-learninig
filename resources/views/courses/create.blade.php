<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.create_course') }} - SkillUp Kazakhstan</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
 
  <header>
    <div class="navbar">
      <h2 class="logo">SkillUp <span>KZ</span></h2>
      <ul class="nav-links">
        <li><a href="/">{{ __('messages.home') }}</a></li>
        <li><a href="/courses">{{ __('messages.courses') }}</a></li>
        <li><a href="/about">{{ __('messages.about_us') }}</a></li>
        <li><a href="/contact">{{ __('messages.contact_us') }}</a></li>
        @auth
          <li><a href="/dashboard">{{ __('messages.dashboard') }}</a></li>
          <li><a href="/profile">{{ __('messages.my_profile') }}</a></li>
          <li>
            <form method="POST" action="/logout" style="display:inline">
              @csrf
              <button type="submit" style="background:none;border:none;color:rgba(255,255,255,0.75);cursor:pointer;font-size:14px;font-family:inherit;font-weight:500;padding:8px 16px;border-radius:8px;" onmouseover="this.style.background='rgba(255,255,255,0.08)'" onmouseout="this.style.background='none'">
                {{ __('messages.logout') }}
              </button>
            </form>
          </li>
        @endauth
      </ul>
      <div class="lang-switcher">
        <a href="/language/en">EN</a>
        <a href="/language/ru">RU</a>
        <a href="/language/kk">KK</a>
      </div>
    </div>
  </header>
 
  <section class="create-course-section">
    <div class="create-course-inner">
      <div class="create-course-card">
        <h1>{{ __('messages.create_course') }}</h1>
        <p>{{ __('messages.create_course_subtitle') }}</p>
 
        @if(session('success'))
          <div class="message success">✅ {{ __('messages.course_created') }}</div>
        @endif
 
        @if($errors->any())
          <div class="message error">
            @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif
 
        <form action="/courses" method="POST" enctype="multipart/form-data">
          @csrf
 
          <div class="form-group-light">
            <label>{{ __('messages.title') }}</label>
            <input type="text" name="title" placeholder="e.g. Advanced JavaScript" required value="{{ old('title') }}">
          </div>
 
          <div class="form-group-light">
            <label>{{ __('messages.description') }}</label>
            <textarea name="description" placeholder="Describe what students will learn...">{{ old('description') }}</textarea>
          </div>
 
          <div class="form-row">
            <div class="form-group-light">
              <label>{{ __('messages.category') }}</label>
              <input type="text" name="category" placeholder="e.g. Programming" value="{{ old('category') }}">
            </div>
            <div class="form-group-light">
              <label>{{ __('messages.level') }}</label>
              <select name="level">
                <option value="Beginner">{{ __('messages.level_beginner') }}</option>
                <option value="Intermediate">{{ __('messages.level_intermediate') }}</option>
                <option value="Advanced">{{ __('messages.level_advanced') }}</option>
              </select>
            </div>
          </div>
 
          <div class="form-row">
            <div class="form-group-light">
              <label>{{ __('messages.duration') }}</label>
              <input type="number" name="duration" placeholder="e.g. 24" value="{{ old('duration') }}">
            </div>
            <div class="form-group-light">
              <label>{{ __('messages.price') }}</label>
              <input type="number" step="0.01" name="price" placeholder="e.g. 49.99" value="{{ old('price') }}">
            </div>
          </div>
 
          <div class="form-group-light">
            <label>{{ __('messages.image') }}</label>
            <div class="file-upload-area">
              <p>📁 {{ __('messages.upload_image') }}</p>
              <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
            </div>
          </div>
 
          <button type="submit" class="btn-submit">{{ __('messages.create') }} →</button>
        </form>
      </div>
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>