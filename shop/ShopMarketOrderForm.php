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
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHRadioButtonGroupWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;



/**
 *
 * Class ShopMarketOrderForm
 */
class ShopMarketOrderForm extends ZModel
{

    #region Vars

    /* @var string $address_id */
    public $address_id;

    /* @var string $shipment_type_id */
    public $shipment_type_id;



    #endregion

    #region Attrs

    public const attrs = [

        'address_id',
        'shipment_type_id',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Переводы';

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

            $config->title = Az::l('Переводы');
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
           
            'address_id' => function (Form $column) {

                $column->title = Az::l('address');
                $column->widget = ZKSelect2Widget::class;
                $column->options = [
						'data' =>[
							'2' => 'otamga',
							'3' => 'test 4',
							'4' => '1111',
							'5' => 'Test Address',
						],
					];
                $column->filterOptions = [
						'data' =>[
							'2' => 'otamga',
							'3' => 'test 4',
							'4' => '1111',
							'5' => 'Test Address',
						],
					];


                return $column;
            },
            
           
            'shipment_type_id' => function (Form $column) {

                $column->title = Az::l('address');
                $column->widget = ZHRadioButtonGroupWidget::class;
                $column->options = [
						'data' =>[
							'2' => 'otamga',
							'3' => 'test 4',
							'4' => '1111',
							'5' => 'Test Address',
						],
					];
                $column->filterOptions = [
						'data' =>[
							'2' => 'otamga',
							'3' => 'test 4',
							'4' => '1111',
							'5' => 'Test Address',
						],
					];
                $column->mergeHeader = true;


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
                                'address_id',
                                'shipment_type_id',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
