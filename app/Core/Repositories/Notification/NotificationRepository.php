<?php
declare(strict_types=1);

namespace App\Core\Repositories\Notification;

use App\Core\Repositories\AbstractRepository;
use App\Models\Notification;

class NotificationRepository extends AbstractRepository
{
    protected function getDefaultModel(): string
    {
        return Notification::class;
    }


    public function getAll()
    {
        return $this->getQueryInstance()->get();
    }
}
