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
use zetsoft\widgets\inputes\ZKSwitchInputWidget;
use zetsoft\dbitem\data\Event;
use zetsoft\dbitem\data\ConfigDB;



/**
 *
 * Class EyufCompatriotForm
 */
class EyufCompatriotForm extends ZModel
{

    #region Vars

    /* @var string $id */
    public $id;

    /* @var string $photo */
    public $photo;

    /* @var string $title */
    public $title;

    /* @var string $birthdate */
    public $birthdate;

    /* @var string $lang_nationality_id */
    public $lang_nationality_id;

    /* @var string $citizenship */
    public $citizenship;

    /* @var string $place_country_id */
    public $place_country_id;

    /* @var string $address */
    public $address;

    /* @var string $phone */
    public $phone;

    /* @var string $email */
    public $email;

    /* @var string $govs_speciality_ids */
    public $govs_speciality_ids;

    /* @var string $govs_degree_ids */
    public $govs_degree_ids;

    /* @var string $higher_education */
    public $higher_education;

    /* @var string $additional_education */
    public $additional_education;

    /* @var string $higher_publication */
    public $higher_publication;

    /* @var string $experience */
    public $experience;

    /* @var string $awards */
    public $awards;



    #endregion

    #region Attrs

    public const attrs = [

        'id',
        'photo',
        'title',
        'birthdate',
        'lang_nationality_id',
        'citizenship',
        'place_country_id',
        'address',
        'phone',
        'email',
        'govs_speciality_ids',
        'govs_degree_ids',
        'higher_education',
        'additional_education',
        'higher_publication',
        'experience',
        'awards',
    ];

    #endregion

    #region Const

    #endregion

    ##region Init

    public static ?string $titles = Azl . 'CompatriotForm';

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

            $config->title = Az::l('CompatriotForm');
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
           
            'id' => function (Form $column) {

                $column->title = Az::l('ID');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;


                return $column;
            },
            
           
            'photo' => function (Form $column) {

                $column->title = Az::l('Фото');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'title' => function (Form $column) {

                $column->title = Az::l('Ф.И.О');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'birthdate' => function (Form $column) {

                $column->title = Az::l('Дата рождение');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'lang_nationality_id' => function (Form $column) {

                $column->title = Az::l('Национальность');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'citizenship' => function (Form $column) {

                $column->title = Az::l('Гражданство');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'place_country_id' => function (Form $column) {

                $column->title = Az::l('Страна проживания');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'address' => function (Form $column) {

                $column->title = Az::l('Постоянный адрес проживания');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'phone' => function (Form $column) {

                $column->title = Az::l('Телефон');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'email' => function (Form $column) {

                $column->title = Az::l('E-mail');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'govs_speciality_ids' => function (Form $column) {

                $column->title = Az::l('Специальности');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'govs_degree_ids' => function (Form $column) {

                $column->title = Az::l('Научные степени');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'higher_education' => function (Form $column) {

                $column->title = Az::l('Высшие образования');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'additional_education' => function (Form $column) {

                $column->title = Az::l('Дополнительное образование');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'higher_publication' => function (Form $column) {

                $column->title = Az::l('Публикации');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'experience' => function (Form $column) {

                $column->title = Az::l('Опыт работы');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
                $column->mergeHeader = true;


                return $column;
            },
            
           
            'awards' => function (Form $column) {

                $column->title = Az::l('Достижения');
                $column->dbType = dbTypeBoolean;
                $column->widget = ZKSwitchInputWidget::class;
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
                                'id',
                                'photo',
                                'title',
                                'birthdate',
                                'lang_nationality_id',
                                'citizenship',
                                'place_country_id',
                                'address',
                                'phone',
                                'email',
                                'govs_speciality_ids',
                                'govs_degree_ids',
                                'higher_education',
                                'additional_education',
                                'higher_publication',
                                'experience',
                                'awards',
                                'created_at',
                                'modified_at',
                                'created_by',
                                'modified_by',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    #endregion

}
