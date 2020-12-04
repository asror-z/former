<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\map;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\FormDb;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\system\Az;
use zetsoft\widgets\former\ZFormWidget;
use zetsoft\widgets\former\ZMultiWidget;
use zetsoft\widgets\inputes\ZInputWidget;
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKTimePickerWidget;
use zetsoft\models\user\User;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\widgets\values\ZFormViewWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class MapAdressForm
 */
class MapAdressForm extends ZModel
{

    #region Vars

    /* @var string $street */
    public $street;

    /* @var string $home */
    public $home;

    /* @var string $orientation */
    public $orientation;

    /* @var string $postal_code */
    public $postal_code;



    #endregion

    #region Attrs

    public const attrs = [

        'street',
        'home',
        'orientation',
        'postal_code',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Информация об адресе';

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

            $config->title = Az::l('Информация об адресе');
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
           
            'street' => function (Form $column) {

                $column->title = Az::l('Улица/Переулок');


                return $column;
            },
            
           
            'home' => function (Form $column) {

                $column->title = Az::l('Дом, Этаж, № квартиры');
                $column->rules = [];


                return $column;
            },
            
           
            'orientation' => function (Form $column) {

                $column->title = Az::l('Ориентир');


                return $column;
            },
            
           
            'postal_code' => function (Form $column) {

                $column->title = Az::l('Почтовый индекс');
                // start|MuminovUmid|2020-10-19
                $column->dbType = dbTypeString;
                // end|MuminovUmid|2020-10-19

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
                                'street',
                                'home',
                                'orientation',
                                'postal_code',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
