# yii2-notification
[![Latest Stable Version](https://poser.pugx.org/floor12/yii2-notification/v/stable)](https://packagist.org/packages/floor12/yii2-notification)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/floor12/yii2-notification/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/floor12/yii2-notification/?branch=master)
[![Latest Unstable Version](https://poser.pugx.org/floor12/yii2-notification/v/unstable)](https://packagist.org/packages/floor12/yii2-notification)
[![Total Downloads](https://poser.pugx.org/floor12/yii2-notification/downloads)](https://packagist.org/packages/floor12/yii2-notification)
[![License](https://poser.pugx.org/floor12/yii2-notification/license)](https://packagist.org/packages/floor12/yii2-notification)

Перед использованием можно [посмотреть на демо](https://floor12.net/packages/yii2-notification.html).

В любых проектах бывает очень часто необходимо показывать какие-либо нотификации пользователю в ответ на какие-то его действия.  Для этих целей я написал эту небольшую библиотеку, у которой нет никаких зависимостей и написана она на чистом javascript.  

Установка
------------
Добавляем пакет в свой проект:
```bash
$ composer require floor12/yii2-notification
```
или дописываем зависимость руками в  composer.json.
```json
"floor12/yii2-notification": "dev-master"
```

Чтобы необходимые js и css файлы подкючить к проекту, добавляем `floor12\notification\NotificationAsset` в зависимости вашего AppAsset: 
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

Использование c Javascript
-----

Для отображения уведомления в браузере, необходимо вызвать один из методов объекта f12notification и передать туда текст для уведомления. Доступные методы для создания уведомлений:


```js
f12notification.info(text);  // информационное;
f12notification.success(text); //успешное;
f12notification.error(text);  //ошибочное;
```

Пример использования с использования:
```js
if (userSucces == true)
  f12notification.success('Registration success'.)
else
  f12notification.error('Registration failed.')
```

Использование c PHP
-----

Так же возможно отобразить уведомлений с помощью  php, использовав методы класса `floor12\notification\Notification`:

```php
use floor12\notification\Notification;

Notification::info('The form is loading...');
Notification::error('Pleas fill all required fields');
Notification::success('This model is saved');
```

В случае обращения к методам класса `floor12\notification\Notification`,  следить за добавлением `floor12\notification\NotificationAsset` в ваши ассеты или представления не обязательно, так как он будет добавлен автоматически.
