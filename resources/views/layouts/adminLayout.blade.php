


<!doctype html>

<html
  lang="{{ App::getLocale() }}"
  class="layout-menu-fixed layout-compact"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ __('message.admin_panel') }} | {{ __('message.school') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <style>
      .layout-wrapper .card {
        border-radius: 12px;
      }
      .layout-wrapper .col-md-8.offset-md-2,
      .layout-wrapper .col-md-6.offset-md-3,
      .layout-wrapper .col-md-10 {
        margin-left: auto;
        margin-right: auto;
      }
      .layout-wrapper form .form-control,
      .layout-wrapper form .form-select {
        min-height: 42px;
      }
      .layout-wrapper form .form-label {
        margin-bottom: .5rem;
        font-weight: 600;
      }
      .layout-wrapper .main-content {
        box-sizing: border-box;
      }
      .layout-wrapper .main-content .row > [class*="col-"] {
        margin-left: auto;
        margin-right: auto;
      }
      .layout-wrapper .main-content .card,
      .layout-wrapper > .layout-container > .col-md-8.offset-md-2,
      .layout-wrapper > .layout-container > .col-md-6.offset-md-3 {
        margin-left: auto;
        margin-right: auto;
      }
      .layout-wrapper .main-content .card-header,
      .layout-wrapper .card-header {
        min-height: 56px;
      }
      .layout-wrapper .main-content .card-body,
      .layout-wrapper .card-body {
        padding: 1.5rem;
      }
      .layout-wrapper .main-content form,
      .layout-wrapper > .layout-container > form {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
      }
      .layout-wrapper .main-content .btn,
      .layout-wrapper .main-content a.btn {
        vertical-align: middle;
      }
      .layout-container > .main-content {
        box-sizing: border-box;
        width: calc(100% - 250px);
        min-height: 100vh;
        margin: 0 0 0 250px !important;
        padding: 24px !important;
        background: #f5f7fb;
      }
      .layout-container > .layout-page {
        box-sizing: border-box;
        width: calc(100% - 250px);
        margin-left: 250px !important;
      }
      .layout-container > .col-md-8.offset-md-2 {
        width: min(760px, calc(100% - 290px));
        max-width: none;
        margin-right: auto !important;
        margin-left: auto !important;
      }
      .layout-container > .main-content .card {
        overflow: hidden;
        border: 1px solid #e5eaf2 !important;
        border-radius: 8px !important;
        box-shadow: 0 4px 16px rgba(25, 42, 70, .06) !important;
      }
      .layout-container > .main-content .card > .card-header {
        color: #202b3c !important;
        background: #fff !important;
        border-bottom: 1px solid #e8edf4;
      }
      .layout-container > .main-content .table-responsive {
        overflow-x: auto;
      }
      .layout-container > .main-content table.table {
        margin-bottom: 0;
        vertical-align: middle;
      }
      .layout-container > .main-content table.table thead th {
        color: #344054 !important;
        background: #f1f4f9 !important;
        border-color: #e3e8f0;
        font-weight: 600;
        white-space: nowrap;
      }
      .layout-container > .main-content table.table td {
        border-color: #e8edf4;
      }
      @media (max-width: 1199.98px) {
        .layout-container > .main-content,
        .layout-container > .layout-page {
          width: calc(100% - 76px);
          margin-left: 76px !important;
        }
      }
      @media (max-width: 767.98px) {
        .layout-container > .main-content {
          width: 100%;
          margin-left: 0 !important;
          padding: 16px !important;
        }
        .layout-container > .layout-page {
          width: 100%;
          margin-left: 0 !important;
        }
        .layout-container > .col-md-8.offset-md-2 {
          width: calc(100% - 32px);
        }
      }
      .admin-mobile-bar {
        display: none;
      }
      @media (max-width: 1199.98px) {
        body {
          padding-top: 56px;
        }
        .admin-mobile-bar {
          position: fixed;
          inset: 0 0 auto;
          z-index: 1200;
          display: flex;
          align-items: center;
          gap: 12px;
          height: 56px;
          padding: 0 16px;
          color: #202b3c;
          background: #fff;
          border-bottom: 1px solid #e5eaf2;
          box-shadow: 0 2px 10px rgba(25, 42, 70, .06);
        }
        .admin-mobile-bar button {
          width: 40px;
          height: 40px;
          display: inline-grid;
          place-items: center;
          padding: 0;
          border: 0;
          border-radius: 8px;
          color: #2450d4;
          background: #eef2ff;
          font-size: 24px;
        }
        .admin-mobile-bar strong {
          font-size: 15px;
          font-weight: 700;
        }
        .admin-mobile-bar a {
          margin-left: auto;
          color: #2450d4;
          font-size: 13px;
          font-weight: 600;
          text-decoration: none;
        }
        #layout-menu {
          top: 56px !important;
          height: calc(100vh - 56px) !important;
        }
        .layout-container > .main-content,
        .layout-container > .layout-page {
          width: 100%;
          margin-left: 0 !important;
        }
        .layout-container > .main-content {
          padding: 16px !important;
        }
        .layout-page .layout-menu-toggle {
          display: none !important;
        }
        .layout-container > .col-md-8.offset-md-2,
        .layout-container > .col-md-6.offset-md-3 {
          width: calc(100% - 32px);
        }
      }
      @media (max-width: 767.98px) {
        .layout-container > .main-content .card-body {
          min-width: 0;
          overflow-x: auto;
          -webkit-overflow-scrolling: touch;
        }
        .layout-container > .main-content table.table {
          min-width: 600px;
        }
        .layout-container > .main-content .card-body table.table {
          margin-bottom: 0;
        }
        .layout-page .container-xxl {
          padding-right: 12px;
          padding-left: 12px;
        }
        .layout-page .card-body {
          padding: 1rem !important;
        }
      }
    </style>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container admin-shell">
        <!-- Menu -->

        @include('admin.sidebar')
        <!-- / Menu -->

        <div class="admin-mobile-bar">
          <button type="button" class="layout-menu-toggle" aria-label="{{ __('message.menu_open') }}">
            <i class="bx bx-menu" aria-hidden="true"></i>
          </button>
          <strong>{{ __('message.admin_panel') }}</strong>
                <a href="{{ url('/') }}">{{ __('message.site_view') }}</a>
          <a href="{{ url('/lang/uz') }}">UZ</a>
          <a href="{{ url('/lang/ru') }}">RU</a>
        </div>

        @yield('content')

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
