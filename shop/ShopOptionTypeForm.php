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
 * Class ShopOptionTypeForm
 */
class ShopOptionTypeForm extends ZModel
{

    #region Vars

    /* @var string $shop_option_branch_id */
    public $shop_option_branch_id;

    /* @var string $shop_option_type_id */
    public $shop_option_type_id;



    #endregion

    #region Attrs

    public const attrs = [

        'shop_option_branch_id',
        'shop_option_type_id',
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

            'shop_option_branch_id' => function (Form $column) {

                $column->title = Az::l('Категории параметров');
                $column->dbType = dbTypeInteger;
  /*              $column->changeReload = true;
                $column->changeSave = true;*/
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->ajax = false;
                $column->widget = ZKSelect2Widget::class;

                return $column;
            },


            'shop_option_type_id' => function (Form $column) {

                $column->title = Az::l('Название параметра');
                $column->dbType = dbTypeInteger;
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->data = function (ShopOptionTypeForm $model) {
                //    vd($model->shop_option_branch_id);
                    $data = ShopOptionType::findAllArray([
                        'shop_option_branch_id' => $model->shop_option_branch_id
                    ]);
               
                  //  vd('sadfa', $model->attributes);
                    
                    $return = ZArrayHelper::map($data, 'id', 'name');

                //    vd($return);

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
