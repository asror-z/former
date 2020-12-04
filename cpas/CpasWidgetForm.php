<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\cpas;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CpasWidgetForm
 */
class CpasWidgetForm extends ZModel
{

    #region Vars

    /* @var string $last_day */
    public $last_day;

    /* @var string $ordered */
    public $ordered;

    /* @var string $comeback */
    public $comeback;

    /* @var string $online */
    public $online;

    /* @var string $pricehold */
    public $pricehold;



    #endregion

    #region Attrs

    public const attrs = [

        'last_day',
        'ordered',
        'comeback',
        'online',
        'pricehold',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Shipment';

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

            $config->title = Az::l('Shipment');
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
           
            'last_day' => function (Form $column) {

                $column->title = Az::l('Последний день скидки');
                $column->widget = ZKSwitchInputWidget::class;

                return $column;
            },

            'ordered' => function (Form $column) {

                $column->title = Az::l('{name} только что заказала...');
                $column->tooltip = Az::l('Валерия Агафонова г.Новосибирск заказала 3 шт.');
                $column->widget = ZKSwitchInputWidget::class;

                return $column;
            },
            
            'comeback' => function (Form $column) {

                $column->title = Az::l('Включить Comebacker');
                $column->tooltip = Az::l('Не дает пользователю так просто уйти');
                $column->widget = ZKSwitchInputWidget::class;

                return $column;
            },


            'online' => function (Form $column) {

                $column->title = Az::l('Пользователей онлайн');
                $column->tooltip = Az::l('Сейчас 68 пользователей просмотривают эту страницу');
                $column->widget = ZKSwitchInputWidget::class;


                return $column;
            },
            
           
            'pricehold' => function (Form $column) {

                $column->title = Az::l('Мы заморозили цену');
                $column->tooltip = Az::l('МЫ ЗАМОРОЗИЛИ ЦЕНУ! 1$ = 46 РУБ
Осталось 81 товаров по старому курсу!');
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
                                'last_day',
                                'ordered',
                            ],
                            [
                                'comeback',
                                'online',
                            ],
                            [
                                'pricehold',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
