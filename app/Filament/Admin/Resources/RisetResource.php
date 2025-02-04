<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RisetResource\Pages;
use App\Filament\Admin\Resources\RisetResource\RelationManagers;

use App\Models\Riset;
use App\Models\Laboratorium;
use App\Models\Dosen;

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

class RisetResource extends Resource
{
    protected static ?string $model = Riset::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Riset';

    protected static ?string $modelLabel = 'Riset';

    protected static ?string $navigationGroup = 'Dosen';


    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Riset')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('judul_riset')->label('Judul Riset')->required(),

                                TextInput::make('tahun')
                                    ->label('Tahun')
                                    ->numeric()
                                    ->minValue(date('Y') - 100)
                                    ->maxValue(date('Y'))
                                    ->placeholder(date('Y')),
                            ]),


                        Select::make('id_dosen')
                            ->label('Dosen')
                            ->relationship('dosen', 'nama')
                            ->preload()
                            ->searchable(),

                        Select::make('id_lab')
                            ->label('Laboratorium')
                            ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                $userId = auth()->id();

                                if ($userId != 1) {
                                    $idLab = auth()->user()->id_lab;
                                    $query->where('id', $idLab);
                                }
                            })
                            ->preload()
                            ->searchable(),
                    ]),
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

                    return $query->whereHas('dosen', function (Builder $risetQuery) use ($idLab) {
                        $risetQuery->where('id_lab', $idLab);
                    });
                }
            })
            ->columns([
                TextColumn::make('judul_riset')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(20),
                TextColumn::make('dosen.nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('laboratorium.nama_lab')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tahun')
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
            'index' => Pages\ListRisets::route('/'),
            'create' => Pages\CreateRiset::route('/create'),
            'edit' => Pages\EditRiset::route('/{record}/edit'),
        ];
    }
}
