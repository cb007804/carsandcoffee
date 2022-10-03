<html lang="en">
<head>
    <title>Carsandcoffeep- Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
        rel="stylesheet"
        />
      <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
        ></script>
</head>
<body>

    <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link {{ (request()->is('item') || request()->is('item/create')) ? 'active' : '' }}" href="{{ url('/item') }}" role="tab"
            aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-list fa-fw me-2"></i>Item</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link {{ (request()->is('event') || request()->is('event/create')) ? 'active' : '' }}" href="{{ url('/event') }}" role="tab"
            aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-calendar-week fa-fw me-2"></i>Events</a>
        </li>
        <li class="nav-item " role="presentation">
          <a class="nav-link {{ (request()->is('gallary') || request()->is('gallary/create')) ? 'active' : '' }}"  href="{{ url('/gallary') }}" role="tab"
            aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-images fa-fw me-2"></i>Gallary</a>
        </li>
      </ul>
<div class="container">
  <br /><br />
    @yield('content')
</div>
</body>
</html>