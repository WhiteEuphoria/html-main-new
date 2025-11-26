<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DashboardSettingResource\Pages;
use App\Models\DashboardSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DashboardSettingResource extends Resource
{
    protected static ?string $model = DashboardSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Dashboard Settings';
    protected static ?string $modelLabel = 'Dashboard Setting';
    protected static ?string $pluralModelLabel = 'Dashboard Settings';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('key')
                ->label('Key')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(191),

            Forms\Components\Textarea::make('value')
                ->label('Value')
                ->rows(5)
                ->nullable(),

            Forms\Components\TextInput::make('description')
                ->label('Description')
                ->maxLength(255)
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->limit(80),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDashboardSettings::route('/'),
            'create' => Pages\CreateDashboardSetting::route('/create'),
            'edit' => Pages\EditDashboardSetting::route('/{record}/edit'),
        ];
    }
}

