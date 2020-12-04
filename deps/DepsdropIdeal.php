<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\deps;

use zetsoft\dbitem\data\Form;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Config;
use zetsoft\system\actives\ZModel;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class DepsdropIdeal
 */
class DepsdropIdeal extends ZModel
{

    #region Vars

    /* @var string $page_module_id */
    public $page_module_id;

    /* @var string $page_control_id */
    public $page_control_id;

    /* @var string $page_action_id */
    public $page_action_id;



    #endregion

    #region Attrs

    public const attrs = [

        'page_module_id',
        'page_control_id',
        'page_action_id',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Продукты';

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
        return static function (Config $config) {

            $config->addBy = true;
            $config->hasOne = [
                'CoreCategory' => [
                    'shop_category_id' => 'id',
                ],
                'ShopBrand' => [
                    'core_brand_id' => 'id',
                ],
            ];
            $config->hasMulti = [
                'CoreOption' => [
                    'shop_option_ids' => 'id',
                ],
            ];
            $config->hasMany = [
                'CoreElement' => [
                    'shop_product_id' => 'id',
                ],
            ];
            $config->title = Az::l('Продукты');
            $config->extraConfig = true;
            $config->extraColumn = true;

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
           
            'page_module_id' => function (Form $column) {

                $column->title = Az::l('Категория');
                $column->tooltip = Az::l('Категория ');
                $column->dbType = dbTypeInteger;
                $column->widget = ZDepdropWidget::class;
                $column->fkTable = 'page_module';


                return $column;
            },
            
           
            'page_control_id' => function (Form $column) {

                $column->title = Az::l('brand ?');
                $column->tooltip = Az::l('brand ');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKSelect2Widget::class;
                $column->options = [
						'config' =>[
							'depend' => 'page_module_id',
							'url' => '/core/grapes/depdropData.aspx',
							'params' =>[
								'dependModel' => 'zetsoft\models\page\PageControl',
								'dependAttr' => 'page_module_id',
							],
						],
					];


                return $column;
            },
            
           
            'page_action_id' => function (Form $column) {

                $column->title = Az::l('options ?');
                $column->tooltip = Az::l('options ');
                $column->dbType = dbTypeJsonb;
                $column->widget = ZKSelect2Widget::class;
                $column->options = [
						'config' =>[
							'depend' => 'page_control_id',
							'url' => '/core/grapes/depdropData.aspx',
							'params' =>[
								'dependModel' => 'zetsoft\models\page\PageAction',
								'dependAttr' => 'page_control_id',
							],
						],
					];


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
                                'page_module_id',
                                'page_control_id',
                                'page_action_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
