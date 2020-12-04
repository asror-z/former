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
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\dbitem\data\Event;



/**
 *
 * Class ShopOfferForm
 */
class ShopOfferForm extends ZModel
{

    #region Vars

    /* @var string $offer */
    public $offer;

    /* @var string $start */
    public $start;

    /* @var string $end */
    public $end;



    #endregion

    #region Attrs

    public const attrs = [

        'offer',
        'start',
        'end',
    ];

    #endregion

    #region Const

    /* @var array $_offer*/
    public $_offer;  
    public const offer = [
        'deal_of_day' => 'deal_of_day',
        'super_offer' => 'super_offer',
        'free_delivery' => 'free_delivery',
        'top_sell' => 'top_sell',
        'new' => 'new',
    ];

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Специальные предложения';

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

            $config->title = Az::l('Специальные предложения');
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
           
            'offer' => function (Form $column) {

                $column->title = Az::l('Тип предложения');
                $column->data = [
                    'deal_of_day' => Az::l('Товар дня'),
                    'super_offer' => Az::l('Супер предложение'),
                    'free_delivery' => Az::l('Бесплатная доставка'),
                    'top_sell' => Az::l('Топ продаж'),
                    'new' => Az::l('Новинка'),
                ];
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'start' => function (Form $column) {

                $column->title = Az::l('Начало');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'end' => function (Form $column) {

                $column->title = Az::l('Конец');
                $column->rules = [
                    [
                        'zetsoft\\system\\validate\\ZRequiredValidator',
                    ],
                ];
                $column->widget = ZKDateTimePickerWidget::class;


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
                                'offer',
                                'start',
                                'end',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
