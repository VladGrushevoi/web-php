<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/8-laba.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>
</head>

<body>
    <form class="form" onsubmit="" id="form">
        <h3>Check IP</h3>
        <input type="text" id="ip" pattern="^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$"><br>
        <input type="submit">
    </form>
    <div class="container">
        <div class="child">
            <p id="result-xml"></p>
        </div>
        <div class="child">
            <div id="result-json"></div>
        </div>
    </div>
    
    <script src="../js/8-laba.js"></script>
</body>

</html>