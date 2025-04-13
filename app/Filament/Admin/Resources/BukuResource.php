<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BukuResource\Pages;
use App\Filament\Admin\Resources\BukuResource\RelationManagers;

use App\Models\Buku;
use App\Models\Dosen;
use App\Models\Laboratorium;
use App\Models\Buku_lab;
use App\Models\Buku_penulis;

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
use Filament\Forms\Components\DatePicker;

class BukuResource extends Resource
{
    protected static ?string $model = buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Buku';

    protected static ?string $modelLabel = 'Buku';

    protected static ?string $navigationGroup = 'Dosen';

    protected static ?int $navigationSort = 2;
    
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
    
        if ($user && $user->id == 1) {
            return true;
        }
    
        if ($user->laboratorium && $user->laboratorium->jenis_lab === 'bidang minat') {
            return true;
        }
    
        return false;
    }
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Buku')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('isbn')
                                    ->numeric()
                                    ->required()
                                    ->minLength(10)
                                    ->maxLength(13)
                                    ->label('ISBN')
                                    ->placeholder('10-13 Digit'),

                                TextInput::make('judul_buku')
                                    ->label('Judul')
                                    ->required(),

                                TextInput::make('tanggal')
                                    ->label('Tahun Terbit')
                                    ->numeric()
                                    ->minValue(date('Y') - 100)
                                    ->maxValue(date('Y')),

                                TextInput::make('kota')
                                    ->label('Kota Terbit'),
                            ]),
                    ]),

                Section::make('Penulis')
                    ->description('Penulis dari buku (dosen)')
                    ->schema([
                        Select::make('penulis')
                            ->label('')
                            ->multiple()
                            ->relationship('penulis', 'nama', function (Builder $query) {
                                $userId = auth()->id();

                                if ($userId != 1) {
                                    $idLab = auth()->user()->id_lab;
                                    $query->where('id_lab', $idLab);
                                }
                            })
                            ->preload()
                            ->searchable(),
                    ]),

                Section::make('Laboratorium')
                    ->description('Laboratorium asal penerbitan buku')
                    ->schema([
                        Select::make('id_lab')
                            ->label('')
                            ->relationship('lab', 'nama_lab', function (Builder $query) {
                                $userId = auth()->id();
                
                                if ($userId != 1) {
                                    $idLab = auth()->user()->id_lab;
                                    $query->where('laboratorium.id', $idLab);
                                }
                
                                $query->where('jenis_lab', 'bidang minat');
                
                                return $query;
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

                    return $query->whereHas('penulis', function (Builder $penulisQuery) use ($idLab) {
                        $penulisQuery->where('id_lab', $idLab);
                    });
                }
            })
            ->columns([
                TextColumn::make('isbn')
                    ->label('ISBN')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul_buku')
                    ->searchable()
                    ->sortable()
                    ->limit(20),
                TextColumn::make('tanggal')
                    ->label('Tahun Terbit')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kota')
                    ->label('Kota Terbit')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
