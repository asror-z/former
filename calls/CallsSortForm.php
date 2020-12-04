<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\calls;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\inputes\ZPeriodPickerCallWidget;
use zetsoft\widgets\inputes\ZPeriodPickerWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class CallsSortForm
 */
class CallsSortForm extends ZModel
{

    #region Vars

    /* @var string $start */
    public $start;



    #endregion

    #region Attrs

    public const attrs = [

        'start',
    ];

    #endregion

    #region Const

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

            'start' => function (Form $column) {

                $column->title = Az::l('Name');
                $column->widget = ZPeriodPickerCallWidget::class;
                $column->options = [
                    'config' => [
                        'timepicker' => true,
                    ],
                ];

                return $column;
            },


            /*  'status' => function (Form $column) {

                  $column->title = Az::l('Выберите статус');
                  $column->data = [
                      'new' => Az::l('Новый'),
                      'ring' => Az::l('На исполнения'),
                      'autodial' => Az::l('Автообзвон'),
                      'approved' => Az::l('Одобрен'),
                      'cancel' => Az::l('Отказ'),
                      'not_ordered' => Az::l('Не заказывал'),
                      'double' => Az::l('Дубль'),
                      'incorrect' => Az::l('Треш'),
                      'on_performance' => Az::l('На исполнении'),
                      'check' => Az::l('Проверка'),
                  ];
                  $column->widget = ZSelect2Widget::class;
                  $column->options = [
                     'config' => [
                         'ajax' => false,
                         'placeholder' => Az::l('Cтатус Калл-центра'),
                     ]
                  ];


                  return $column;
              },*/


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
                                'start',
                                'status',
                            ],
                            [],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
