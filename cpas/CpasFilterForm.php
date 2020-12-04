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
 * Class CpasFilterForm
 */
class CpasFilterForm extends ZModel
{

    #region Vars

    /* @var string $selectedBtnValue */
    public $selectedBtnValue;

    /* @var string $startdate */
    public $startdate;

    /* @var string $enddate */
    public $enddate;

    /* @var string $selectDays */
    public $selectDays;

    /* @var string $selectedOffer */
    public $selectedOffer;

    /* @var string $selectedFlow */
    public $selectedFlow;

    /* @var string $selectedland */
    public $selectedland;

    /* @var string $selectedPreland */
    public $selectedPreland;

    /* @var string $selectedCountry */
    public $selectedCountry;

    /* @var string $selectedSub */
    public $selectedSub;

    /* @var string $selectedUtm */
    public $selectedUtm;

    /* @var string $selectTimes */
    public $selectTimes;



    #endregion

    #region Attrs

    public const attrs = [

        'selectedBtnValue',
        'startdate',
        'enddate',
        'selectDays',
        'selectedOffer',
        'selectedFlow',
        'selectedland',
        'selectedPreland',
        'selectedCountry',
        'selectedSub',
        'selectedUtm',
        'selectTimes',
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




            'selectedBtnValue' => function (Form $column) {

                $column->title = Az::l('selectedBtnValue');


                return $column;
            },


            'startdate' => function (Form $column) {

                $column->title = Az::l('startdate');


                return $column;
            },


            'enddate' => function (Form $column) {

                $column->title = Az::l('enddate');


                return $column;
            },


            'selectDays' => function (Form $column) {

                $column->title = Az::l('selectDays');


                return $column;
            },


            'selectedOffer' => function (Form $column) {

                $column->title = Az::l('selectedOffer');

                return $column;
            },


            'selectedFlow' => function (Form $column) {

                $column->title = Az::l('selectedFlow');


                return $column;
            },


            'selectedland' => function (Form $column) {

                $column->title = Az::l('selectedland');


                return $column;
            },


            'selectedPreland' => function (Form $column) {

                $column->title = Az::l('selectedPreland');


                return $column;
            },


            'selectedCountry' => function (Form $column) {

                $column->title = Az::l('selectedCountry');


                return $column;
            },


            'selectedSub' => function (Form $column) {

                $column->title = Az::l('selectedSub');

                return $column;
            },


            'selectedUtm' => function (Form $column) {

                $column->title = Az::l('selectedUtm');

                return $column;
            },


            'selectTimes' => function (Form $column) {

                $column->title = Az::l('selectTimes');

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
