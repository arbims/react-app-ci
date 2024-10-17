<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?= vite_assets('js/main.js', getenv('vite_dev')) ?>
    <style>
        .bg-gray-100 {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }
    </style>
</head>
<body>
    <?= inertia()->app($page) ?>
</body>
</html>