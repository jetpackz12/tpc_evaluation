<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #198754;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <span class="text-lg text-white">Welcome: <strong><i><?php echo $_SESSION['usertype'] === 'admin' ? $_SESSION['username'] : $_SESSION['studentId']; ?></i></strong></span>
  </ul>
</nav>
<!-- /.navbar -->