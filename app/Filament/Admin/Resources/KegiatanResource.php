<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KegiatanResource\Pages;
use App\Filament\Admin\Resources\KegiatanResource\RelationManagers;

use App\Models\Kegiatan;

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


class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = 'Kategori Kegiatan';

    protected static ?string $modelLabel = 'Kategori Kegiatan';

    protected static ?string $navigationGroup = 'Kegiatan';

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
            Section::make('')
            ->schema([
                TextInput::make('kategori_kegiatan')->label('Kategori Kegiatan (Baru)')->required()
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori_kegiatan')
                    ->label('Kategori Kegiatan')
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
