<?php render('_header',array('title'=>$title))?>

<p>Welcome! This is a landing page while I play around with some code.</p>

<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
    <li data-role="list-divider">Choose a category</li>
    <?php render($content) ?>
</ul>

<?php render('_footer')?>
