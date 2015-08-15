<?php
/* @var $this ContentController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = 'Income Tax Ordinance - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Income Tax Ordinance',
);
?>
<h1>Income Tax Ordinance</h1>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <?php
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content_category}}')
                ->where('parent_id = 193')
                ->order('ordering ASC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo CHtml::link('<div style="margin:20px 0px 0px 0px; font-size:20px;">' . $values['title'] . '</div>', array('/content/chapter', 'id' => $values['id']), array('class' => '')) . '<br />';
            $array2 = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{content}}')
                    ->where('catid = ' . $values['id'])
                    ->order('ordering ASC')
                    ->queryAll();
            foreach ($array2 as $key => $values2) {
                echo '<span style="margin-left:20px;"></span>'.CHtml::link('<i class="fa fa-external-link-square"></i> ' . $values2['title'], array('/content/ordinanceview', 'id' => $values2['id']), array('class' => '')) . '<br />';
            }
        }
        ?>
    </div>
</div>