<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JabatanResource\Pages;
use App\Filament\Admin\Resources\JabatanResource\RelationManagers;

use App\Models\Dosen;
use App\Models\Jabatan;
use App\Models\Laboratorium;
use App\Models\Dosen_jabatan;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;

class JabatanResource extends Resource
{
    protected static ?string $model = Dosen_jabatan::class;

    protected static ?string $navigationIcon = 'hugeicons-user-list';

    protected static ?string $navigationLabel = 'Jabatan Laboratorium';

    protected static ?string $modelLabel = 'Jabatan';

    protected static ?string $navigationGroup = 'Laboratorium';

    protected static ?int $navigationSort = 3;

    public static function canViewAny(): bool
    {
        return auth()->check();
    }

    public static function canCreate(): bool
    {
        return auth()->check();
    }

    public static function canEdit($record): bool
    {
        return auth()->check();
    }

    public static function canDelete($record): bool
    {
        return auth()->check();
    }

    public static function canView($record): bool
    {
        return auth()->check();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Jabatan Laboratorium')
                ->schema([
                    Select::make('id_dosen') 
                        ->label('Nama Dosen')
                        ->options(Dosen::pluck('nama', 'id'))
                        ->searchable()
                        ->preload()
                        ->required(),
                        
                        Section::make('Jabatan')
                        ->description('*tahun bisa kosong')
                        ->schema([
                            Forms\Components\Grid::make(2)
                            ->schema([
                                Select::make('id_jabatan') 
                                ->label('Jabatan')
                                ->options(fn() => auth()->user()->id == 1 
                                    ? [
                                        '1' => 'Kepala',
                                        '2' => 'Koordinator',
                                        '3' => 'Anggota'
                                    ] 
                                    : [ 
                                        '2' => 'Koordinator',
                                        '3' => 'Anggota'
                                    ])
                                ->searchable()
                                ->preload()
                                ->required(),
            
                                Select::make('id_lab') 
                                    ->label('Laboratorium')
                                    ->options(Laboratorium::pluck('nama_lab', 'id'))
                                    ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                        $userId = auth()->id();
        
                                        if ($userId == 1) {
                                            $query;
                                        } else {
                                            $idLab = auth()->user()->id_lab;
                                            $query->where('id', $idLab);
                                        }
                                    })
                                    ->preload()
                                    ->searchable()
                                    ->required(),
                            ]),
                            Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('dari_tahun')
                                    ->label('Dari Tahun')
                                    ->numeric()
                                    ->minValue(date('Y') - 100)
                                    ->maxValue(date('Y') + 9),
    
                                TextInput::make('sampai_tahun')
                                    ->label('Sampai Tahun')
                                    ->numeric()
                                    ->minValue(date('Y') - 99)
                                    ->maxValue(date('Y') + 10),
                            ])
                        ]),
                ]),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $userId = auth()->id();
                if ($userId != 1) {
                    $idLab = auth()->user()->id_lab;
                    $query->where('id_lab', $idLab);
                }
            })
            ->columns([
                TextColumn::make('jabatan.jabatan') 
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
    
                TextColumn::make('laboratorium.nama_lab')
                    ->label('Laboratorium')
                    ->searchable()
                    ->sortable(),
    
                TextColumn::make('dosen.nama')
                    ->label('Nama Dosen')
                    ->searchable()
                    ->sortable(),
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
