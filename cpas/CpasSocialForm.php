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
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class CpasSocialForm
 */
class CpasSocialForm extends ZModel
{

    #region Vars

    /* @var string $telegram */
    public $telegram;

    /* @var string $github */
    public $github;

    /* @var string $facebook */
    public $facebook;

    /* @var string $twitter */
    public $twitter;

    /* @var string $linked_in */
    public $linked_in;

    /* @var string $google_plus */
    public $google_plus;



    #endregion

    #region Attrs

    public const attrs = [

        'telegram',
        'github',
        'facebook',
        'twitter',
        'linked_in',
        'google_plus',
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
           
            'telegram' => function (Form $column) {

                $column->title = Az::l('Telegram');


                return $column;
            },
            
           
            'github' => function (Form $column) {

                $column->title = Az::l('GitHub');


                return $column;
            },
            
           
            'facebook' => function (Form $column) {

                $column->title = Az::l('Facebook');


                return $column;
            },
            
           
            'twitter' => function (Form $column) {

                $column->title = Az::l('Twitter');


                return $column;
            },
            
           
            'linked_in' => function (Form $column) {

                $column->title = Az::l('Linked in');


                return $column;
            },
            
           
            'google_plus' => function (Form $column) {

                $column->title = Az::l('Google Plus');


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
