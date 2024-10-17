<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.yellow.min.css">
        <?= vite_assets('js/main.jsx', getenv('vite_dev'), 'react') ?>

</head>

<body>
    <div id="root">
        <?= inertia()->app($page) ?>
    </div>
</body>

</html>