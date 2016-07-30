<?php namespace Iginikolaev\Rapyd\Demo;

/**
 * ArticleDetail
 */
class ArticleDetail extends \Eloquent
{

    protected $table = 'demo_article_detail';
    public $timestamps = false;

    public function article()
    {
        return $this->belongsTo('Iginikolaev\Rapyd\Models\Article', 'article_id');
    }

}
