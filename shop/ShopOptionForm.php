<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\shop;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopCategory;
use zetsoft\models\shop\ShopOption;
use zetsoft\models\shop\ShopOptionType;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ShopOptionForm
 */
class ShopOptionForm extends ZModel
{

    #region Vars

    /* @var string $shop_option_type_id */
    public $shop_option_type_id;

    /* @var string $shop_option_id */
    public $shop_option_id;

    /* @var string $is_combination */
    public $is_combination;



    #endregion

    #region Attrs

    public const attrs = [

        'shop_option_type_id',
        'shop_option_id',
        'is_combination',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Номер телефона';

    public function init()
    {
        parent::init();
    }

    #endregion

    #region Config

    /**
     *
     * Function  config
     * @return  \Closure
     */

    public function config()
    {
        return function (Config $config) {

            $config->title = Az::l('Номер телефона');
            $config->ajax = false;
            return $config;
        };
    }

    #endregion

    #region Column

    /**
     *
     * Function column
     * @return array
     */
    public function column()
    {
        if (!empty($this->configs->column))
            return $this->configs->column;

        return ZArrayHelper::merge(parent::column(), [

            'shop_option_type_id' => function (Form $column) {

                $column->title = Az::l('Название параметра');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->data = function (ShopOptionForm $model) {

                    if (empty($model->parentModel))
                        return [];

                    /** @var ShopCategory $category */
                    $category = $model->parentModel->getShopCategoryOne();

                    if ($category === null)
                        return [];
                    //  vd($category->shop_option_type);

                    if (empty($category->shop_option_type))
                        return [];

                    $optionTypes = ZArrayHelper::getColumn($category->shop_option_type, 'shop_option_type_id');

                    $optionTypesAll = ShopOptionType::findAllArray([
                        'id' => $optionTypes
                    ]);

                    $return = ZArrayHelper::map($optionTypesAll, 'id', 'name');

                    return $return;
                };
                $column->widget = ZKSelect2Widget::class;
                $column->ajax = false;
                /*  $column->options = [
                      'config' => [
                          'depend' => 'shop_option_branch_id',
                          'method' => 'getOptionTypesByBranchIds',
                          'ajax' => false,
                      ],
                  ];*/


                return $column;
            },

            'shop_option_id' => function (Form $column) {

                $column->title = Az::l('Значение параметра');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->data = function (ShopOptionForm $model) {
                    //    vd($model->shop_option_branch_id);

                    if (empty($model->shop_option_type_id))
                        return [];


                    $data = ShopOption::findAllArray([
                        'shop_option_type_id' => $model->shop_option_type_id
                    ]);

                    if (empty($data))
                        return [
                            'empty' => Az::l('Данные не Заполнены')
                        ];

                    //  vd('sadfa', $model->attributes);

                    $return = ZArrayHelper::map($data, 'id', 'name');

                    //    vd($return);

                    return $return;
                };
                $column->widget = ZKSelect2Widget::class;
                $column->multiple = true;
                $column->ajax = false;


                return $column;
            },


            'is_combination' => function (Form $column) {

                $column->title = Az::l('Комбинация?');
                $column->dbType = dbTypeBoolean;
                $column->value = false;
                $column->defaultValue = false;
                $column->widget = ZKSwitchInputWidget::class;

                return $column;
            },


        ], $this->configs->replace);
    }


    #endregion

    #region Blocks

    /**
     *
     * Function  blocks
     * @return  array
     */

    public function card()
    {
        return [
            [
                'title' => Az::l('Первый этап'),
                'items' => [
                    [
                        'title' => Az::l('Форма'),
                        'items' => [
                            [
                                'shop_option_branch_id',
                                'shop_option_type_id',
                                'is_combination',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
