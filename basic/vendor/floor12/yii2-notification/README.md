# yii2-notification
[![Latest Stable Version](https://poser.pugx.org/floor12/yii2-notification/v/stable)](https://packagist.org/packages/floor12/yii2-notification)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/floor12/yii2-notification/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/floor12/yii2-notification/?branch=master)
[![Latest Unstable Version](https://poser.pugx.org/floor12/yii2-notification/v/unstable)](https://packagist.org/packages/floor12/yii2-notification)
[![Total Downloads](https://poser.pugx.org/floor12/yii2-notification/downloads)](https://packagist.org/packages/floor12/yii2-notification)
[![License](https://poser.pugx.org/floor12/yii2-notification/license)](https://packagist.org/packages/floor12/yii2-notification)

*Этот файл так же доступен на [русском языке](README_RUS.md).*

This simple extension helps to show nice notifications in browser. 
It use svg icons and can be customised by overwriting base CSS styles.  

![Image](https://floor12.net/images/yii2-notification.png)

Installation
------------
Just run:
```bash
$ composer require floor12/yii2-notification
```
or add this to the require section of your composer.json.
```json
"floor12/yii2-notification": "dev-master"
```

To include js and css files, add `floor12\notification\NotificationAsset` as dependency in your AppAsset:


```php
use floor12\notification\NotificationAsset;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    ...
    public $depends = [
        NotificationAsset::class
    ];
}
```

Using as JS
-----
To show notification in browser just pass message text to one of the `f12notification` object methods:


```js
f12notification.info(text);    //information message;
f12notification.success(text); //success message;
f12notification.error(text);   //error message;
```

For example:

```js
if (userSucces == true)
  f12notification.success('Registration success'.)
else
  f12notification.error('Registration failed.')
```

Using as PHP
-----
Its also possible to show notifications by passing message text to one of the `floor12\notification\Notification` methods:


```php
use floor12\notification\Notification;

Notification::info('The form is loading...');
Notification::error('Pleas fill all required fields');
Notification::success('This model is saved');
```


In case if using  PHP api, `NotificationAsset` will be included in your app by `Notification` class.

