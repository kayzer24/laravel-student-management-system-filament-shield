<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required(),
                    Select::make('classroom_id')
                        ->relationship('classroom', 'name')
                        ->required(),
                    Select::make('gender')
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female'
                        ])
                        ->required(),
                    TextInput::make('nisn')
                        ->label('NSIN')
                        ->unique(ignoreRecord: true)
                        ->validationMessages(['unique' => 'The NSIN has already been registered'])
                        ->required(),
                    TextInput::make('phone_number')
                        ->tel()
                        ->required(),
                    Toggle::make('is_active')
                        ->label('Activated')
                        ->inline(false)
                        ->required(),
                    FileUpload::make('profile_picture')
                        ->directory('Students')
                        ->disk('public')
                        ->default(null)
                        ->columnSpanFull(),
                ])->columns(2),
                Section::make([
                    TextInput::make('address_line_1')
                        ->required(),
                    TextInput::make('address_line_2'),
                    TextInput::make('postal_code')
                        ->required(),
                    TextInput::make('city')
                        ->required(),
                    TextInput::make('state'),
                    TextInput::make('country')
                        ->required(),
                ])->columns(2)
            ])->columns(1);
    }
}
