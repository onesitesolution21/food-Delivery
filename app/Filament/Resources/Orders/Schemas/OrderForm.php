<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tracking_id')
                    ->required(),
                TextInput::make('payment_method')
                    ->required()
                    ->default('COD'),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('firstname')
                    ->default(null),
                TextInput::make('lastname')
                    ->default(null),
                TextInput::make('address')
                    ->default(null),
                TextInput::make('city')
                    ->default(null),
                TextInput::make('state')
                    ->default(null),
                TextInput::make('country')
                    ->default(null),
                TextInput::make('postcode')
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                Textarea::make('ordernotes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('order_status')
                    ->options([
            'pending' => 'Pending',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
        ])
                    ->default('pending')
                    ->required(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
