<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\former\eyuf;

use zetsoft\dbitem\data\Config;
use zetsoft\system\Az;
use zetsoft\system\actives\ZModel;
use zetsoft\system\helpers\ZArrayHelper;
use zetsoft\dbitem\data\Form;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufAdditionalEducationForm
 */
class EyufAdditionalEducationForm extends ZModel
{

    #region Vars

    /* @var string $organization */
    public $organization;

    /* @var string $country */
    public $country;

    /* @var string $city */
    public $city;

    /* @var string $start_date */
    public $start_date;

    /* @var string $end_date */
    public $end_date;

    /* @var string $area_study */
    public $area_study;



    #endregion

    #region Attrs

    public const attrs = [

        'organization',
        'country',
        'city',
        'start_date',
        'end_date',
        'area_study',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'Компьютеры';

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

            $config->title = Az::l('Компьютеры');
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
           
            'organization' => function (Form $column) {

                $column->title = Az::l('Организация');
                //$column->widget = ZHTextareaWidget::class;


                return $column;
            },
            
           
            'country' => function (Form $column) {

                $column->title = Az::l('Страна');
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'place_country';


                return $column;
            },
            
           
            'city' => function (Form $column) {

                $column->title = Az::l('Город');


                return $column;
            },
            
           
            'start_date' => function (Form $column) {

                $column->title = Az::l('Начало');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'end_date' => function (Form $column) {

                $column->title = Az::l('Окончание');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'area_study' => function (Form $column) {

                $column->title = Az::l('Направление обучения');


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
                                'organization',
                                'country',
                                'city',
                                'start_date',
                                'end_date',
                                'area_study',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
