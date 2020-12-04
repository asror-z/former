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
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKTouchSpinWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufHigherEducationForm
 */
class EyufHigherEducationForm extends ZModel
{

    #region Vars

    /* @var string $university */
    public $university;

    /* @var string $country */
    public $country;

    /* @var string $start_date */
    public $start_date;

    /* @var string $end_date */
    public $end_date;

    /* @var string $speciality */
    public $speciality;

    /* @var string $govs_degree_id */
    public $govs_degree_id;

    /* @var string $number_diploma */
    public $number_diploma;



    #endregion

    #region Attrs

    public const attrs = [

        'university',
        'country',
        'start_date',
        'end_date',
        'speciality',
        'govs_degree_id',
        'number_diploma',
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
           
            'university' => function (Form $column) {

                $column->title = Az::l('Название высшего учебного заведения');


                return $column;
            },
            
           
            'country' => function (Form $column) {

                $column->title = Az::l('Страна');
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'place_country';


                return $column;
            },
            
           
            'start_date' => function (Form $column) {

                $column->title = Az::l('Начало учебы');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'end_date' => function (Form $column) {

                $column->title = Az::l('Окончание учебы');
                $column->widget = ZKDateTimePickerWidget::class;


                return $column;
            },
            
           
            'speciality' => function (Form $column) {

                $column->title = Az::l('Специальность');
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'govs_speciality';


                return $column;
            },
            
           
            'govs_degree_id' => function (Form $column) {

                $column->title = Az::l('Степень');
                $column->widget = ZKSelect2Widget::class;


                return $column;
            },
            
           
            'number_diploma' => function (Form $column) {

                $column->title = Az::l('Номер диплома');
                $column->dbType = dbTypeInteger;
                $column->widget = ZKTouchSpinWidget::class;
                $column->mergeHeader = true;


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
                                'university',
                                'country',
                            ],
                            [
                                'start_date',
                                'end_date',
                            ],
                            [
                                'speciality',
                                'govs_degree_id',
                                'number_diploma',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
