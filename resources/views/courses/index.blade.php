<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.courses') }} - SkillUp Kazakhstan</title>
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
        @else
          <li><a href="/register">{{ __('messages.register') }}</a></li>
          <li><a href="/login" class="btn-nav">{{ __('messages.login') }}</a></li>
        @endauth
      </ul>
      <div class="lang-switcher">
        <a href="/language/en">EN</a>
        <a href="/language/ru">RU</a>
        <a href="/language/kk">KK</a>
      </div>
    </div>
  </header>
 
  <section class="courses-page">
    <div class="courses-page-inner">
 
      <div class="page-header">
        <h1>{{ __('messages.courses') }}</h1>
        @can('create posts')
          <a href="/courses/create" class="btn-add">+ {{ __('messages.create_course') }}</a>
        @endcan
      </div>
 
      @if(session('success'))
        <div class="message success" style="margin-bottom: 24px;">✅ {{ session('success') }}</div>
      @endif
      @if(session('info'))
        <div style="margin-bottom: 24px; background: rgba(26,115,232,0.1); color: #1a73e8; border: 1px solid rgba(26,115,232,0.2); padding: 14px 16px; border-radius: 10px; font-weight: 600; font-size: 14px;">ℹ️ {{ session('info') }}</div>
      @endif
 
      <div class="courses-grid">
        @foreach($courses as $course)
          <div class="course-item">
            @if($course->image)
              <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-item-image">
            @else
              <div class="course-item-image-placeholder">🎓</div>
            @endif
            <div class="course-item-body">
              <div class="course-item-meta">
                <span class="badge badge-blue">{{ $course->category }}</span>
                <span class="badge badge-green">{{ $course->level }}</span>
              </div>
              <h2>{{ $course->title }}</h2>
              <p>{{ Str::limit($course->description, 100) }}</p>
              <div class="course-item-footer">
                <div>
                  <span class="course-price">${{ $course->price }}</span>
                  <span class="course-duration" style="margin-left: 12px;">⏱ {{ $course->duration }}h</span>
                </div>
                @auth
                  @if($course->isEnrolledBy(Auth::id()))
                    <div style="display: flex; align-items: center; gap: 8px;">
                      <span style="font-size: 12px; font-weight: 700; color: #00a882; background: rgba(0,212,170,0.08); padding: 4px 12px; border-radius: 100px;">✓ {{ __('messages.enrolled') }}</span>
                      <form method="POST" action="/courses/{{ $course->id }}/unenroll" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="font-size: 12px; font-weight: 600; color: #ff6b35; background: rgba(255,107,53,0.08); border: none; padding: 4px 12px; border-radius: 100px; cursor: pointer;">
                          {{ __('messages.unenroll') }}
                        </button>
                      </form>
                    </div>
                  @else
                    <form method="POST" action="/courses/{{ $course->id }}/enroll">
                      @csrf
                      <button type="submit" style="display: inline-flex; align-items: center; gap: 6px; background: linear-gradient(135deg, #00d4aa, #00b894); color: #0a1628; font-size: 13px; font-weight: 700; padding: 8px 18px; border: none; border-radius: 8px; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                        {{ __('messages.enroll_now') }}
                      </button>
                    </form>
                  @endif
                @else
                  <a href="/login" style="display: inline-flex; align-items: center; gap: 6px; background: linear-gradient(135deg, #00d4aa, #00b894); color: #0a1628; font-size: 13px; font-weight: 700; padding: 8px 18px; border-radius: 8px; text-decoration: none;">
                    {{ __('messages.login_to_enroll') }}
                  </a>
                @endauth
              </div>
            </div>
          </div>
        @endforeach
      </div>
 
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>