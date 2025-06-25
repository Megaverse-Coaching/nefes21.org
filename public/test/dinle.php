<?php
$mp3_url = $_GET['p'] ?? '';

if (!filter_var($mp3_url, FILTER_VALIDATE_URL)) {
    die('Geçerli bir URL sağlanmadı.');
}

$safe_url = htmlspecialchars($mp3_url, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MP3 Dinle</title>
</head>
<body>
    <audio controls autoplay></audio>
    <script>
        const audio = document.querySelector('audio');
        const mediaSource = new MediaSource();

        audio.src = URL.createObjectURL(mediaSource);

        mediaSource.addEventListener('sourceopen', async function() {
            try {
                const response = await fetch('<?= $safe_url ?>');
                const data = await response.arrayBuffer();

                const sourceBuffer = mediaSource.addSourceBuffer('audio/mpeg');
                sourceBuffer.addEventListener('updateend', function() {
                    if (!sourceBuffer.updating && mediaSource.readyState === 'open') {
                        mediaSource.endOfStream();
                    }
                });
                sourceBuffer.appendBuffer(data);
            } catch (error) {
                console.error("An error occurred while fetching the audio:", error);
            }
        });

        window.addEventListener("beforeunload", function() {
            if (audio) {
                audio.pause();
                audio.src = '';
            }
        });
    </script>
</body>
</html>
