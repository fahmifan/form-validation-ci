<body>
    <form action="/login" method="POST">
        <?= form_open('form') ?>
        <div>
            <label for="name">Name</label> <br>
            <input type="text" name="name" size="50">
            <small style="color: red"><?= form_error('name') ?></small>
        </div>
        <div>
            <label for="email">Email</label> <br>
            <input type="email" name="email" size="50">
            <small style="color: red"><?= form_error('email') ?></small>
        </div>
        <div>
            <label for="password">Password</label> <br>
            <input type="password" name="password" size="50">
            <small style="color: red"><?= form_error('password') ?></small>
        </div>
        <div>
            <label for="passconf">Retype password</label> <br>
            <input type="password" name="passconf" size="50">
            <small style="color: red"><?= form_error('passconf') ?></small>
        </div>

        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>