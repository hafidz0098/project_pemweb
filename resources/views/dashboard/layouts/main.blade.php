<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../../../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <link rel="stylesheet" href="../../../assets/css/components.css">
  <script type="text/javascript" src="/js/trix.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display:none;
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('partials.navbar')
      @include('partials.sidebar')
      @yield('content')
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> PT Tanjung Bira <a href="#"></a>
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-primary">Logout</button>
              </form> 
          </div>
      </div>
  </div>
</div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="../../../assets/js/stisla.js"></script>

  <script>
    $(document).ready( function () {
      $('#datatable').DataTable();
    } );
  </script>
  @include('sweetalert::alert')

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../../../assets/js/scripts.js"></script>
  <script src="../../../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
