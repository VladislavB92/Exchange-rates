<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange rates</title>
</head>

<body>
    <div class="stats">
        <h1>Echange rates for 04.11.2020.</h1>

        <?php foreach ($actualStats as $statsPerUnit) : ?>
            Currency: <strong><?php echo $statsPerUnit->getCurrency(); ?></strong><br>
            Rate: <strong><?php echo $statsPerUnit->getRate(); ?></strong><br><br>
        <?php endforeach; ?>
    </div>
</body>

</html>