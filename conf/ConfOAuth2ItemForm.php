<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\conf;

use zetsoft\dbitem\data\Config;
use zetsoft\dbitem\data\Form;
use zetsoft\service\smart\Fake;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\widgets\inputes\ZDepdropWidget;
use zetsoft\widgets\inputes\ZFileInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\widgets\places\ZGoogleWidget;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class ConfOAuth2ItemForm
 */
class ConfOAuth2ItemForm extends ZModel
{

    #region Vars

    /* @var string $name */
    public $name;

    /* @var string $enable */
    public $enable;

    /* @var string $client_id */
    public $client_id;

    /* @var string $client_secret */
    public $client_secret;



    #endregion

    #region Attrs

    public const attrs = [

        'name',
        'enable',
        'client_id',
        'client_secret',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Курсы валют';

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

            $config->title = Az::l('Курсы валют');
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
           
            'name' => function (Form $column) {

                $column->title = Az::l('Название');


                return $column;
            },
            
           
            'enable' => function (Form $column) {

                $column->title = Az::l('Включен');
                $column->widget = ZKSwitchInputWidget::class;


                return $column;
            },
            
           
            'client_id' => function (Form $column) {

                $column->title = Az::l('Client ID');


                return $column;
            },
            
           
            'client_secret' => function (Form $column) {

                $column->title = Az::l('Client Secret');


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
                                'name',
                                'enable',
                                'client_id',
                                'client_secret',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
