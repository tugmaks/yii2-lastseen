Yii2 Last Seen Behavior
=======================
Automatically fills last activity time for current user

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist tugmaks/yii2-lastseen "*"
```

or add

```
"tugmaks/yii2-lastseen": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the behavior is installed, simply use it in your code by adding this lines to application config:

```php
    'as lastSeen'=>[
        'class'=>'tugmaks\behaviors\LastSeen\LastSeenBehavior',
        'lastSeenAttribute'=>'last_seen' // attribute that stores last seen time in user table
        // uncomment this line if you store last seen as datetime, by default beahavior saves as unixtime
        //'value'=> new \yii\db\Expression('NOW()'),
    ]```