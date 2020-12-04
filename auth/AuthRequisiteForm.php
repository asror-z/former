<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\auth;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\incores\ZMCheckboxWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class AuthRequisiteForm
 */
class AuthRequisiteForm extends ZModel
{

    #region Vars

    /* @var string $inn */
    public $inn;

    /* @var string $okonx */
    public $okonx;

    /* @var string $bank */
    public $bank;

    /* @var string $mfo */
    public $mfo;

    /* @var string $patent */
    public $patent;



    #endregion

    #region Attrs

    public const attrs = [

        'inn',
        'okonx',
        'bank',
        'mfo',
        'patent',
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
           
            'inn' => function (Form $column) {

                $column->title = Az::l('ИНН');


                return $column;
            },
            
           
            'okonx' => function (Form $column) {

                $column->title = Az::l('ОКОНХ');


                return $column;
            },
            
           
            'bank' => function (Form $column) {

                $column->title = Az::l('Банк');


                return $column;
            },
            
           
            'mfo' => function (Form $column) {

                $column->title = Az::l('МФО');


                return $column;
            },
            
           
            'patent' => function (Form $column) {

                $column->title = Az::l('Патент');


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
                                'inn',
                                'okonx',
                                'bank',
                                'mfo',
                                'patent',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
