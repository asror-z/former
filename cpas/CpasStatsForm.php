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
use zetsoft\dbitem\data\Form;
use zetsoft\system\actives\ZModel;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class CpasStatsForm
 */
class CpasStatsForm extends ZModel
{

    #region Vars

    /* @var string $day */
    public $day;

    /* @var string $name */
    public $name;

    /* @var string $click */
    public $click;

    /* @var string $hit */
    public $hit;

    /* @var string $epc */
    public $epc;

    /* @var string $cr */
    public $cr;

    /* @var string $approve */
    public $approve;

    /* @var string $trash */
    public $trash;

    /* @var string $wait */
    public $wait;

    /* @var string $finished */
    public $finished;

    /* @var string $all */
    public $all;

    /* @var string $cancel */
    public $cancel;

    /* @var string $valid */
    public $valid;

    /* @var string $enrolled */
    public $enrolled;

    /* @var string $wait_pay */
    public $wait_pay;



    #endregion

    #region Attrs

    public const attrs = [

        'day',
        'name',
        'click',
        'hit',
        'epc',
        'cr',
        'approve',
        'trash',
        'wait',
        'finished',
        'all',
        'cancel',
        'valid',
        'enrolled',
        'wait_pay',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'CPA Stats';

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

            $config->title = Az::l('CPA Stats');
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

            'day' => function (Form $column) {

                $column->title = Az::l('День');


                return $column;
            },


            'name' => function (Form $column) {

                $column->title = Az::l('Name');


                return $column;
            },


            'click' => function (Form $column) {

                $column->title = Az::l('Клики');


                return $column;
            },


            'hit' => function (Form $column) {

                $column->title = Az::l('Хиты');


                return $column;
            },


            'epc' => function (Form $column) {

                $column->title = Az::l('EPC');

                return $column;
            },


            'cr' => function (Form $column) {

                $column->title = Az::l('CR, %');


                return $column;
            },


            'approve' => function (Form $column) {

                $column->title = Az::l('Aпрув');


                return $column;
            },


            'trash' => function (Form $column) {

                $column->title = Az::l('Траш');


                return $column;
            },


            'wait' => function (Form $column) {

                $column->title = Az::l('В ожидание');


                return $column;
            },


            'finished' => function (Form $column) {

                $column->title = Az::l('Приятние');

                return $column;
            },


            'all' => function (Form $column) {

                $column->title = Az::l('Все');

                return $column;
            },


            'cancel' => function (Form $column) {

                $column->title = Az::l('Отмена');

                return $column;
            },


            'valid' => function (Form $column) {

                $column->title = Az::l('Валидные');

                return $column;
            },


            'enrolled' => function (Form $column) {

                $column->title = Az::l('Зачислено');

                return $column;
            },


            'wait_pay' => function (Form $column) {

                $column->title = Az::l('Ожидают');

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
                                'name',
                                'date_deliver',
                                'created_at',
                                'status',
                                'shipment_type',
                                'prepayment',
                                'currency_type',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
