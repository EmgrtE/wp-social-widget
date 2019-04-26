<?php

// widget template
extract($args);

echo $before_widget;

?>
<ul>
    <?php foreach ($instance as $item) : ?>

    <?php
    $title = $item['title'];
    $class = $item['class'];
    $link = $item['link'];
    $name = $item['name'];
    ?>

    <?php if ($title && $class && $link && $name) : ?>
    <li>
        <a href="<?php echo $link; ?>"
           title="<?php echo $title; ?>"
           target="_blank">
            <i class="fab fa-<?php echo $class; ?>"></i>
            <span><?php echo $name; ?></span>
        </a>
    </li>
    <?php endif; ?>

    <?php endforeach; ?>
</ul>
<?php

echo $after_widget;