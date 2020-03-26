<nav>
    <ul>
        <?php foreach ($nav as $navi) :?>
            <li class="<?php print ($_SERVER['PHP_SELF'] == $navi['url']) ?  'active' : ''; ?>">
                <a href="<?php print $navi['url'];?>"><?php print $navi['page'];?></a>
                <?php if(count($navi) > 2): ?>
                    <ul class="menu-dropdown">
                        <?php foreach ($navi['extra'] as $extra) :?>
                            <li>
                                <a href="<?php print $extra['url'];?>"><?php print $extra['page'];?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach;?>
    </ul>
</nav>
