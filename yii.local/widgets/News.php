<?php

namespace app\widgets;

use Yii;

class News extends \yii\base\Widget
{
    public $news = [];
    public $width = 200;

    protected $htmlRes = '';

    public function init()
    {
        parent::init();
        if(is_array($this->news) && $this->news !== []) {
            $this->htmlRes = '<div class="site-index"><div class="body-content">';
            foreach (array_chunk($this->news, 3) as $articlesBlock) {
                $this->htmlRes .= '<div class="row">';
                foreach ($articlesBlock as $article) {
                    $this->htmlRes .=
                        '<div class="col-lg-4"><h2>' .
                        ($article['title'] ?? '') .
                        '</h2><img width="' .
                        $this->width .
                        '" src="' .
                        ($article['image'] ?? '') .
                        '"><h4><?=' . ($article['subTitle'] ?? '') .
                        '</h4><p>' . ($article['body'] ?? '') .
                        '</p></div>';
                }
                $this->htmlRes .= '</div>';
            }
        }
        $this->htmlRes .= '</div></div>';
    }

    public function run()
    {
        return $this->htmlRes;
    }
}
