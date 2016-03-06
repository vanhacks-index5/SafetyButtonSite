<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="/css/foundation.css"/>
    <link rel="stylesheet" href="/css/_custom.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="/js/mqttws31.js"></script>
    <script src="/js/scripts.js"></script>
</head>
<body>
<div class="contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="/">SafetyButton Monitor</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a href="/">Monitor</a></li>
                <li><a href="/profile">Profiles</a></li>
                <li><a href="/log">Logs</a></li>
            </ul>
        </section>
    </nav>
</div>

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>