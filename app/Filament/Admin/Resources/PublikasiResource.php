<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PublikasiResource\Pages;
use App\Filament\Admin\Resources\PublikasiResource\RelationManagers;

use App\Models\Dosen;
use App\Models\Publikasi;
use App\Models\Laboratorium;
use App\Models\Publikasi_penulis;
use App\Models\Publikasi_lab;

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

class PublikasiResource extends Resource
{
    protected static ?string $model = Publikasi::class;

    protected static ?string $navigationIcon = 'iconoir-book';

    protected static ?string $navigationLabel = 'Jurnal';

    protected static ?string $modelLabel = 'Jurnal';

    protected static ?string $navigationGroup = 'Dosen';

    protected static ?int $navigationSort = 3;
    
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
                Section::make('Identitas Jurnal')
                    ->schema([

                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('judul_publikasi')->label('Judul Jurnal'),
                                TextInput::make('tanggal')
                                    ->label('Tahun Publikasi')
                                    ->numeric()
                                    ->minValue(date('Y') - 100)
                                    ->maxValue(date('Y'))
                            ]),


                        Select::make('id_dosen')
                            ->label('Penulis')
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

                        Select::make('id_lab')
                            ->label('Laboratorium')
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

                Section::make('URL Jurnal')
                    ->description('*opsional')
                    ->schema([
                        TextInput::make('link_scopus')->label('Scopus')->placeholder('https://www.example.com'),
                        TextInput::make('link_googleScholar')->label('Google Scholar')->placeholder('https://www.example.com'),
                        TextInput::make('link_sinta')->label('SINTA')->placeholder('https://www.example.com'),
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

                    return $query->whereHas('publikasi', function (Builder $publikasiQuery) use ($idLab) {
                        $publikasiQuery->where('id_lab', $idLab);
                    });
                }
            })
            ->columns([
                TextColumn::make('judul_publikasi')
                    ->label('Judul Jurnal')
                    ->sortable()
                    ->searchable()
                    ->limit(20),
                TextColumn::make('publikasi_penulis.dosen.nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->label('Tahun Terbit')
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
            'index' => Pages\ListPublikasis::route('/'),
            'create' => Pages\CreatePublikasi::route('/create'),
            'edit' => Pages\EditPublikasi::route('/{record}/edit'),
        ];
    }
}
