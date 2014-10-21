/**
 * Article Pictures
 */
<?php

class Picture extends BaseModel
{
    /**
     * Database table name (without prefix)
     * @var string
     */
    protected $table = 'tblRacePics';
 
    /**
     * Soft delete
     * @var boolean
     */
    protected $softDelete = true;
 
    /**
     * Object-relational model: Vesting article
     * @return object Article
     */
    public function article()
    {
        return $this->belongsTo('Article', 'article_id');
    }
 
}