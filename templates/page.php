<!DOCTYPE html>
<html lang="<?= $lang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $summary ?>">
    <link rel=stylesheet href="/site.css">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <?= $this->meta() ?>
</head>

<body>

    <div id="container">

        <div class="flex flex-row justify-between items-center">
            <a href="/" class="font-bold">UPSC Guide</a>
        </div>

        <h1><?= $title ?></h1>

        <article class="content prose prose-zinc prose-img:rounded-xl max-w-none dark:prose-invert">
            <?= $content ?>
        </article>

        <?php if (isset($next) || isset($previous)): ?>
            <?php if (isset($previous)): ?>
                <p class="previous">
                    <a href="<?= $previous ?>">&larr; Previous Page</a>
                </p>
            <?php endif ?>
            <?php if (isset($next)): ?>
                <p class="next">
                    <a href="<?= $next ?>">Next Page &rarr;</a>
                </p>
            <?php endif ?>
        <?php endif ?>
        <?php if (isset($pages)): ?>
            <h2>Chapters</h2>
            <ul>
                <?php foreach ($pages as $url => $text): ?>
                    <?php if (str_contains($url, "index.html"))
                        continue ?>
                        <li>
                            <a class="font-bold underline underline-offset-1" href="<?= $url ?>"><?= $text ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

        <p class="footer">
            by <a href="https://github.com/namankumar80510" target="_blank">Naman Kumar</a> | <a
                href="/about.html">about</a> | <a href="/languages.html">read in different language</a>
        </p>
    </div>

    <script src="//instant.page/5.2.0" type="module"
        integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
</body>

</html>