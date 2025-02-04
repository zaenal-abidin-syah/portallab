<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JabatanResource\Pages;
use App\Filament\Admin\Resources\JabatanResource\RelationManagers;

use App\Models\Jabatan;
use App\Models\Laboratorium;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;

    protected static ?string $navigationIcon = 'hugeicons-user-list';

    protected static ?string $navigationLabel = 'Jabatan Laboratorium';

    protected static ?string $modelLabel = 'Jabatan';

    protected static ?string $navigationGroup = 'Laboratorium';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Jabatan Laboratorium')
                    ->schema([
                        TextInput::make('jabatan')->label('Nama Jabatan (Baru)')->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $userId = auth()->id();

                if ($userId == 1) {
                    return $query;
                } else {
                    $idLab = auth()->user()->id_lab;
                    return $query->where('id_lab', $idLab);
                }
            })
            ->columns([
                TextColumn::make('jabatan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('laboratorium.nama_lab')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJabatans::route('/'),
            'create' => Pages\CreateJabatan::route('/create'),
            'edit' => Pages\EditJabatan::route('/{record}/edit'),
        ];
    }
}
