<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.about_us') }} - SkillUp Kazakhstan</title>
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
 
  <!-- HERO -->
  <section style="background: linear-gradient(135deg, #0a1628 0%, #112240 100%); padding: 100px 40px; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; width: 500px; height: 500px; background: radial-gradient(circle, rgba(0,212,170,0.1) 0%, transparent 70%); top: -100px; right: -100px; border-radius: 50%;"></div>
    <div style="max-width: 700px; margin: 0 auto; position: relative; z-index: 1;">
      <span style="display: inline-block; background: rgba(0,212,170,0.12); color: #00d4aa; font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; padding: 6px 16px; border-radius: 100px; margin-bottom: 24px;">{{ __('messages.about_us') }}</span>
      <h1 style="font-family: 'Clash Display', sans-serif; font-size: clamp(36px, 5vw, 56px); font-weight: 700; color: white; letter-spacing: -1px; line-height: 1.1; margin-bottom: 24px;">{{ __('messages.about_title') }}</h1>
      <p style="font-size: 18px; color: rgba(255,255,255,0.65); line-height: 1.7;">{{ __('messages.about_subtitle') }}</p>
    </div>
  </section>
 
  <!-- MISSION -->
  <section style="padding: 100px 40px; background: #f0f4f8;">
    <div style="max-width: 1280px; margin: 0 auto;">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
        <div>
          <span style="display: inline-block; background: rgba(26,115,232,0.08); color: #1a73e8; font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; padding: 6px 16px; border-radius: 100px; margin-bottom: 16px;">{{ __('messages.our_mission') }}</span>
          <h2 style="font-family: 'Clash Display', sans-serif; font-size: clamp(28px, 3vw, 40px); font-weight: 700; color: #0a1628; letter-spacing: -1px; margin-bottom: 20px;">{{ __('messages.mission_title') }}</h2>
          <p style="font-size: 16px; color: #627d98; line-height: 1.7; margin-bottom: 16px;">{{ __('messages.mission_text1') }}</p>
          <p style="font-size: 16px; color: #627d98; line-height: 1.7;">{{ __('messages.mission_text2') }}</p>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
          <div style="background: white; border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(10,22,40,0.06); text-align: center;">
            <div style="font-size: 36px; margin-bottom: 12px;">🎓</div>
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 32px; font-weight: 700; color: #0a1628;">5,000+</h3>
            <p style="font-size: 14px; color: #627d98;">{{ __('messages.students_enrolled') }}</p>
          </div>
          <div style="background: white; border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(10,22,40,0.06); text-align: center;">
            <div style="font-size: 36px; margin-bottom: 12px;">📚</div>
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 32px; font-weight: 700; color: #0a1628;">120+</h3>
            <p style="font-size: 14px; color: #627d98;">{{ __('messages.courses_available') }}</p>
          </div>
          <div style="background: white; border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(10,22,40,0.06); text-align: center;">
            <div style="font-size: 36px; margin-bottom: 12px;">👨‍🏫</div>
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 32px; font-weight: 700; color: #0a1628;">50+</h3>
            <p style="font-size: 14px; color: #627d98;">{{ __('messages.expert_instructors') }}</p>
          </div>
          <div style="background: white; border-radius: 20px; padding: 28px; box-shadow: 0 4px 24px rgba(10,22,40,0.06); text-align: center;">
            <div style="font-size: 36px; margin-bottom: 12px;">⭐</div>
            <h3 style="font-family: 'Clash Display', sans-serif; font-size: 32px; font-weight: 700; color: #0a1628;">98%</h3>
            <p style="font-size: 14px; color: #627d98;">{{ __('messages.satisfaction_rate') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- VALUES -->
  <section style="padding: 100px 40px; background: white;">
    <div style="max-width: 1280px; margin: 0 auto;">
      <div style="text-align: center; margin-bottom: 60px;">
        <span style="display: inline-block; background: rgba(26,115,232,0.08); color: #1a73e8; font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; padding: 6px 16px; border-radius: 100px; margin-bottom: 16px;">{{ __('messages.our_values') }}</span>
        <h2 style="font-family: 'Clash Display', sans-serif; font-size: clamp(28px, 4vw, 44px); font-weight: 700; color: #0a1628; letter-spacing: -1px;">{{ __('messages.what_we_stand_for') }}</h2>
      </div>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
        <div style="background: #f0f4f8; border-radius: 20px; padding: 32px;">
          <div style="font-size: 36px; margin-bottom: 16px;">🌟</div>
          <h3 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 10px;">{{ __('messages.excellence') }}</h3>
          <p style="font-size: 14px; color: #627d98; line-height: 1.6;">{{ __('messages.excellence_text') }}</p>
        </div>
        <div style="background: #f0f4f8; border-radius: 20px; padding: 32px;">
          <div style="font-size: 36px; margin-bottom: 16px;">🤝</div>
          <h3 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 10px;">{{ __('messages.accessibility') }}</h3>
          <p style="font-size: 14px; color: #627d98; line-height: 1.6;">{{ __('messages.accessibility_text') }}</p>
        </div>
        <div style="background: #f0f4f8; border-radius: 20px; padding: 32px;">
          <div style="font-size: 36px; margin-bottom: 16px;">🚀</div>
          <h3 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 10px;">{{ __('messages.innovation') }}</h3>
          <p style="font-size: 14px; color: #627d98; line-height: 1.6;">{{ __('messages.innovation_text') }}</p>
        </div>
        <div style="background: #f0f4f8; border-radius: 20px; padding: 32px;">
          <div style="font-size: 36px; margin-bottom: 16px;">💡</div>
          <h3 style="font-family: 'Clash Display', sans-serif; font-size: 20px; font-weight: 700; color: #0a1628; margin-bottom: 10px;">{{ __('messages.practicality') }}</h3>
          <p style="font-size: 14px; color: #627d98; line-height: 1.6;">{{ __('messages.practicality_text') }}</p>
        </div>
      </div>
    </div>
  </section>
 
  <!-- CTA -->
  <section style="padding: 100px 40px; background: linear-gradient(135deg, #0a1628, #1d3461); text-align: center;">
    <div style="max-width: 600px; margin: 0 auto;">
      <h2 style="font-family: 'Clash Display', sans-serif; font-size: clamp(28px, 4vw, 44px); font-weight: 700; color: white; letter-spacing: -1px; margin-bottom: 20px;">{{ __('messages.ready_to_learn') }}</h2>
      <p style="font-size: 17px; color: rgba(255,255,255,0.65); margin-bottom: 36px;">{{ __('messages.ready_text') }}</p>
      <a href="{{ Auth::check() ? '/dashboard' : '/register' }}" style="display: inline-flex; align-items: center; gap: 8px; background: #00d4aa; color: #0a1628; font-size: 15px; font-weight: 700; padding: 14px 28px; border-radius: 12px; text-decoration: none; transition: all 0.3s;">{{ __('messages.get_started') }}</a>
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>