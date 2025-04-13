<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PengabdianResource\Pages;
use App\Filament\Admin\Resources\PengabdianResource\RelationManagers;

use App\Models\Pengabdian;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;

class PengabdianResource extends Resource
{
    protected static ?string $model = Pengabdian::class;

    protected static ?string $navigationIcon = 'carbon-event-schedule';

    protected static ?string $navigationLabel = 'Pengabdian';

    protected static ?string $modelLabel = 'Pengabdian';

    protected static ?string $navigationGroup = 'Kegiatan';

    protected static ?int $navigationSort = 5;
    
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
                Section::make('Pengabdian')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('judul_pengabdian')->label('Judul Kegiatan (Pengabdian)'),
                                DatePicker::make('tanggal'),
                            ]),

                        Select::make('id_lab')
                            ->label('Tempat')
                            ->required()
                            ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                $userId = auth()->id();
                
                                if ($userId != 1) {
                                    $idLab = auth()->user()->id_lab;
                                    $query->where('id', $idLab);
                                }
                
                                $query->where('jenis_lab', 'bidang minat');
                
                                return $query;
                            })
                            ->preload()
                            ->searchable()
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
                TextColumn::make('judul_pengabdian')
                    ->label('Judul Pengabdian')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal')
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
            'index' => Pages\ListPengabdians::route('/'),
            'create' => Pages\CreatePengabdian::route('/create'),
            'edit' => Pages\EditPengabdian::route('/{record}/edit'),
        ];
    }
}
