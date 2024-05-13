<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('templates/head') ?>
</head>
<body>
    <?= $this->include('templates/header') ?>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-2">
        <div class="flex flex-col">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</main>

</body>
</html>