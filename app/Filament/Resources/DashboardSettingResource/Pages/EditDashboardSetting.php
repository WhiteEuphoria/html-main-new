<?php

namespace App\Filament\Resources\DashboardSettingResource\Pages;

use App\Filament\Resources\DashboardSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDashboardSetting extends EditRecord
{
    protected static string $resource = DashboardSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

