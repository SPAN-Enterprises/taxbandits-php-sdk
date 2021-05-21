<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
<link href="/css/main.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="navbar">
    <img src="/img/logo.png" alt="tbs logo">
        <ul>

            <li><a href="/">Home</a></li>
            <li><a href="/business_list">Businesses</a></li>
            <li><a href="/render_template_1099_misc_list">1099-MISC</a></li>
            <li><a href="/render_template_nec_list">1099-NEC</a></li>
            <li><a href="/render_template_1099_misc_list">1099-MISC</a></li>
            <li><a href="/render_template_w2_list">W-2</a></li>
            <li><a href="/render_template_w9">W-9</a></li>
            <li><a href="/webhook_responses">Webhook</a></li>
            <li><a href="/webhook_esign_responses">Esign</a></li>
        </ul>

    </div>

    

@yield('content')
</div>
</body>

</html>