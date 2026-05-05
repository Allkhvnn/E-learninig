<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SkillUp Kazakhstan</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
              <button type="submit" style="background:none;border:none;color:rgba(255,255,255,0.75);cursor:pointer;font-size:14px;font-family:inherit;font-weight:500;padding:8px 16px;border-radius:8px;transition:all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.08)';this.style.color='white'" onmouseout="this.style.background='none';this.style.color='rgba(255,255,255,0.75)'">
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
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-text">
        <div class="hero-badge">🇰🇿 {{ __('messages.home') }} · SkillUp Kazakhstan</div>
        <h1>{{ __('messages.hero_title') }}</h1>
        <p>{{ __('messages.hero_text') }}</p>
        <div class="hero-buttons">
          <a href="{{ Auth::check() ? '/dashboard' : '/register' }}" class="btn-primary">{{ __('messages.start_learning') }} →</a>
          <a href="/courses" class="btn-secondary">{{ __('messages.courses') }}</a>
        </div>
        <div class="hero-stats">
          <div class="hero-stat-item">
            <h3>5,000+</h3>
            <p>{{ __('messages.students') }}</p>
          </div>
          <div class="hero-stat-item">
            <h3>120+</h3>
            <p>{{ __('messages.courses') }}</p>
          </div>
          <div class="hero-stat-item">
            <h3>98%</h3>
            <p>{{ __('messages.satisfaction') }}</p>
          </div>
        </div>
      </div>
      <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=900" alt="E-learning">
        <div class="hero-image-badge">
          <div class="icon">🎓</div>
          <div>
            <h4>New Course</h4>
            <p>AI & Machine Learning</p>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- COURSES -->
  <section class="courses">
    <div class="courses-inner">
      <div class="section-header">
        <span class="section-tag">{{ __('messages.popular_courses') }}</span>
        <h2>{{ __('messages.popular_courses') }}</h2>
        <p>{{ __('messages.hero_text') }}</p>
      </div>
      <div class="course-list">
        <div class="course-card">
          <div class="course-icon">💻</div>
          <h3>{{ __('messages.web_dev_title') }}</h3>
          <p>{{ __('messages.web_dev_desc') }}</p>
          <div class="course-card-footer">
            <span class="course-level">Beginner → Pro</span>
            <div class="course-arrow">→</div>
          </div>
        </div>
        <div class="course-card">
          <div class="course-icon">🎨</div>
          <h3>{{ __('messages.uiux_title') }}</h3>
          <p>{{ __('messages.uiux_desc') }}</p>
          <div class="course-card-footer">
            <span class="course-level">Intermediate</span>
            <div class="course-arrow">→</div>
          </div>
        </div>
        <div class="course-card">
          <div class="course-icon">📈</div>
          <h3>{{ __('messages.digital_title') }}</h3>
          <p>{{ __('messages.digital_desc') }}</p>
          <div class="course-card-footer">
            <span class="course-level">All Levels</span>
            <div class="course-arrow">→</div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- ADVERTISEMENT -->
  <section class="advertisement-section">
    <div class="advertisement-inner">
      <div class="section-header">
        <span class="section-tag">{{ __('messages.advertisement') }}</span>
        <h2>{{ __('messages.special_offer') }}</h2>
      </div>
      <div id="adBox">
        <h3>🔥 {{ __('messages.special_offer') }}</h3>
        <p>{{ __('messages.offer_text') }}</p>
        <button>{{ __('messages.enroll_now') }}</button>
      </div>
      <div class="ad-controls">
        <button id="hideBtn">hide()</button>
        <button id="showBtn">show()</button>
        <button id="fadeOutBtn">fadeOut()</button>
        <button id="fadeInBtn">fadeIn()</button>
        <button id="fadeToBtn">fadeTo()</button>
        <button id="slideUpBtn">slideUp()</button>
        <button id="slideDownBtn">slideDown()</button>
        <button id="animateBtn">animate()</button>
        <button id="stopBtn">stop()</button>
      </div>
    </div>
  </section>
 
  <!-- CHARTS -->
  <section class="charts-section">
    <div class="charts-inner">
      <div class="section-header">
        <span class="section-tag">{{ __('messages.platform_analytics') }}</span>
        <h2>{{ __('messages.platform_analytics') }}</h2>
      </div>
      <div class="charts-grid">
        <div class="chart-card">
          <h3>{{ __('messages.students_by_course') }}</h3>
          <div class="chart-box"><canvas id="barChart"></canvas></div>
        </div>
        <div class="chart-card">
          <h3>{{ __('messages.user_categories') }}</h3>
          <div class="chart-box"><canvas id="pieChart"></canvas></div>
        </div>
        <div class="chart-card">
          <h3>{{ __('messages.skill_interests') }}</h3>
          <div class="chart-box"><canvas id="polarChart"></canvas></div>
        </div>
        <div class="chart-card">
          <h3>{{ __('messages.monthly_enrollments') }}</h3>
          <div class="chart-box"><canvas id="lineChart"></canvas></div>
        </div>
      </div>
    </div>
  </section>
 
  <footer>
    <p>© 2026 SkillUp Kazakhstan — {{ __('messages.hero_title') }}</p>
  </footer>
 
  <script>
    $(document).ready(function () {
      $("#hideBtn").click(function () { $("#adBox").hide(800); });
      $("#showBtn").click(function () { $("#adBox").show(800); });
      $("#fadeOutBtn").click(function () { $("#adBox").fadeOut(800); });
      $("#fadeInBtn").click(function () { $("#adBox").fadeIn(800); });
      $("#fadeToBtn").click(function () { $("#adBox").fadeTo(800, 0.4); });
      $("#slideUpBtn").click(function () { $("#adBox").slideUp(800); });
      $("#slideDownBtn").click(function () { $("#adBox").slideDown(800); });
      $("#animateBtn").click(function () {
        $("#adBox").animate({ width: "380px", opacity: 0.7 }, 1200)
                   .animate({ width: "100%", opacity: 1 }, 1200);
      });
      $("#stopBtn").click(function () { $("#adBox").stop(); });
    });
 
    Chart.defaults.color = 'rgba(255,255,255,0.6)';
    Chart.defaults.borderColor = 'rgba(255,255,255,0.06)';
 
    new Chart(document.getElementById("barChart"), {
      type: "bar",
      data: {
        labels: ["{{ __('messages.web_dev') }}", "{{ __('messages.design') }}", "{{ __('messages.marketing') }}", "{{ __('messages.data') }}", "{{ __('messages.english') }}"],
        datasets: [{ label: "{{ __('messages.students') }}", data: [120, 90, 75, 60, 110], backgroundColor: ["#1a73e8","#00d4aa","#ff6b35","#f5c842","#4d9fff"], borderRadius: 6 }]
      },
      options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.06)' } }, x: { grid: { display: false } } } }
    });
 
    new Chart(document.getElementById("pieChart"), {
      type: "pie",
      data: {
        labels: ["{{ __('messages.students') }}", "{{ __('messages.teachers') }}", "{{ __('messages.graduates') }}", "{{ __('messages.guests') }}"],
        datasets: [{ data: [60, 15, 20, 5], backgroundColor: ["#1a73e8","#00d4aa","#ff6b35","#f5c842"], borderWidth: 0 }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });
 
    new Chart(document.getElementById("polarChart"), {
      type: "polarArea",
      data: {
        labels: ["{{ __('messages.programming') }}", "{{ __('messages.design') }}", "{{ __('messages.business') }}", "{{ __('messages.languages') }}", "AI"],
        datasets: [{ data: [14, 10, 8, 12, 16], backgroundColor: ["rgba(26,115,232,0.7)","rgba(0,212,170,0.7)","rgba(255,107,53,0.7)","rgba(245,200,66,0.7)","rgba(77,159,255,0.7)"] }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });
 
    new Chart(document.getElementById("lineChart"), {
      type: "line",
      data: {
        labels: ["{{ __('messages.january') }}", "{{ __('messages.february') }}", "{{ __('messages.march') }}", "{{ __('messages.april') }}", "{{ __('messages.may') }}", "{{ __('messages.june') }}"],
        datasets: [{ label: "{{ __('messages.enrollments') }}", data: [30, 45, 40, 60, 80, 95], borderColor: "#00d4aa", backgroundColor: "rgba(0,212,170,0.1)", fill: true, tension: 0.4, pointBackgroundColor: "#00d4aa", pointRadius: 4 }]
      },
      options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.06)' } }, x: { grid: { display: false } } } }
    });
  </script>
</body>
</html>