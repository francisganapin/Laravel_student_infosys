<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
    }
    /* Sidebar */
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      background: #fff;
      border-right: 1px solid #ddd;
      padding-top: 60px;
      transition: all 0.3s ease;
      box-shadow: 2px 0 8px rgba(0,0,0,0.05);
    }
    .sidebar.collapsed {
      width: 70px;
    }
    .sidebar .nav-link {
      color: #333;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-radius: 8px;
      margin: 4px 12px;
      font-weight: 500;
      transition: all 0.2s;
    }
    .sidebar .nav-link:hover {
      background-color: #f0f4ff;
      color: #0d6efd;
    }
    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
    }
    .sidebar .nav-link i {
      font-size: 1.2rem;
    }
    .sidebar.collapsed .nav-link span {
      display: none;
    }
    .sidebar.collapsed .nav-link {
      justify-content: center;
    }
    /* Topbar */
    .topbar {
      position: fixed;
      top: 0;
      left: 230px;
      right: 0;
      height: 60px;
      background: #fff;
      border-bottom: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 1000;
      transition: left 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .sidebar.collapsed ~ .topbar {
      left: 70px;
    }
    .content {
      margin-left: 230px;
      padding: 80px 20px 20px;
      transition: margin-left 0.3s ease;
    }
    .sidebar.collapsed ~ .content {
      margin-left: 70px;
    }
    .search-box {
      background: #f1f3f5;
      border-radius: 20px;
      padding: 5px 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .search-box input {
      border: none;
      outline: none;
      background: transparent;
      width: 200px;
    }
    .profile-img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column" id="sidebar">
    <a href="" class="nav-link">
      <i class="bi bi-speedometer2"></i><span>Dashboard</span>
    </a>
    
    <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
    <i class="bi bi-person"></i><span>Students</span>
    </a>

    <a href="" class="nav-link">
      <i class="bi bi-book"></i><span>Courses</span>
    </a>

    <a href="{{ route('teachers.index') }}" class="nav-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
    <i class="bi bi-person"></i><span>Teachers</span>
    </a>

    <a href="" class="nav-link">
      <i class="bi bi-card-checklist"></i><span>Grades</span>
    </a>
    <a href="" class="nav-link">
      <i class="bi bi-calendar-check"></i><span>Attendance</span>
    </a>
    <a href="" class="nav-link">
      <i class="bi bi-bar-chart"></i><span>Reports</span>
    </a>
  </div>
  

  <!-- Topbar -->
  <div class="topbar" id="topbar">
    <button class="btn btn-light" id="toggleBtn"><i class="bi bi-list"></i></button>
    <div class="d-flex align-items-center gap-3">
      <i class="bi bi-bell position-relative fs-5">
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">1</span>
      </i>
      <i class="bi bi-github fs-5"></i>
      <img src="https://via.placeholder.com/35" class="profile-img" alt="User">
    </div>
  </div>

  <div class="content" id="content">
      @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed");
    });
  </script>
</body>
</html>
