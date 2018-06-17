<?php

/**
 * Class PhpStylesInline
 */
class PhpStyles
{
    /**
     * @var string
     */
    public $styles = [];
    private $classname = '';
    private $media = false;
    private $mediaFrom = '';
    private $mediaTo = '';


    public function inline()
    {
        return new PhpStylesInline();
    }

    /**
     * @param bool $condition
     * @return string
     */

    public function render($condition = true)
    {
        if (!$condition) {
            return '';
        }
        $this->classname = uniqid('php-styles-');

        $array = [];
        foreach ($this->styles as $key => $value) {
            $array[$key] = $key . ': ' . $value;
        }
        $css = implode(';', $array);
        echo "<style>";
        if($this->media){
            echo "@media (min-width: {$this->mediaFrom}px) and (max-width: {$this->mediaTo}px) {";
        }
        echo ".{$this->classname}{";
        echo $css;
        echo '}';
        if($this->media) {
            echo '}';
        }
        echo "</style>";

        return $this->classname;
    }

    /**
     * @return string
     */
    public function media($minWidth = 0, $maxWidth = 9999)
    {
        $this->media = true;
        $this->mediaFrom =$minWidth;
        $this->mediaTo = $maxWidth;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @param $condition
     * @return $this
     */
    public function set($key, $value, $condition = true)
    {
        if ($condition) {
            $this->styles[$key] = $value;
        }
        return $this;
    }

    /**
     * @param $value
     * @param $condition
     * @return $this
     */
    public function opacity($value, $condition)
    {
        return $this->set('opacity', $value, $condition);
    }
}

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
