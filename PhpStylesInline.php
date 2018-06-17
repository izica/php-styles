<?php
require_once('PhpStyles.php');

/**
 * Class PhpStyles
 */
class PhpStylesInline extends PhpStyles
{
    public function render($condition = true)
    {
        if (!$condition) {
            return '';
        }

        $css = '';
        $array = [];
        foreach ($this->styles as $key => $value) {
            $array[$key] = $key . ': ' . $value;
        }
        $css = implode(';', $array);
        return "style='{$css}'";
    }
}
