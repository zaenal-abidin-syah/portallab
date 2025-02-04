<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FasilitasResource\Pages;
use App\Filament\Admin\Resources\FasilitasResource\RelationManagers;

use App\Models\Fasilitas;
use App\Models\Laboratorium;
use App\Models\Fasilitas_lab;

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
use Filament\Forms\Components\Repeater;


class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Fasilitas';

    protected static ?string $modelLabel = 'Fasilitas';

    protected static ?string $navigationGroup = 'Laboratorium';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Fasilitas')
                    ->schema([
                        TextInput::make('nama_fasilitas')->label('Nama Fasilitas')->required(),

                        Repeater::make('fasilitas_lab')
                            ->relationship('fasilitas_lab')
                            ->label('')
                            ->schema(components: [
                                Select::make('id_lab')
                                    ->label('Tempat')
                                    ->required()
                                    ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                        $userId = auth()->id();

                                        if ($userId != 1) {
                                            $idLab = auth()->user()->id_lab;
                                            $query->where('id', $idLab);
                                        }
                                    })
                                    ->preload()
                                    ->searchable(),
                                TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->minValue(0)
                                    ->placeholder(0)
                            ])
                            ->columns(2)
                            ->addable(false)
                            ->deletable(false),
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

                    return $query->whereHas('fasilitas_lab', function (Builder $fasilitasQuery) use ($idLab) {
                        $fasilitasQuery->where('id_lab', $idLab);
                    });
                }
            })
            ->columns([
                TextColumn::make('nama_fasilitas')
                    ->searchable()
                    ->sortable()
                    ->label('Fasilitas/Barang'),
                TextColumn::make('fasilitas_lab.laboratorium.nama_lab')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('fasilitas_lab.jumlah')->label('Jumlah')
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
