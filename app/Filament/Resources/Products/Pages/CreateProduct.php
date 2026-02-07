<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected static bool $canCreateAnother = false;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
                ->success()
                ->icon('heroicon-o-sparkles')
                ->iconColor('success')
                ->title('Product Created Successfully! 🎉')
                ->body('Your product has been created and is now in the system. You can track its progress from your dashboard.')
                ->duration(5000)
                ->persistent();
    }
}
