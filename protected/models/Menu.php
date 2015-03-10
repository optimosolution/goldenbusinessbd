<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property string $id
 * @property integer $parent
 * @property string $title
 * @property string $controller
 * @property string $url
 * @property string $icon
 * @property integer $ordering
 * @property integer $status
 */
class Menu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{menu}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, url', 'required'),
            array('parent, ordering, status', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 150),
            array('controller, icon', 'length', 'max' => 50),
            array('url', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent, title, controller, url, icon, ordering, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent' => 'Parent',
            'title' => 'Title',
            'controller' => 'Controller',
            'url' => 'Url',
            'icon' => 'Icon',
            'ordering' => 'Ordering',
            'status' => 'Status',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('icon', $this->icon, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    //get menu title
    public static function get_menu_title($id) {
        $title = Menu::model()->findByAttributes(array('id' => $id));
        if (!empty($title->title)) {
            return $title->title;
        } else {
            return null;
        }
    }

    public static function get_active_parent($id) {
        $parent = Yii::app()->db->createCommand()
                ->select('parent')
                ->from('{{menu}}')
                ->where('status=1 AND controller="' . Yii::app()->controller->id . '"')
                ->queryScalar();
        $mid = Yii::app()->db->createCommand()
                ->select('id')
                ->from('{{menu}}')
                ->where('status=1 AND controller="' . Yii::app()->controller->id . '"')
                ->queryScalar();

        $css_class = '';
        if ($parent == $id or $mid == $id) {
            $css_class = 'active open';
        } else {
            $css_class = '';
        }
        return $css_class;
    }

    public static function get_active_menu($url) {
        $pieces = explode("/", $url);
        $css_class = '';
        if (isset(Yii::app()->controller->id) && isset(Yii::app()->controller->action->id)) {
            if (Yii::app()->controller->id == @$pieces[1] && Yii::app()->controller->action->id == @$pieces[2]) {
                $css_class = 'active';
            } else {
                $css_class = '';
            }
        }
        return $css_class;
    }

    public static function get_menu() {
        $parent1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{menu}}')
                ->where('parent=0 AND status=1')
                ->order('ordering,title ASC')
                ->queryAll();
        echo '<ul class="nav nav-list">';
        foreach ($parent1 as $key => $values1) {
            echo '<li class="' . Menu::get_active_parent($values1["id"]) . '">';
            if (Menu::get_count_parent($values1["id"]) > 0) {
                echo CHtml::link('<i class="' . $values1["icon"] . '"></i> <span class="menu-text">' . $values1["title"] . '</span><b class="arrow icon-angle-down"></b>', array($values1["url"]), array('class' => 'dropdown-toggle'));
            } else {
                echo CHtml::link('<i class="' . $values1["icon"] . '"></i> <span class="menu-text">' . $values1["title"] . '</span>', array($values1["url"]), array('class' => 'dropdown-toggle'));
            }
            $parent2 = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('{{menu}}')
                    ->where('parent=' . $values1["id"] . ' AND status=1')
                    ->order('ordering,title ASC')
                    ->queryAll();
            if (count($parent2) > 0) {
                echo '<ul class="submenu">';
                foreach ($parent2 as $key => $values2) {
                    echo '<li class="' . Menu::get_active_menu($values2["url"]) . '">';
                    if (Menu::get_count_parent($values2["id"]) > 0) {
                        echo CHtml::link('<i class="icon-double-angle-right"></i> ' . $values2["title"] . '<b class="arrow icon-angle-down"></b>', array($values2["url"]), array('class' => 'dropdown-toggle'));
                    } else {
                        echo CHtml::link('<i class="icon-double-angle-right"></i> ' . $values2["title"], array($values2["url"]), array('class' => 'dropdown-toggle'));
                    }
                    $parent3 = Yii::app()->db->createCommand()
                            ->select('*')
                            ->from('{{menu}}')
                            ->where('parent=' . $values2["id"] . ' AND status=1')
                            ->order('ordering,title ASC')
                            ->queryAll();
                    if (count($parent3) > 0) {
                        echo '<ul class="submenu">';
                        foreach ($parent3 as $key => $values3) {
                            echo '<li class="' . Menu::get_active_menu($values3["url"]) . '">';
                            echo CHtml::link('<i class="icon-wrench"></i> ' . $values3["title"], array($values3["url"]));
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }

    public static function get_menu_new() {
        $parent1 = Yii::app()->db->createCommand()
                ->select('id,parent,title')
                ->from('{{menu}}')
                ->where('parent=0 AND status=1')
                ->order('parent,title')
                ->queryAll();
        $option = '<select id="Menu_parent" name="Menu[parent]" class="span5">';
        $option .= '<option value="0">--please select--</option>';
        foreach ($parent1 as $key => $values1) {
            $option .= '<option value="' . $values1["id"] . '" class="text-primary">' . $values1["title"] . '</option>';
            $parent2 = Yii::app()->db->createCommand()
                    ->select('id,parent,title')
                    ->from('{{menu}}')
                    ->where('parent=' . $values1["id"] . ' AND status=1')
                    ->order('ordering,title')
                    ->queryAll();
            foreach ($parent2 as $key => $values2) {
                $option .= '<option value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                $parent3 = Yii::app()->db->createCommand()
                        ->select('id,parent,title')
                        ->from('{{menu}}')
                        ->where('parent=' . $values2["id"] . ' AND status=1')
                        ->order('ordering,title')
                        ->queryAll();
                foreach ($parent3 as $key => $values3) {
                    $option .= '<option value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    $parent4 = Yii::app()->db->createCommand()
                            ->select('id,parent,title')
                            ->from('{{menu}}')
                            ->where('parent=' . $values3["id"] . ' AND status=1')
                            ->order('ordering,title')
                            ->queryAll();
                    foreach ($parent4 as $key => $values4) {
                        $option .= '<option value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                    }
                }
            }
        }
        $option .= '</select>';

        return $option;
    }

    public static function get_menu_update($id) {
        $parent1 = Yii::app()->db->createCommand()
                ->select('id,parent,title')
                ->from('{{menu}}')
                ->where('parent=0 AND status=1')
                ->order('parent,title')
                ->queryAll();
        $option = '<select id="Menu_parent" name="Menu[parent]" class="span5">';
        $option .= '<option value="0">--please select--</option>';
        foreach ($parent1 as $key => $values1) {
            if ($id == $values1["id"]) {
                $option .= '<option selected="selected" value="' . $values1["id"] . '" class="text-primary">' . $values1["title"] . '</option>';
            } else {
                $option .= '<option value="' . $values1["id"] . '" class="text-primary">' . $values1["title"] . '</option>';
            }
            $parent2 = Yii::app()->db->createCommand()
                    ->select('id,parent,title')
                    ->from('{{menu}}')
                    ->where('parent=' . $values1["id"] . ' AND status=1')
                    ->order('ordering,title')
                    ->queryAll();
            foreach ($parent2 as $key => $values2) {
                if ($id == $values2["id"]) {
                    $option .= '<option selected="selected" value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                } else {
                    $option .= '<option value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                }
                $parent3 = Yii::app()->db->createCommand()
                        ->select('id,parent,title')
                        ->from('{{menu}}')
                        ->where('parent=' . $values2["id"] . ' AND status=1')
                        ->order('ordering,title')
                        ->queryAll();
                foreach ($parent3 as $key => $values3) {
                    if ($id == $values3["id"]) {
                        $option .= '<option selected="selected" value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    } else {
                        $option .= '<option value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    }
                    $parent4 = Yii::app()->db->createCommand()
                            ->select('id,parent,title')
                            ->from('{{menu}}')
                            ->where('parent=' . $values3["id"] . ' AND status=1')
                            ->order('ordering,title')
                            ->queryAll();
                    foreach ($parent4 as $key => $values4) {
                        if ($id == $values4["id"]) {
                            $option .= '<option selected="selected" value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                        } else {
                            $option .= '<option value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                        }
                    }
                }
            }
        }
        $option .= '</select>';

        return $option;
    }

//get menu for view
    public static function get_menu_view($id) {
        $title = Menu::model()->findByAttributes(array('id' => $id));
        $val_top = '';
        $val_middle = '';
        if ($title->parent > 0) {
            $parent = Menu::model()->findByAttributes(array('id' => $title->parent));
            $val_middle = $parent->title . ' &raquo; ';
            if ($parent->parent > 0) {
                $top = Menu::model()->findByAttributes(array('id' => $parent->parent));
                $val_top = $top->title . ' &raquo; ';
            }
        }
        if (!empty($title->title)) {
            return $val_top . '' . $val_middle . '' . $title->title;
        } else {
            return null;
        }
    }

    public static function get_count_parent($menu_id) {
        $total = Yii::app()->db->createCommand()
                ->select('COUNT(*)')
                ->from('{{menu}}')
                ->where('parent=' . $menu_id)
                ->queryScalar();

        return $total;
    }

}
