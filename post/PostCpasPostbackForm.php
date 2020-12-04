<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\post;

use zetsoft\dbitem\data\Config;
use zetsoft\models\shop\ShopOrder;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputPopoverWidget;
use zetsoft\widgets\inputes\ZHInputPopoverWidgetKhusan;
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class PostCpasPostbackForm
 */
class PostCpasPostbackForm extends ZModel
{

    #region Vars

    /* @var string $method */
    public $method;

    /* @var string $new */
    public $new;

    /* @var string $approve */
    public $approve;

    /* @var string $trash */
    public $trash;

    /* @var string $cancel */
    public $cancel;



    #endregion

    #region Attrs

    public const attrs = [

        'method',
        'new',
        'approve',
        'trash',
        'cancel',
    ];

    #endregion

    #region Const

    /* @var array $_method*/
    public $_method;  
    public const method = [
        'post' => 'post',
        'get' => 'get',
    ];

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

            'method' => function (Form $column) {

                $column->title = Az::l('Отправить Postback');
                $column->dbType = dbTypeString;
                $column->value = 'get';
                $column->widget = ZKSelect2Widget::class;
                $column->data = [
                    'post' => 'POST',
                    'get' => 'GET',
                ];

                return $column;
            },


            'new' => function (Form $column) {

                $column->title = Az::l('Новый');
                $column->widget = ZHInputPopoverWidget::class;
                return $column;
            },
            
           
            'approve' => function (Form $column) {

                $column->title = Az::l('approve');
                $column->widget = ZHInputPopoverWidget::class;


                return $column;
            },
            
           
            'trash' => function (Form $column) {

                $column->title = Az::l('trash');
                $column->widget = ZHInputPopoverWidget::class;


                return $column;
            },
            
           
            'cancel' => function (Form $column) {

                $column->title = Az::l('cancel');
                $column->widget = ZHInputPopoverWidget::class;


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
