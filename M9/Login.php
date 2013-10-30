<!doctype html>
<html>
    <head>
        <link href="/M9/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="styles.css" />
        <script src="/M9/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
        <title>M9 Login</title>
    </head>
    <body style="background-color: #eee;">
        <div class="jumbotron">
            <h1>M9 Admin Panel</h1>
            <h2>Login:</h2>
            <form action="/M9/" method="post">
                <div class="form-group">
                    <input type="email" name="username" class="form-control" placeholder="Email" required />
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                    <input type="submit" class="btn btn-primary" value="Login" />
                </div>
            </form>
        </div>
    </body>
</html>