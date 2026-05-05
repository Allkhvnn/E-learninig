<!DOCTYPE html>
<html lang="en">
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
      <h2 class="logo">SkillUp Kazakhstan</h2>

      <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Login</a></li>
      </ul>
    </div>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>E-learning Platform for Skills Development in Kazakhstan</h1>
      <p>
        SkillUp Kazakhstan is an online platform where students can develop
        modern skills such as web development, UI/UX design, digital marketing,
        business, and data analysis.
      </p>
      <button onclick="window.location.href='/register'">Start Learning</button>
    </div>

    <div class="hero-image">
      <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=900" alt="E-learning">
    </div>
  </section>

  <section class="courses">
    <h2>Popular Courses</h2>
    <div class="course-list">
      <div class="course-card">
        <h3>Web Development</h3>
        <p>Learn HTML, CSS, JavaScript, PHP and modern frontend tools.</p>
      </div>

      <div class="course-card">
        <h3>UI/UX Design</h3>
        <p>Study interface design, prototyping and user experience basics.</p>
      </div>

      <div class="course-card">
        <h3>Digital Marketing</h3>
        <p>Improve promotion, branding and online advertising skills.</p>
      </div>
    </div>
  </section>

  <section class="advertisement-section">
    <h2>Advertisement</h2>

    <div id="adBox">
      <h3>Special Offer</h3>
      <p>Get 50% discount on all IT courses this month.</p>
      <button>Enroll Now</button>
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
  </section>

  <section class="charts-section">
    <h2>Platform Analytics</h2>
    <div class="charts-grid">

      <div class="chart-card">
        <h3>Bar Chart: Students by Course</h3>
        <div class="chart-box">
          <canvas id="barChart"></canvas>
        </div>
      </div>

      <div class="chart-card">
        <h3>Pie Chart: User Categories</h3>
        <div class="chart-box">
          <canvas id="pieChart"></canvas>
        </div>
      </div>

      <div class="chart-card">
        <h3>Polar Area Chart: Skill Interests</h3>
        <div class="chart-box">
          <canvas id="polarChart"></canvas>
        </div>
      </div>

      <div class="chart-card">
        <h3>Line Chart: Monthly Enrollments</h3>
        <div class="chart-box">
          <canvas id="lineChart"></canvas>
        </div>
      </div>

    </div>
  </section>

  <footer>
    <p>© 2026 SkillUp Kazakhstan</p>
  </footer>

  <script>
    $(document).ready(function () {
      $("#hideBtn").click(function () {
        $("#adBox").hide(800);
      });

      $("#showBtn").click(function () {
        $("#adBox").show(800);
      });

      $("#fadeOutBtn").click(function () {
        $("#adBox").fadeOut(800);
      });

      $("#fadeInBtn").click(function () {
        $("#adBox").fadeIn(800);
      });

      $("#fadeToBtn").click(function () {
        $("#adBox").fadeTo(800, 0.4);
      });

      $("#slideUpBtn").click(function () {
        $("#adBox").slideUp(800);
      });

      $("#slideDownBtn").click(function () {
        $("#adBox").slideDown(800);
      });

      $("#animateBtn").click(function () {
        $("#adBox")
          .animate(
            {
              width: "380px",
              opacity: 0.7
            },
            1200
          )
          .animate(
            {
              width: "320px",
              opacity: 1
            },
            1200
          );
      });

      $("#stopBtn").click(function () {
        $("#adBox").stop();
      });
    });

    new Chart(document.getElementById("barChart"), {
      type: "bar",
      data: {
        labels: ["Web Dev", "Design", "Marketing", "Data", "English"],
        datasets: [{
          label: "Students",
          data: [120, 90, 75, 60, 110],
          backgroundColor: ["#0a4d8c", "#ff9800", "#4caf50", "#9c27b0", "#f44336"]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    new Chart(document.getElementById("pieChart"), {
      type: "pie",
      data: {
        labels: ["Students", "Teachers", "Graduates", "Guests"],
        datasets: [{
          data: [60, 15, 20, 5],
          backgroundColor: ["#0a4d8c", "#ff9800", "#4caf50", "#e91e63"]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });

    new Chart(document.getElementById("polarChart"), {
      type: "polarArea",
      data: {
        labels: ["Programming", "Design", "Business", "Languages", "AI"],
        datasets: [{
          data: [14, 10, 8, 12, 16],
          backgroundColor: [
            "rgba(10,77,140,0.7)",
            "rgba(255,152,0,0.7)",
            "rgba(76,175,80,0.7)",
            "rgba(156,39,176,0.7)",
            "rgba(244,67,54,0.7)"
          ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });

    new Chart(document.getElementById("lineChart"), {
      type: "line",
      data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
          label: "Enrollments",
          data: [30, 45, 40, 60, 80, 95],
          borderColor: "#0a4d8c",
          backgroundColor: "rgba(10,77,140,0.2)",
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>

</body>
</html>