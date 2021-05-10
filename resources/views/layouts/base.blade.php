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
            <li><a href="/render_template_1099_misc_list">List 1099-MISC</a></li>
            <li><a href="/render_template_create_form_1099_nec">Create 1099-NEC </a></li>
            <li><a href="/render_template_create_form_1099_misc">Create 1099-MISC </a></li>
            <li><a href="/render_template_create_form_w2">Create W-2 </a></li>
        </ul>

    </div>

    

@yield('content')
</div>
</body>

</html>