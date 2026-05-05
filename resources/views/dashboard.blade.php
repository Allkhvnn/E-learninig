<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.dashboard') }} - SkillUp Kazakhstan</title>
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
 
  <section class="dashboard-section">
    <div class="dashboard-inner">
 
      <div style="background: linear-gradient(135deg, #0a1628 0%, #1d3461 100%); border-radius: 24px; padding: 40px 48px; margin-bottom: 32px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px; position: relative; overflow: hidden;">
        <div style="position: absolute; width: 300px; height: 300px; background: radial-gradient(circle, rgba(0,212,170,0.12) 0%, transparent 70%); top: -100px; right: -50px; border-radius: 50%;"></div>
        <div style="position: relative; z-index: 1;">
          <p style="color: rgba(255,255,255,0.6); font-size: 14px; margin-bottom: 8px;">{{ now()->format('l, d F Y') }}</p>
          <h1 style="font-family: 'Clash Display', sans-serif; font-size: clamp(24px, 3vw, 36px); font-weight: 700; color: white; letter-spacing: -0.5px; margin-bottom: 12px;">{{ __('messages.welcome') }}, {{ Auth::user()->name }}! 👋</h1>
          <span style="display: inline-flex; align-items: center; gap: 6px; background: rgba(0,212,170,0.15); color: #00d4aa; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 100px; letter-spacing: 0.5px; text-transform: uppercase;">● {{ Auth::user()->getRoleNames()->first() }}</span>
        </div>
        <div style="display: flex; gap: 24px; position: relative; z-index: 1;">
          <div style="text-align: center; padding: 20px 28px; background: rgba(255,255,255,0.06); border-radius: 16px; border: 1px solid rgba(255,255,255,0.08);">
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 28px; font-weight: 700; color: white;">120+</h3>
            <p style="font-size: 12px; color: rgba(255,255,255,0.5); margin-top: 4px;">{{ __('messages.courses') }}</p>
          </div>
          <div style="text-align: center; padding: 20px 28px; background: rgba(255,255,255,0.06); border-radius: 16px; border: 1px solid rgba(255,255,255,0.08);">
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 28px; font-weight: 700; color: #00d4aa;">5K+</h3>
            <p style="font-size: 12px; color: rgba(255,255,255,0.5); margin-top: 4px;">{{ __('messages.students') }}</p>
          </div>
        </div>
      </div>
 
      <div class="dashboard-grid">
 
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(26,115,232,0.1);">📚</div>
          <h3>{{ __('messages.courses') }}</h3>
          <p>{{ __('messages.browse_courses') }}</p>
          <a href="/courses">{{ __('messages.view_all_courses') }} →</a>
        </div>
 
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(0,212,170,0.1);">🎓</div>
          <h3>{{ __('messages.my_courses') }}</h3>
          <p>{{ __('messages.my_courses_text') }}</p>
          <a href="/my-courses">{{ __('messages.my_courses') }} →</a>
        </div>
 
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(77,159,255,0.1);">👤</div>
          <h3>{{ __('messages.my_profile') }}</h3>
          <p>{{ __('messages.my_profile_text') }}</p>
          <a href="/profile">{{ __('messages.my_profile') }} →</a>
        </div>
 
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(245,200,66,0.1);">ℹ️</div>
          <h3>{{ __('messages.about_us') }}</h3>
          <p>{{ __('messages.about_us_text') }}</p>
          <a href="/about">{{ __('messages.about_us') }} →</a>
        </div>
 
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(255,107,53,0.1);">💬</div>
          <h3>{{ __('messages.contact_us') }}</h3>
          <p>{{ __('messages.contact_text') }}</p>
          <a href="/contact">{{ __('messages.contact_us') }} →</a>
        </div>
 
        @role('super-admin')
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(245,200,66,0.1);">⚙️</div>
          <h3>{{ __('messages.settings') }}</h3>
          <p>{{ __('messages.settings_text') }}</p>
          <a href="/admin/settings">{{ __('messages.settings') }} →</a>
        </div>
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(255,107,53,0.1);">🛡️</div>
          <h3>{{ __('messages.manage_roles') }}</h3>
          <p>{{ __('messages.manage_roles_text') }}</p>
          <a href="/admin/roles">{{ __('messages.manage_roles') }} →</a>
        </div>
        @endrole
 
        @role('admin')
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(0,212,170,0.1);">👥</div>
          <h3>{{ __('messages.manage_users') }}</h3>
          <p>{{ __('messages.manage_users_text') }}</p>
          <a href="/admin/users">{{ __('messages.manage_users') }} →</a>
        </div>
        @endrole
 
        @can('create posts')
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(77,159,255,0.1);">✏️</div>
          <h3>{{ __('messages.content') }}</h3>
          <p>{{ __('messages.content_text') }}</p>
          <a href="/posts/create">{{ __('messages.create_post') }} →</a>
        </div>
        <div class="dashboard-card">
          <div class="dashboard-card-icon" style="background: rgba(26,115,232,0.1);">➕</div>
          <h3>{{ __('messages.create_course') }}</h3>
          <p>{{ __('messages.create_course_text') }}</p>
          <a href="/courses/create">{{ __('messages.create_course') }} →</a>
        </div>
        @endcan
 
      </div>
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>
 