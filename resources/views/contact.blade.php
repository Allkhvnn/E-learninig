<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ __('messages.contact_us') }} - SkillUp Kazakhstan</title>
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
 
  <section style="background: linear-gradient(135deg, #0a1628 0%, #112240 100%); padding: 80px 40px; text-align: center;">
    <div style="max-width: 600px; margin: 0 auto;">
      <span style="display: inline-block; background: rgba(0,212,170,0.12); color: #00d4aa; font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; padding: 6px 16px; border-radius: 100px; margin-bottom: 24px;">{{ __('messages.get_in_touch') }}</span>
      <h1 style="font-family: 'Clash Display', sans-serif; font-size: clamp(32px, 5vw, 52px); font-weight: 700; color: white; letter-spacing: -1px; margin-bottom: 16px;">{{ __('messages.contact_us') }}</h1>
      <p style="font-size: 17px; color: rgba(255,255,255,0.6);">{{ __('messages.contact_subtitle') }}</p>
    </div>
  </section>
 
  <section style="padding: 80px 40px; background: #f0f4f8;">
    <div style="max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.5fr; gap: 60px; align-items: start;">
 
      <!-- Contact Info -->
      <div>
        <h2 style="font-family: 'Clash Display', sans-serif; font-size: 28px; font-weight: 700; color: #0a1628; margin-bottom: 24px; letter-spacing: -0.5px;">{{ __('messages.lets_talk') }}</h2>
        <p style="font-size: 15px; color: #627d98; line-height: 1.7; margin-bottom: 40px;">{{ __('messages.lets_talk_text') }}</p>
 
        <div style="display: flex; flex-direction: column; gap: 24px;">
          <div style="display: flex; align-items: flex-start; gap: 16px;">
            <div style="width: 48px; height: 48px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; box-shadow: 0 4px 12px rgba(10,22,40,0.08); flex-shrink: 0;">📧</div>
            <div>
              <h4 style="font-weight: 700; color: #0a1628; margin-bottom: 4px;">Email</h4>
              <p style="font-size: 14px; color: #627d98;">support@skillup.kz</p>
            </div>
          </div>
          <div style="display: flex; align-items: flex-start; gap: 16px;">
            <div style="width: 48px; height: 48px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; box-shadow: 0 4px 12px rgba(10,22,40,0.08); flex-shrink: 0;">📱</div>
            <div>
              <h4 style="font-weight: 700; color: #0a1628; margin-bottom: 4px;">Phone</h4>
              <p style="font-size: 14px; color: #627d98;">+7 (727) 000-00-00</p>
            </div>
          </div>
          <div style="display: flex; align-items: flex-start; gap: 16px;">
            <div style="width: 48px; height: 48px; background: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; box-shadow: 0 4px 12px rgba(10,22,40,0.08); flex-shrink: 0;">📍</div>
            <div>
              <h4 style="font-weight: 700; color: #0a1628; margin-bottom: 4px;">Address</h4>
              <p style="font-size: 14px; color: #627d98;">Almaty, Kazakhstan</p>
            </div>
          </div>
        </div>
      </div>
 
      <!-- Contact Form -->
      <div style="background: white; border-radius: 24px; padding: 40px; box-shadow: 0 4px 24px rgba(10,22,40,0.06);">
        <h3 style="font-family: 'Clash Display', sans-serif; font-size: 22px; font-weight: 700; color: #0a1628; margin-bottom: 28px;">{{ __('messages.send_message') }}</h3>
 
        @if(session('success'))
          <div style="background: rgba(0,212,170,0.1); color: #00a882; border: 1px solid rgba(0,212,170,0.2); padding: 14px 16px; border-radius: 10px; margin-bottom: 24px; font-weight: 600; font-size: 14px;">
            ✅ {{ __('messages.message_sent') }}
          </div>
        @endif
 
        <form method="POST" action="/contact">
          @csrf
          <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #0a1628; margin-bottom: 8px;">{{ __('messages.full_name') }}</label>
            <input type="text" name="name" placeholder="{{ __('messages.full_name_placeholder') }}" required style="width: 100%; padding: 12px 16px; background: #f0f4f8; border: 1.5px solid #d9e2ec; border-radius: 10px; font-size: 15px; font-family: 'Sora', sans-serif; color: #1a2332; outline: none; transition: all 0.3s;" onfocus="this.style.borderColor='#1a73e8';this.style.background='white'" onblur="this.style.borderColor='#d9e2ec';this.style.background='#f0f4f8'">
          </div>
          <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #0a1628; margin-bottom: 8px;">{{ __('messages.email') }}</label>
            <input type="email" name="email" placeholder="your@email.com" required style="width: 100%; padding: 12px 16px; background: #f0f4f8; border: 1.5px solid #d9e2ec; border-radius: 10px; font-size: 15px; font-family: 'Sora', sans-serif; color: #1a2332; outline: none; transition: all 0.3s;" onfocus="this.style.borderColor='#1a73e8';this.style.background='white'" onblur="this.style.borderColor='#d9e2ec';this.style.background='#f0f4f8'">
          </div>
          <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #0a1628; margin-bottom: 8px;">{{ __('messages.subject') }}</label>
            <input type="text" name="subject" placeholder="{{ __('messages.subject_placeholder') }}" style="width: 100%; padding: 12px 16px; background: #f0f4f8; border: 1.5px solid #d9e2ec; border-radius: 10px; font-size: 15px; font-family: 'Sora', sans-serif; color: #1a2332; outline: none; transition: all 0.3s;" onfocus="this.style.borderColor='#1a73e8';this.style.background='white'" onblur="this.style.borderColor='#d9e2ec';this.style.background='#f0f4f8'">
          </div>
          <div style="margin-bottom: 28px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #0a1628; margin-bottom: 8px;">{{ __('messages.message') }}</label>
            <textarea name="message" placeholder="{{ __('messages.message_placeholder') }}" rows="5" required style="width: 100%; padding: 12px 16px; background: #f0f4f8; border: 1.5px solid #d9e2ec; border-radius: 10px; font-size: 15px; font-family: 'Sora', sans-serif; color: #1a2332; outline: none; transition: all 0.3s; resize: vertical;" onfocus="this.style.borderColor='#1a73e8';this.style.background='white'" onblur="this.style.borderColor='#d9e2ec';this.style.background='#f0f4f8'"></textarea>
          </div>
          <button type="submit" style="width: 100%; padding: 14px; background: linear-gradient(135deg, #0a1628, #1d3461); color: white; font-family: 'Sora', sans-serif; font-size: 15px; font-weight: 700; border: none; border-radius: 10px; cursor: pointer; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 12px 30px rgba(10,22,40,0.2)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
            {{ __('messages.send_message_btn') }}
          </button>
        </form>
      </div>
 
    </div>
  </section>
 
  <footer style="background: #0a1628; border-top: 1px solid rgba(255,255,255,0.06); padding: 40px; text-align: center;">
    <p style="color: rgba(255,255,255,0.4); font-size: 14px;">© 2026 SkillUp Kazakhstan</p>
  </footer>
 
</body>
</html>