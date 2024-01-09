<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $pageData['title']; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <meta name="vieport" content="width=device-width, intial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <header></header>
    <div id="login">
        <h3 class="text-center text-white pt-5">Форма авторизации</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form-center" action="" method="post">
                            <h3 class="text-center text-info">Вход в личный кабинет</h3>
                            <?php if (!empty($pageData['error'])) : ?>
                                <p><?php echo $pageData['error']; ?></p>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Логин:</label><br>
                                <input type="text" name="login" id="login" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Пароль:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Запомнить меня</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Войти">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info">Зарегистрируйтесь здесь</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>

    </footer>

    <script src="/js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_angular.js_1.8.3_angular.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>
