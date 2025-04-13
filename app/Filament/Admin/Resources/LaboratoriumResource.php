<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LaboratoriumResource\Pages;
use App\Filament\Admin\Resources\LaboratoriumResource\RelationManagers;

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
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;

class LaboratoriumResource extends Resource
{
    protected static ?string $model = Laboratorium::class;

    protected static ?string $navigationIcon = 'carbon-chemistry';

    protected static ?string $navigationLabel = 'Laboratorium';

    protected static ?string $modelLabel = 'Laboratorium';

    protected static ?string $navigationGroup = 'Laboratorium';

    protected static ?int $navigationSort = 1;
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
    
        if ($user && $user->id == 1) {
            return true;
        }
    
        if ($user->laboratorium) {
            return true;
        }
    
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Jabatan Laboratorium')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                            TextInput::make('nama_lab')->label('Nama Laboratorium'),
                            
                            Select::make('jenis_lab')
                            ->label('Jenis Laboratorium')
                            ->options([
                                'praktikum' => 'Praktikum',
                                'bidang minat' => 'Bidang Minat'
                            ])
                            ->preload()
                            
                        ]),
                        RichEditor::make('deskripsi')->placeholder('Pengenalan Laboratorium')->toolbarButtons([])
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
                    return $query->where('id', $idLab);
                }
            })
            ->columns([
                TextColumn::make('nama_lab')
                    ->sortable()
                    ->searchable()
                    ->label('Laboratorium'),
                TextColumn::make('jenis_lab'),
                TextColumn::make('deskripsi')
                    ->limit(65)
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
            'index' => Pages\ListLaboratorium::route('/'),
            'create' => Pages\CreateLaboratorium::route('/create'),
            'edit' => Pages\EditLaboratorium::route('/{record}/edit'),
        ];
    }
}
