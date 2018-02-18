<?php

/* @var $this yii\web\View */

$this->title = 'Hello';
?>
<?php $this->beginBlock('select2') ?>
<?php $this->endBlock() ?>

<?php $this->beginBlock('footer') ?>
<p class="pull-left"><?= date('d.m.Y') ?></p>
<?php $this->endBlock() ?>

<script>
    $(document).ready(function() {
        $('.select2-container').select2();
    });
</script>

<div class="s2-example">
    <select class="form-control select2-container">
        <?php foreach ($news as $article): ?>
            <option><?= $article['title'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<?= \app\widgets\News::widget(['news' => $news, 'width' => '250']); ?>
