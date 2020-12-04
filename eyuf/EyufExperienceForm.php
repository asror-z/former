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
use zetsoft\widgets\inputes\ZKDatepickerWidget;
use zetsoft\widgets\inputes\ZKSelect2Widget;
use zetsoft\widgets\inputes\ZHTextareaWidget;
use zetsoft\widgets\inputes\ZKDateTimePickerWidget;
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;
use zetsoft\widgets\inputes\ZHInputWidget;



/**
 *
 * Class EyufExperienceForm
 */
class EyufExperienceForm extends ZModel
{

    #region Vars

    /* @var string $type_company */
    public $type_company;

    /* @var string $company_name */
    public $company_name;

    /* @var string $countries */
    public $countries;

    /* @var string $position */
    public $position;

    /* @var string $description_function */
    public $description_function;

    /* @var string $work_honours */
    public $work_honours;

    /* @var string $start_date */
    public $start_date;

    /* @var string $end_date */
    public $end_date;



    #endregion

    #region Attrs

    public const attrs = [

        'type_company',
        'company_name',
        'countries',
        'position',
        'description_function',
        'work_honours',
        'start_date',
        'end_date',
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
           
            'type_company' => function (Form $column) {

                $column->title = Az::l('Тип организации');
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'company_name' => function (Form $column) {

                $column->title = Az::l('Название компании');
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'countries' => function (Form $column) {

                $column->title = Az::l('Страна');
                $column->widget = ZKSelect2Widget::class;
                $column->fkTable = 'place_country';


                return $column;
            },
            
           
            'position' => function (Form $column) {

                $column->title = Az::l('Должность');


                return $column;
            },
            
           
            'description_function' => function (Form $column) {

                $column->title = Az::l('Краткое описание функций');
                //$column->widget = ZHTextareaWidget::class;


                return $column;
            },
            
           
            'work_honours' => function (Form $column) {

                $column->title = Az::l('Достижения и проекты за период работы');


                return $column;
            },
            
           
            'start_date' => function (Form $column) {

                $column->title = Az::l('Начало');
                $column->widget = ZKDatepickerWidget::class;


                return $column;
            },
            
           
            'end_date' => function (Form $column) {

                $column->title = Az::l('Окончание');
                $column->widget = ZKDatepickerWidget::class;



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
                                'type_company',
                                'company_name',
                                'countries',
                                'position',
                                'description_function',
                                'work_honours',
                                'start_date',
                                'end_date',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
