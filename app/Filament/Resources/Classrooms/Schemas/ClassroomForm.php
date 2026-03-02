<?php

namespace App\Filament\Resources\Classrooms\Schemas;

use App\Models\Major;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClassroomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('major_id')
                    ->relationship('major', 'name')
                    ->options(Major::where('is_active', true)->pluck('name', 'id'))
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('level')
                    ->required()
                    ->options([
                        10 => 'Grade X',
                        11 => 'Grade XI',
                        12 => 'Grade XII',
                        13 => 'Grade XIII',
                    ]),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
