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
use zetsoft\widgets\inputes\ZHInputWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\inputes\ZSelect2Widget;



/**
 *
 * Class PostMplaceCallCenterForm
 */
class PostMplaceCallCenterForm extends ZModel
{

    #region Vars

    /* @var string $new */
    public $new;

    /* @var string $ring */
    public $ring;

    /* @var string $autodial */
    public $autodial;

    /* @var string $approved */
    public $approved;

    /* @var string $cancel */
    public $cancel;

    /* @var string $not_ordered */
    public $not_ordered;

    /* @var string $double */
    public $double;

    /* @var string $incorrect */
    public $incorrect;

    /* @var string $on_performance */
    public $on_performance;

    /* @var string $check */
    public $check;



    #endregion

    #region Attrs

    public const attrs = [

        'new',
        'ring',
        'autodial',
        'approved',
        'cancel',
        'not_ordered',
        'double',
        'incorrect',
        'on_performance',
        'check',
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


        $return = [];

        $model = new ShopOrder();

        foreach ($model->_status_callcenter as $key => $value) {

            $return[$key] = function (Form $column) use ($value) {

                $column->title = $value;
                $column->widget = ZHInputWidget::class;

                return $column;
            };

        }


        return $return;


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
