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
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\images\ZImageWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHHiddenInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\values\ZLinkWidget;



/**
 *
 * Class CallsStatsForm
 */
class CallsStatsForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $number */
    public $number;

    /* @var string $answered */
    public $answered;

    /* @var string $no_answer */
    public $no_answer;

    /* @var string $busy */
    public $busy;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'name',
        'number',
        'answered',
        'no_answer',
        'busy',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Статистика звонков';

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

            $config->title = Az::l('Статистика звонков');
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


            'id' => function (Form $column) {

                $column->title = Az::l('Name');
                $column->showDyna = false;

                return $column;
            },

            'name' => function (Form $column) {

                $column->title = Az::l('Name');


                return $column;
            },


            'number' => function (Form $column) {

                $column->title = Az::l('Номер');
                $column->tooltip = Az::l('Nomer operatora');


                return $column;
            },


            'answered' => function (Form $column) {

                $column->title = Az::l('ОТВЕТЫ');
                $column->widget = ZLinkWidget::class;
                $column->valueWidget = ZLinkWidget::class;
                $column->filterWidget = ZHInputWidget::class;
                $column->valueOptions = [
                    'config' => [
                        'link' => '/shop/supervisor/stats/stats-details_cdr',
                    ],
                ];


                return $column;
            },


            'no_answer' => function (Form $column) {

                $column->title = Az::l('НЕТ ОТВЕТА');
                $column->widget = ZLinkWidget::class;
                $column->valueWidget = ZLinkWidget::class;
                $column->filterWidget = ZHInputWidget::class;
                $column->valueOptions = [
                    'config' => [
                        'link' => '/shop/supervisor/stats/stats-details_cdr',
                    ],
                ];


                return $column;
            },


            'busy' => function (Form $column) {

                $column->title = Az::l('ЗАНЯТ');
                $column->widget = ZLinkWidget::class;
                $column->valueWidget = ZLinkWidget::class;
                $column->filterWidget = ZHInputWidget::class;
                $column->valueOptions = [
                    'config' => [
                        'link' => '/shop/supervisor/stats/stats-details_cdr',
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
                                'id',
                                'photo',
                                'name',
                                'company',
                                'price',
                                'amount',
                                'measure',
                                'currency',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
