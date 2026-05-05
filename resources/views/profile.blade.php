<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.my_profile') }} - SkillUp Kazakhstan</title>
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
 
  <section style="padding: 60px 40px; background: #f0f4f8; min-height: calc(100vh - 72px);">
    <div style="max-width: 900px; margin: 0 auto;">
 
      <!-- Profile Header -->
      <div style="background: linear-gradient(135deg, #0a1628, #1d3461); border-radius: 24px; padding: 48px; margin-bottom: 28px; display: flex; align-items: center; gap: 32px; flex-wrap: wrap;">
        <div style="width: 96px; height: 96px; background: linear-gradient(135deg, #00d4aa, #1a73e8); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: 700; color: white; flex-shrink: 0;">
          {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div style="flex: 1;">
          <h1 style="font-family: 'Clash Display', sans-serif; font-size: clamp(24px, 3vw, 36px); font-weight: 700; color: white; letter-spacing: -0.5px; margin-bottom: 8px;">{{ $user->name }}</h1>
          <p style="color: rgba(255,255,255,0.6); font-size: 15px; margin-bottom: 12px;">{{ $user->email }}</p>
          <span style="display: inline-flex; align-items: center; gap: 6px; background: rgba(0,212,170,0.15); color: #00d4aa; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 100px; letter-spacing: 0.5px; text-transform: uppercase;">
            ● {{ $user->getRoleNames()->first() ?? 'User' }}
          </span>
        </div>
        <div style="display: flex; gap: 32px; flex-wrap: wrap;">
          <div style="text-align: center;">
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 28px; font-weight: 700; color: white;">{{ $coursesCount }}</h3>
            <p style="font-size: 13px; color: rgba(255,255,255,0.5);">{{ __('messages.courses') }}</p>
          </div>
          <div style="text-align: center;">
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 18px; font-weight: 700; color: white;">{{ $user->created_at->diffForHumans() }}</h3>
            <p style="font-size: 13px; color: rgba(255,255,255,0.5);">{{ __('messages.member_since') }}</p>
          </div>
        </div>
      </div>
 
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
 
        <!-- Account Info -->
        <div style="background: white; border-radius: 20px; padding: 32px; box-shadow: 0 4px 24px rgba(10,22,40,0.06);">
          <h2 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 24px;">{{ __('messages.account_info') }}</h2>
          <div style="display: flex; flex-direction: column; gap: 16px;">
            <div style="padding: 16px; background: #f0f4f8; border-radius: 12px;">
              <p style="font-size: 12px; font-weight: 600; color: #627d98; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">{{ __('messages.full_name') }}</p>
              <p style="font-size: 15px; font-weight: 600; color: #0a1628;">{{ $user->name }}</p>
            </div>
            <div style="padding: 16px; background: #f0f4f8; border-radius: 12px;">
              <p style="font-size: 12px; font-weight: 600; color: #627d98; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">{{ __('messages.email') }}</p>
              <p style="font-size: 15px; font-weight: 600; color: #0a1628;">{{ $user->email }}</p>
            </div>
            <div style="padding: 16px; background: #f0f4f8; border-radius: 12px;">
              <p style="font-size: 12px; font-weight: 600; color: #627d98; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">{{ __('messages.role') }}</p>
              <p style="font-size: 15px; font-weight: 600; color: #0a1628;">{{ ucfirst($user->getRoleNames()->first() ?? 'User') }}</p>
            </div>
            <div style="padding: 16px; background: #f0f4f8; border-radius: 12px;">
              <p style="font-size: 12px; font-weight: 600; color: #627d98; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.5px;">{{ __('messages.member_since') }}</p>
              <p style="font-size: 15px; font-weight: 600; color: #0a1628;">{{ $user->created_at->format('d M Y') }}</p>
            </div>
          </div>
        </div>
 
        <!-- Quick Actions -->
        <div style="display: flex; flex-direction: column; gap: 16px;">
          <div style="background: white; border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(10,22,40,0.06);">
            <h2 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 20px;">{{ __('messages.quick_actions') }}</h2>
            <div style="display: flex; flex-direction: column; gap: 12px;">
              <a href="/courses" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; background: #f0f4f8; border-radius: 12px; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#e0e8f0'" onmouseout="this.style.background='#f0f4f8'">
                <span style="font-size: 20px;">📚</span>
                <span style="font-size: 14px; font-weight: 600; color: #0a1628;">{{ __('messages.courses') }}</span>
              </a>
              <a href="/my-courses" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; background: #f0f4f8; border-radius: 12px; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#e0e8f0'" onmouseout="this.style.background='#f0f4f8'">
                <span style="font-size: 20px;">🎓</span>
                <span style="font-size: 14px; font-weight: 600; color: #0a1628;">{{ __('messages.my_courses') }}</span>
              </a>
              <a href="/dashboard" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; background: #f0f4f8; border-radius: 12px; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#e0e8f0'" onmouseout="this.style.background='#f0f4f8'">
                <span style="font-size: 20px;">🏠</span>
                <span style="font-size: 14px; font-weight: 600; color: #0a1628;">{{ __('messages.dashboard') }}</span>
              </a>
              <a href="/contact" style="display: flex; align-items: center; gap: 12px; padding: 14px 16px; background: #f0f4f8; border-radius: 12px; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#e0e8f0'" onmouseout="this.style.background='#f0f4f8'">
                <span style="font-size: 20px;">💬</span>
                <span style="font-size: 14px; font-weight: 600; color: #0a1628;">{{ __('messages.contact_support') }}</span>
              </a>
            </div>
          </div>
 
          <div style="background: linear-gradient(135deg, #0a1628, #1d3461); border-radius: 20px; padding: 28px;">
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 18px; font-weight: 700; color: white; margin-bottom: 8px;">🎯 {{ __('messages.keep_learning') }}</h3>
            <p style="font-size: 14px; color: rgba(255,255,255,0.6); margin-bottom: 20px;">{{ __('messages.keep_learning_text') }}</p>
            <a href="/courses" style="display: inline-flex; align-items: center; gap: 8px; background: #00d4aa; color: #0a1628; font-size: 14px; font-weight: 700; padding: 10px 20px; border-radius: 10px; text-decoration: none;">{{ __('messages.explore_courses') }}</a>
          </div>
        </div>
 
      </div>
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>