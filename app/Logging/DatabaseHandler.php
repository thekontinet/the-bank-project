<?php
namespace App\Logging;

use App\Models\Activity;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class DatabaseHandler extends AbstractProcessingHandler
 {
    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        if(strtolower($record->level->getName()) !== 'info'){
            return;
        }

        Activity::create([
            'user_id' => auth()->id(),
            'level' => $record->level->getName(),
            'message' => $record->message,
            'context' => $record->context,
        ]);
    }
}
