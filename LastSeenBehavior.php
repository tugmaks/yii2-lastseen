<?php
namespace tugmaks\behaviors\LastSeen;

use yii\base\Behavior;
use yii\web\Application;
use Yii;
use yii\db\ActiveRecord;
use yii\base\Event;
use yii\db\Expression;

/**
 * Description of LastSeenBehavior
 *
 * @author tugmaks
 */
class LastSeenBehavior extends Behavior
{

    /**
     * @var string the attribute that will receive the value
     */
    public $lastSeenAttribute = 'lastSeen';

    /**
     * @var string|Expression the value that will be used as a last seen
     */
    public $value;

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        if (empty($this->value)) {
            $this->value = time();
        }
    }

    /**
     * @inheritDoc
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
     * 
     * @param Event $event
     */
    public function beforeAction(Event $event)
    {
        $user = Yii::$app->get('user', false);
        if ($user && !$user->isGuest) {
            /* @var $user ActiveRecord */
            $user                             = Yii::$app->user->identity;
            $user->{$this->lastSeenAttribute} = $this->value;
            $user->save(true, [$this->lastSeenAttribute]);
        }
    }
}
