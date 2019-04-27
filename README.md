PlatesView for lit
==================

> Plates integration for lit

### Usage

In a standard [litphp/project](https://github.com/litphp/project):

+ add dependency & install 

```bash
composer require litphp/view-plates
```

+ append configuration

Create a template dir in your project root, says `template`. Write your first template file `templates/index.php`
```php
Hello <?=$this->e($name)?>!
```

Merge `PlatesView::configuration` into your `configuration.php`.
```php
$configuration += \Lit\View\Plates\PlatesView::configuration([
    __DIR__ . '/templates',
]);
```

+ integration in action class

In `src/BaseAction.php`, use the trait `PlatesViewBuilderTrait`
```php
abstract class BaseAction extends BoltAbstractAction
{
    use \Lit\View\Plates\PlatesViewBuilderTrait;
```

Change your `src/HomeAction.php` to render page use plates

```php
class HomeAction extends BaseAction
{
    protected function main(): ResponseInterface
    {
        return $this->plates('index.php')->render(['name' => '<plates>']);
    }
```

That's all! Run your app by `php -S 127.0.0.1:3080 public/index.php`, and open <http://127.0.0.1:3080/>. You should see greetings from plates template `Hello <plates>!` (notice `<>` should be escaped correctly)
