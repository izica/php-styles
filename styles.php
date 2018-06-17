<?
require_once('PhpStyles.php');
require_once('PhpStylesInline.php');

/**
 * @return PhpStylesInline
 */
function styles($inline = false)
{
    if($inline){
        return new PhpStylesInline();
    }
    return new PhpStyles();
}
