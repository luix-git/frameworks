<?php

/* @var $this yii\web\View */

$this->title = 'Hello';
?>
<?php $this->beginBlock('footer') ?>
<p class="pull-left"><?= date('d.m.Y') ?></p>
<?php $this->endBlock() ?>

<div class="site-index">
    <div class="body-content">
        <?php foreach (array_chunk($news, 3) as $articlesBlock): ?>
            <div class="row">
                <?php foreach ($articlesBlock as $article): ?>
                    <div class="col-lg-4">
                        <h2><?= $article['title'] ?? '' ?></h2>
                        <img width="200" src="<?= $article['image'] ?? '' ?>">
                        <h4><?= $article['subTitle'] ?? '' ?></h4>
                        <p><?= $article['body'] ?? '' ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
