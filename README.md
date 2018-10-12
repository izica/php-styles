## Install
```
composer require izica/php-styles
```

## Usage
generate inline tag style
```php
    $sStyles = (new PhpStylesInline())->opacity(0, $sContact == '')->render();
    or
    $sStyles = styles(true)->opacity(0, $sContact == '')->render();
    or
    $sStyles = styles()->inline->opacity(0, $sContact == '')->render();
```
insert style
```html
    <div <?=$sStyles?>>
        <?=$sContact;?>
    </div>
```

generate style with class(class styles supports media query)
```php
    $sClassname = (new PhpStyles())->media(0, 1024)->opacity(0, $sContact == '')->render();
    or
    $sClassname = styles()->media(0, 1024)->opacity(0, $sContact == '')->render();
    or
    $sClassname = styles()
        ->name('contact-images')
        ->media(0, 1024)
        ->set('display', 'flex'),
        ->set('align-items', 'center', $itemsCount > 4),
        ->set('align-items', 'flex-start', $itemsCount <= 4),
        ->set('color', '#ccc')
        ->opacity(0, $sContact == '')
        ->render();
```

insert style
```html
    <div class="<?=$sClassname?>">
        <?=$sContact;?>
    </div>
```

## Documentation
* styles() - returns PhpStyles
* styles(true) - returns PhpStylesInline
* PhpStyles
    * inline() - returns PhpStylesInline
    * media(sizeFrom: number, sizeTo: number)
    * set(key: string, value: string or number, condition: bool(not required)) - returns $this(if condition == false, not set)
    * render(condition: bool(not required))- returns unique class name(if condition == false, returns empty string)
    * opacity(value, condition(not required))
    * name(className: string)
* PhpStylesInline
    * set(key: string, value: string or number, condition: bool(not required)) - returns $this(if condition == false, not set)
    * render(condition: bool(not required))- returns unique class name(if condition == false, returns empty string)
    * opacity(value, condition(not required))
