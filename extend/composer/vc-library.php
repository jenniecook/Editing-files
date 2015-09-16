<?php
if (!class_exists('VcLibrary')) {

  class VcLibrary {
    // Here we will store plugin wise (shared) settings. Colors, Locations, Sizes, etc...
    /**
     * @var array
     */
    public static $colors = array(
      'Blue' => 'blue', // Why __( 'Blue', 'js_composer' ) doesn't work?
      'Turquoise' => 'turquoise',
      'Pink' => 'pink',
      'Violet' => 'violet',
      'Peacoc' => 'peacoc',
      'Chino' => 'chino',
      'Mulled Wine' => 'mulled_wine',
      'Vista Blue' => 'vista_blue',
      'Black' => 'black',
      'Grey' => 'grey',
      'Orange' => 'orange',
      'Sky' => 'sky',
      'Green' => 'green',
      // 'Juicy pink' => 'juicy_pink',
      'Juicy pink' => 'juicy_pink',
      'Sandy brown' => 'sandy_brown',
      'Purple' => 'purple',
      'White' => 'white'
    );

    public static $musicflow_colors = array(
      'blue' => 'blue',
      'pink' => 'pink',
      'violet' => 'violet',
      'black' => 'black',
      'grey' => 'grey',
      'orange' => 'orange',
      'purple' => 'purple',
      'white' => 'white',
      'green' => 'green',
      'turquoise' => '#00c1cf !important',
      'peacoc' => '#4cadc9 !important',
      'chino' => '#cec2ab !important',
      'mulled_wine' => '#50485b !important',
      'vista_blue' => '#75d69c !important',
      'sky' => '#5aa1e3 !important',
      'juicy_pink' => '#f4524d !important',
      'sandy_brown' => 'sandybrown',
    );

    /**
     * @var array
     */
    public static $icons = array(
      'Glass' => 'glass',
      'Music' => 'music',
      'Search' => 'search'
    );

    /**
     * @var array
     */
    public static $sizes = array(
      'Mini' => 'xs',
      'Small' => 'sm',
      'Normal' => 'md',
      'Large' => 'lg'
    );

    /**
     * @var array
     */
    public static $button_styles = array(
      'Rounded' => 'rounded',
      'Square' => 'square',
      'Round' => 'round',
      'Outlined' => 'outlined',
      '3D' => '3d',
      'Square Outlined' => 'square_outlined'
    );

    /**
     * @var array
     */
    public static $message_box_styles = array(
      'Standard' => 'standard',
      'Solid' => 'solid',
      'Solid icon' => 'solid-icon',
      'Outline' => 'outline',
      '3D' => '3d',
    );

      /**
       * Toggle styles
     * @var array
     */
    public static $toggle_styles = array(
      'Default' => 'default',
      'Simple' => 'simple',
      'Round' => 'round',
      'Round Outline' => 'round_outline',
      'Rounded' => 'rounded',
      'Rounded Outline' => 'rounded_outline',
      'Square' => 'square',
      'Square Outline' => 'square_outline',
      'Arrow' => 'arrow',
      'Text Only' => 'text_only'
    );

    /**
     * @var array
     */
    public static $cta_styles = array(
      'Rounded' => 'rounded',
      'Square' => 'square',
      'Round' => 'round',
      'Outlined' => 'outlined',
      'Square Outlined' => 'square_outlined'
    );

    /**
     * @var array
     */
    public static $txt_align = array(
      'Left' => 'left',
      'Right' => 'right',
      'Center' => 'center',
      'Justify' => 'justify'
    );

    /**
     * @var array
     */
    public static $el_widths = array(
      '100%' => '',
      '90%' => '90',
      '80%' => '80',
      '70%' => '70',
      '60%' => '60',
      '50%' => '50'
    );

    /**
     * @var array
     */
    public static $sep_widths = array(
      '1px' => '',
      '2px' => '2',
      '3px' => '3',
      '4px' => '4',
      '5px' => '5',
      '6px' => '6',
      '7px' => '7',
      '8px' => '8',
      '9px' => '9',
      '10px' => '10'
    );

    /**
     * @var array
     */
    public static $sep_styles = array(
      'Border' => '',
      'Dashed' => 'dashed',
      'Dotted' => 'dotted',
      'Double' => 'double'
    );

    /**
     * @var array
     */
    public static $box_styles = array(
      'Default' => '',
      'Rounded' => 'vc_box_rounded',
      'Border' => 'vc_box_border',
      'Outline' => 'vc_box_outline',
      'Shadow' => 'vc_box_shadow',
      'Bordered shadow' => 'vc_box_shadow_border',
      '3D Shadow' => 'vc_box_shadow_3d',
      'Circle' => 'vc_box_circle', //new
      'Circle Border' => 'vc_box_border_circle', //new
      'Circle Outline' => 'vc_box_outline_circle', //new
      'Circle Shadow' => 'vc_box_shadow_circle', //new
      'Circle Border Shadow' => 'vc_box_shadow_border_circle' //new
    );


    public static $entypo_icons = array(
        '<span class="icon-admin skin-background-color-icon skin-font-color-icon">1</span>' =>  '1' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">2</span>' =>  '2' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">3</span>' =>  '3' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">4</span>' =>  '4' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">5</span>' =>  '5' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">6</span>' =>  '6' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">7</span>' =>  '7' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">8</span>' =>  '8' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">9</span>' =>  '9' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">0</span>' =>  '10',
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">-</span>' =>  '-' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">=</span>' =>  '=' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">q</span>' =>  'q' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">w</span>' =>  'w' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">e</span>' =>  'e' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">r</span>' =>  'r' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">t</span>' =>  't' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">y</span>' =>  'y' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">u</span>' =>  'u' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">i</span>' =>  'i' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">o</span>' =>  'o' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">p</span>' =>  'p' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">[</span>' =>  '12' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">]</span>' =>  '13' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">a</span>' =>  'a' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">s</span>' =>  's' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">d</span>' =>  'd' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">f</span>' =>  'f' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">g</span>' =>  'g' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">h</span>' =>  'h' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">j</span>' =>  'j' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">k</span>' =>  'k' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">l</span>' =>  'l' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">;</span>' =>  ';' ,
    "<span class='icon-admin skin-background-color-icon skin-font-color-icon'>'</span>" =>  "'" ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">z</span>' =>  'z' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">x</span>' =>  'x' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">c</span>' =>  'c' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">v</span>' =>  'v' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">b</span>' =>  'b' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">n</span>' =>  'n' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">m</span>' =>  'm' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">,</span>' =>  '15' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">.</span>' =>  '.' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">/</span>' =>  '/' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">!</span>' =>  '!' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">@</span>' =>  '@' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">#</span>' =>  '#' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">$</span>' =>  '$' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">%</span>' =>  '%' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">^</span>' =>  '^' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">&</span>' =>  '&' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">*</span>' =>  '*' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">(</span>' =>  '(' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">)</span>' =>  ')' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">_</span>' =>  '_' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">+</span>' =>  '+' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Q</span>' =>  'Q' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">W</span>' =>  'W' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">E</span>' =>  'E' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">R</span>' =>  'R' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">T</span>' =>  'T' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Y</span>' =>  'Y' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">U</span>' =>  'U' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">I</span>' =>  'I' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">O</span>' =>  'O' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">P</span>' =>  'P' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">{</span>' =>  '{' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">}</span>' =>  '}' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">A</span>' =>  'A' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">S</span>' =>  'S' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">D</span>' =>  'D' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">F</span>' =>  'F' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">G</span>' =>  'G' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">H</span>' =>  'H' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">J</span>' =>  'J' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">K</span>' =>  'K' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">L</span>' =>  'L' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">:</span>' =>  ':' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">"</span>' =>  '14' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">|</span>' =>  '|' ,

    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">Z</span>' =>  'Z' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">X</span>' =>  'X' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">C</span>' =>  'C' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">V</span>' =>  'V' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">B</span>' =>  'B' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">N</span>' =>  'N' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">M</span>' =>  'M' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">></span>' =>  '>' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">?</span>' =>  '?' ,
    '<span class="icon-admin skin-background-color-icon skin-font-color-icon">|</span>' =>  '|' ,
    );


    /**
     * @return array
     */
    public static function getColors() {
      return self::$colors;
    }

    /**
     * @return array
     */
    public static function getIcons() {
      return self::$icons;
    }

    /**
     * @return array
     */
    public static function getSizes() {
      return self::$sizes;
    }

    /**
     * @return array
     */
    public static function getButtonStyles() {
      return self::$button_styles;
    }

    /**
     * @return array
     */
    public static function getMessageBoxStyles() {
      return self::$message_box_styles;
    }

    /**
     * @return array
     */
    public static function getToggleStyles() {
      return self::$toggle_styles;
    }

    /**
     * @return array
     */
    public static function getCtaStyles() {
      return self::$cta_styles;
    }

    /**
     * @return array
     */
    public static function getTextAlign() {
      return self::$txt_align;
    }

    /**
     * @return array
     */
    public static function getBorderWidths() {
      return self::$sep_widths;
    }

    /**
     * @return array
     */
    public static function getElementWidths() {
      return self::$el_widths;
    }

    /**
     * @return array
     */
    public static function getSeparatorStyles() {
      return self::$sep_styles;
    }

    /**
     * @return array
     */
    public static function getBoxStyles() {
      return self::$box_styles;
    }
  }

}
?>