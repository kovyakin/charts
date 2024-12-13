<?php
/*
 * MIT License
 * Copyright (c) 2024 Kovyakin Dmitry kdv-1974@mail.ru
 */
/*
  |--------------------------------------------------------------------------
  | protected static string $type = 'line';
  |--------------------------------------------------------------------------
  | @var string
  | required
  | Type charts: line|bar|pie
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | protected static bool $select = false;
  |--------------------------------------------------------------------------
  | @var bool
  | Selecting a chart type on a form
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | protected static bool $control_hover = false;
  |--------------------------------------------------------------------------
  | @var bool
  | displaying the  points on the form
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | protected static string|bool $stroke_dasharray = "2,2";
  |--------------------------------------------------------------------------
  | @var string|bool
  | Setting up a graph grid
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |     protected static array $chart_size = [
  |          'width' => 700, // width chart
  |          'height' => 300,// height chart
  |          'bar_max_width' => 30, // only type bar
  |      ];
  |--------------------------------------------------------------------------
  | @var array|int[]
  | graph size
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |  protected static array $margin = [
  |          'left' => 10,
  |          'top' => 40,
  |          'right' => 0,
  |          'bottom' => 0
  |      ];
  |--------------------------------------------------------------------------
  | @var array|int[]
  | Setting up chart indents on the form
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |  protected static string $direction = "horizontal";
  |--------------------------------------------------------------------------
  | @var string
  | direction charts: horizontal|vertical
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | protected static bool $tooltip_show = false;
  |--------------------------------------------------------------------------
  | @var bool
  | displaying the values of the graph points on the form
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | protected static array $marker = [];
  |--------------------------------------------------------------------------
  | @var array|array[]
  | Setting up marker lines
  | stroke_dasharray: Setting marker lines - length and gap
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |  protected static array $x_axis = [];
  |--------------------------------------------------------------------------
  | @var array|string[]
  | required
  | X-axis
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |  protected static bool $use_modal = false;
  |--------------------------------------------------------------------------
  | @var bool
  | Show an enlarged chart by double-clicking on the chart
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |  protected static array $modal=[
  |           'title'=>'Chart 1'
  |       ];
  |--------------------------------------------------------------------------
  | @var array|string[]
  | Modal window title
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |   protected static function y_axis(): array
  |       {
  |           return [];
  |       }
  |--------------------------------------------------------------------------
  | @return array[]
  | required
  | Y- axis
  | type:normal|natural|step|monotone;
  | color: color line;
  | label: show values points;
  | data: data y-axis;
  | linear_gradient: Set the graph fill gradient
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  |   public static function render(): View
  |       {
  |           return self::view();
  |       }
  |--------------------------------------------------------------------------
  | @return View
  | render: required
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  */

declare(strict_types=1);

namespace App\Components\Charts;

use Illuminate\Contracts\View\View;
use Kovyakin\Components\app\Charts\Charts;
use Kovyakin\Components\app\Interfaces\Components;
use Kovyakin\Components\app\Traits\ClassName;
use Kovyakin\Components\app\Traits\UserTableToken;

class ExampleChart1 extends Charts implements Components
{
       use ClassName;
       use \Kovyakin\Components\app\Traits\RenderCharts;

    /**
     * @var string
     * required
     * Type charts: line|bar|pie
     */
    protected static string $type = 'line'; // line|bar|pie

    /**
     * @var bool
     * Selecting a chart type on a form
     */
    protected static bool $select = true;

    /**
     * @var bool
     * displaying the  points on the form
     */
    protected static bool $control_hover = true ;

    /**
     * @var string|bool
     * Setting up a graph grid
     */
    protected static string|bool $stroke_dasharray = "2,2"; // grid

    /**
     * @var array|int[]
     * graph size
     */
    protected static array $chart_size = [
        'width' => 700, // width chart
        'height' => 400,// height chart
        'bar_max_width' => 30, // only type bar
    ];

    /**
     * @var array|int[]
     * Setting up chart indents on the form
     */
    protected static array $margin = [
        'left' => 10,
        'top' => 40,
        'right' => 0,
        'bottom' => 0
    ];

    /**
     * @var string
     * direction charts: horizontal|vertical
     */
    protected static string $direction = "horizontal"; //horizontal|vertical

    /**
     * @var bool
     *displaying the values of the graph points on the form
     */
    protected static bool $tooltip_show = true;

    /**
     * @var array|array[]
     * Setting up marker lines
     * stroke_dasharray: Setting marker lines - length and gap
     */
    protected static array $marker = [
        ['label' => 'start', 'value' => 10, 'color' => 'green', 'stroke_width' => 2, 'stroke_dasharray' => '6 6'],
        ['label' => 'end', 'value' => 50, 'color' => 'red', 'stroke_width' => 2, 'stroke_dasharray' => '6 6'],
        ['label' => 'example', 'value' => 100, 'color' => 'blue', 'stroke_width' => 2, 'stroke_dasharray' => '6 6'],
    ];

    /**
     * @var array|string[]
     * required
     * X-axis
     */
    protected static array $x_axis = [
        'january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december'
    ];

    /**
     * @var bool
     * Show an enlarged chart by double-clicking on the chart
     */
    protected static bool $use_modal = true;

    /**
     * @var array|string[]
     * Modal window title
     */
    protected static array $modal=[
        'title'=>'Chart 1'
    ];

    /**
     * @return array[]
     * required
     * Y- axis
     * type:normal|natural|step|monotone;
     * color: color line;
     * label: show values points;
     * data: data y-axis;
     * linear_gradient: Set the graph fill gradient
     */
    protected static function y_axis(): array
    {
        return [
            'user_Martin' => [
                'type' => 'monotone', // type of graph => normal|natural|step|monotone
                'color' => 'blue', // line color
                'label' => true, // show value
                'data' => [31, 123, 43, 34, 35, 26, 47, 58, 39, 10, 41, 32],
                'linear_gradient' => [
                    'gradient_transform' => 90, // degree
                    'offset_x' => 0,
                    'offset_y' => 100,
                    'stop_color_x' => "#be90ff",
                    'stop_color_y' => "white",
                    'stop_opacity_x' => 1,
                    'stop_opacity_y' => 0.4

                ]
            ],
            'user_Thomas' => [
                'type' => 'natural', // type of graph => normal|natural|step|monotone
                'color' => 'red', // line color
                'label' => true, // show value
                'data' => [11, 12, 13, 24, 30, 46, 57, 68, 79, 80, 91,98],
                'linear_gradient' => [
                    'gradient_transform' => 90, // degree
                    'offset_x' => 0,
                    'offset_y' => 100,
                    'stop_color_x' => "red",
                    'stop_color_y' => "white",
                    'stop_opacity_x' => 1,
                    'stop_opacity_y' => 0.4
                ]
            ],

        ];
    }


    public static function render(): View
       {
           return self::view();
       }

}
