<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.my_courses') }} - SkillUp Kazakhstan</title>
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
        <h1>{{ __('messages.my_courses') }} 📚</h1>
        <a href="/courses" class="btn-add">{{ __('messages.browse_all_courses') }}</a>
      </div>
 
      @if(session('success'))
        <div class="message success" style="margin-bottom: 24px;">✅ {{ session('success') }}</div>
      @endif
 
      @if($enrollments->isEmpty())
        <div style="text-align: center; padding: 80px 40px; background: white; border-radius: 20px; box-shadow: 0 4px 24px rgba(10,22,40,0.06);">
          <div style="font-size: 64px; margin-bottom: 20px;">🎓</div>
          <h2 style="font-family: 'Clash Display', sans-serif; font-size: 24px; font-weight: 700; color: #0a1628; margin-bottom: 12px;">{{ __('messages.my_courses_empty') }}</h2>
          <p style="color: #627d98; font-size: 15px; margin-bottom: 28px;">{{ __('messages.my_courses_empty_text') }}</p>
          <a href="/courses" style="display: inline-flex; align-items: center; gap: 8px; background: linear-gradient(135deg, #00d4aa, #00b894); color: #0a1628; font-size: 15px; font-weight: 700; padding: 12px 24px; border-radius: 10px; text-decoration: none;">{{ __('messages.browse_all_courses') }} →</a>
        </div>
      @else
        <div class="courses-grid">
          @foreach($enrollments as $enrollment)
            <div class="course-item">
              @if($enrollment->course->image)
                <img src="{{ asset('storage/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" class="course-item-image">
              @else
                <div class="course-item-image-placeholder">🎓</div>
              @endif
              <div class="course-item-body">
                <div class="course-item-meta">
                  <span class="badge badge-blue">{{ $enrollment->course->category }}</span>
                  <span class="badge badge-green">{{ $enrollment->course->level }}</span>
                  <span style="font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 100px; background: rgba(0,212,170,0.08); color: #00a882;">✓ {{ __('messages.enrolled') }}</span>
                </div>
                <h2>{{ $enrollment->course->title }}</h2>
                <p>{{ Str::limit($enrollment->course->description, 100) }}</p>
                <div class="course-item-footer">
                  <div>
                    <span class="course-price">${{ $enrollment->course->price }}</span>
                    <span class="course-duration" style="margin-left: 12px;">⏱ {{ $enrollment->course->duration }}h</span>
                  </div>
                  <form method="POST" action="/courses/{{ $enrollment->course->id }}/unenroll">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="font-size: 13px; font-weight: 600; color: #ff6b35; background: rgba(255,107,53,0.08); border: 1px solid rgba(255,107,53,0.2); padding: 6px 14px; border-radius: 8px; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,107,53,0.15)'" onmouseout="this.style.background='rgba(255,107,53,0.08)'">
                      {{ __('messages.unenroll') }}
                    </button>
                  </form>
                </div>
                <p style="font-size: 12px; color: #9fb3c8; margin-top: 12px;">{{ __('messages.enrolled_ago') }} {{ $enrollment->created_at->diffForHumans() }}</p>
              </div>
            </div>
          @endforeach
        </div>
 
        <div style="margin-top: 32px; padding: 24px 28px; background: linear-gradient(135deg, #0a1628, #1d3461); border-radius: 16px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
          <div>
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 18px; font-weight: 700; color: white; margin-bottom: 4px;">🎯 {{ __('messages.keep_learning') }}</h3>
            <p style="font-size: 14px; color: rgba(255,255,255,0.6);">{{ __('messages.keep_learning_text') }}</p>
          </div>
          <a href="/courses" style="display: inline-flex; align-items: center; gap: 8px; background: #00d4aa; color: #0a1628; font-size: 14px; font-weight: 700; padding: 10px 20px; border-radius: 10px; text-decoration: none;">{{ __('messages.explore_courses') }}</a>
        </div>
      @endif
 
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>