<?php


namespace App\Models;

use Swoftx\Db\Entity\Manager\ModelCacheManager;
use Swoftx\EntityEvent\Event;

trait CommonTrait
{
    public function saveModel()
    {
        $event = bean(Event::class);
        $res = $event->create($this);
        // 重置缓存
        ModelCacheManager::delete($this);
        return $res;
    }

    public function updateModel()
    {
        $event = bean(Event::class);
        $res = $event->update($this);
        // 重置缓存
        ModelCacheManager::delete($this);
        return $res;
    }

    public function deleteModel()
    {
        $res = parent::delete()->getResult();
        // 重置缓存
        ModelCacheManager::delete($this);
        return $res;
    }
}