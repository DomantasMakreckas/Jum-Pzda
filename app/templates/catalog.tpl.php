<section>
    <?php foreach ($data ?? [] as $drink_id => $drink): ?>
        <div class="sandelys">
            <div class="full-beer">
                <p><?php print $drink['data']->getPrice() ?> Eur</p>
                <div class="beer">
                    <img src="<?php print $drink['data']->getImage() ?>">
                    <p><?php print $drink['data']->getName() ?></p>
                    <p><?php print $drink['data']->getDegrees() ?> %</p>
                    <p><?php print $drink['data']->getSize() ?> ml</p>
                </div>
            </div>
            <p>Sandelyje: <?php print $drink['data']->getQuantity() ?></p>
            <?php if ($drink['form'] ?? null): ?>
                <?php print $drink['form']->render(); ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</section>