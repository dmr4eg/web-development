<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .ok {color: green; }
        .ko {color: red; }
    </style>
    <title>Registrace</title>
    <script>
        var timer = null;
        var xhr = null;


        function init() {
            var input = document.querySelector("#name");
            input.addEventListener("keyup", check);
        }

        function send () {
            var input = document.querySelector("#name"); // e.target
            if (xhr != null) {
                xhr.abort();
            }
            xhr = new XMLHttpRequest();
            xhr.addEventListener('load', show);
            xhr.open('POST', "getName.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("name="+encodeURIComponent(input.value));
        }

        function show() {
            var input = document.querySelector("#name");
            if (xhr.response == 'OK') {
                input.classList.add('ok');
                input.classList.remove('ko');
            } else {
                input.classList.add('ko');
                input.classList.remove('ok');
            }
            xhr = null;
        }

        function check() {
            if (timer != null) {
                clearTimeout(timer);
                timer = null;
            }
            timer = setTimeout(send, 200);
        }
    </script>
</head>
<body>
    <h1>Registrace</h1>

    <form action="" method="post">
        <fieldset>
            <legend>Registace</legend>
            <div>
                <label for="name">Jmeno</label>
                <input type="text" name="name"  id="name">
            </div>
            <div>
                <label for="pass">Heslo</label>
                <input type="password" name="pass" id="pass">
            </div>
            <input type="submit" name="reg" value="Registrovat">
        </fieldset>
    </form>
    <script>
        init();
    </script>
</body>
</html>