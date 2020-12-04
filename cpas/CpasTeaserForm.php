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

use zetsoft\dbdata\cpas\CpasTeaserData;
use zetsoft\dbitem\data\Config;
use zetsoft\models\cpas\CpasTeaser;
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
 * Class CpasTeaserForm
 */
class CpasTeaserForm extends ZModel
{

    #region Vars

    /* @var string $Mgid_com */
    public $Mgid_com;

    /* @var string $traficfactory_biz */
    public $traficfactory_biz;

    /* @var string $bigclick_me */
    public $bigclick_me;

    /* @var string $ads_keeper */
    public $ads_keeper;

    /* @var string $Bodyclick_ru */
    public $Bodyclick_ru;

    /* @var string $Kadam_net */
    public $Kadam_net;

    /* @var string $Visitweb_com */
    public $Visitweb_com;

    /* @var string $LuckyAds_pro */
    public $LuckyAds_pro;

    /* @var string $Redclick_ru */
    public $Redclick_ru;

    /* @var string $Adhub_com */
    public $Adhub_com;

    /* @var string $Trafficstrars_com */
    public $Trafficstrars_com;



    #endregion

    #region Attrs

    public const attrs = [

        'Mgid_com',
        'traficfactory_biz',
        'bigclick_me',
        'ads_keeper',
        'Bodyclick_ru',
        'Kadam_net',
        'Visitweb_com',
        'LuckyAds_pro',
        'Redclick_ru',
        'Adhub_com',
        'Trafficstrars_com',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Тизерные сети';

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

            $config->title = Az::l('Тизерные сети');
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

        $model = new CpasTeaserData();
        $data = $model->lang();


        foreach ($data as $key => $item) {

            $return[$key] = function (Form $column) use ($key,$item) {

                $column->title = $key;
                $column->widget = ZHInputWidget::class;
                $column->value = $item;
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
