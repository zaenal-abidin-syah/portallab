<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MataKuliahResource\Pages;
use App\Filament\Admin\Resources\MataKuliahResource\RelationManagers;

use App\Models\Mata_kuliah;
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

class MataKuliahResource extends Resource
{
    protected static ?string $model = Mata_kuliah::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationLabel = 'Perkuliahan';

    protected static ?string $modelLabel = 'Perkuliahan';

    protected static ?string $navigationGroup = 'Kegiatan';

    protected static ?int $navigationSort = 4;
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
    
        if ($user && $user->id == 1) {
            return true;
        }
    
        if ($user->laboratorium && $user->laboratorium->jenis_lab === 'praktikum') {
            return true;
        }
    
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Perkuliahan')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('nama_matKul')->label('Mata Kuliah')->required(),
                                Select::make('id_lab')
                                    ->label('Laboratorium (Ruang Kuliah)')
                                    ->required()
                                    ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                        $userId = auth()->id();
                
                                        if ($userId != 1) {
                                            $idLab = auth()->user()->id_lab;
                                            $query->where('id', $idLab);
                                        }
                        
                                        $query->where('jenis_lab', 'praktikum');
                        
                                        return $query;
                                    })
                                    ->preload()
                                    ->searchable(),

                            ])
                    ]),
                               
                Section::make('Tahun Ajaran')
                    ->schema([
                        Select::make('semester')
                                ->options([
                                    'Ganjil' => 'Ganjil',
                                    'Genap' => 'Genap'
                                ])
                                ->preload()
                                ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('tahun_ajaran_1')
                                    ->label('Awal')
                                    ->numeric()
                                    ->minValue(date('Y')-100)
                                    ->maxValue(date('Y')+9)
                                    ->placeholder(date('Y')-1)
                                    ->required(),
                                TextInput::make('tahun_ajaran_2')    
                                    ->label('Akhir')
                                    ->numeric()
                                    ->minValue(date('Y')-99)
                                    ->maxValue(date('Y')+10)
                                    ->placeholder(date('Y'))
                                    ->required(),
                            ])
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
                TextColumn::make('nama_matKul')
                    ->label('Mata Kuliah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('semester')
                    ->label('Semester')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->getStateUsing(fn($record) => $record->tahun_ajaran_1.'/'.$record->tahun_ajaran_2),
                TextColumn::make('laboratorium.nama_lab')
                    ->label('Laboratorium')
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
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}
