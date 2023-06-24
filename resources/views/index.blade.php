<!DOCTYPE html>
<html>
<head>
    <title>Сокращение ссылок</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<h1>Сокращение ссылок</h1>
<form id="shortenForm">
    <textarea name="url" placeholder="Введите ссылку" required></textarea>
    <button type="submit">Сократить</button>
</form>

<textarea id="shortUrlTextarea" readonly></textarea>
<button id="copyButton">Копировать</button>

<hr>

<h1>Восстановление ссылок</h1>
<form id="restoreForm">
    <textarea name="shortUrl" placeholder="Введите сокращенную ссылку" required></textarea>
    <button type="submit">Восстановить</button>
</form>

<textarea id="longUrlTextarea" readonly></textarea>
<button id="copyLongUrlButton">Копировать</button>

<script>
    $(document).ready(function() {
        $('#shortenForm').on('submit', function(e) {
            e.preventDefault();
            var url = $('textarea[name="url"]').val();

            $.ajax({
                url: '/shorten',
                method: 'POST',
                data: { url: url },
                success: function(response) {
                    var shortUrl = response.short_url;
                    $('#shortUrlTextarea').val(shortUrl);
                },
                error: function(error) {
                    $('#shortUrlTextarea').val("URL is invalid!");
                }
            });
        });

        $('#copyButton').click(function() {
            var shortUrlTextarea = document.getElementById("shortUrlTextarea");
            shortUrlTextarea.select();
            document.execCommand("copy");
            alert("Сокращенная ссылка скопирована в буфер обмена!");
        });

        $('#restoreForm').on('submit', function(e) {
            e.preventDefault();
            var shortUrl = $('textarea[name="shortUrl"]').val();

            $.ajax({
                url: '/shorten',
                method: 'GET',
                data: { shortUrl: shortUrl },
                success: function(response) {
                    var longUrl = response.long_url;
                    $('#longUrlTextarea').val(longUrl);
                },
                error: function(xhr, error) {
                    $('#longUrlTextarea').val("URL not found!");
                }
            });
        });

        $('#copyLongUrlButton').click(function() {
            var longUrlTextarea = document.getElementById("longUrlTextarea");
            longUrlTextarea.select();
            document.execCommand("copy");
            alert("Длинная ссылка скопирована в буфер обмена!");
        });
    });
</script>
</body>
</html>
