<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KegiatanLabResource\Pages;
use App\Filament\Admin\Resources\KegiatanLabResource\RelationManagers;

use App\Models\Kegiatan;
use App\Models\Kegiatan_lab;
use App\Models\Kegiatan_lab_foto;
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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Model;


class KegiatanLabResource extends Resource
{
    protected static ?string $model = Kegiatan_lab::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Kegiatan Laboratorium';

    protected static ?string $modelLabel = 'Kegiatan Laboratorium';

    protected static ?string $navigationGroup = 'Kegiatan';

    protected static ?int $navigationSort = 2;
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
                Section::make('Kegiatan Laboratorium')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('nama_kegiatan')->label('Nama Kegiatan')->required(),

                                Select::make('id_kegiatan')
                                    ->label('Kategori Kegiatan')
                                    ->relationship('kegiatan', 'kategori_kegiatan')
                                    ->preload()
                                    ->searchable(),

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

                                DatePicker::make('tanggal'),
                            ]),
                    ]),


                Section::make('Detail Kegiatan')
                    ->schema([
                        Repeater::make('kegiatan_lab_foto')
                            ->label('')
                            ->relationship('kegiatan_lab_foto')
                            ->schema([
                                FileUpload::make('foto')
                                    ->label('Foto Kegiatan')
                                    ->image()
                                    ->disk('public'),
                                Textarea::make('keterangan')
                                    ->label('Keterangan')
                                    ->rows(10),
                            ])
                            ->addable(false)
                            ->deletable(false),
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
                    return $query->where('id_lab', $idLab);
                }
            })
            ->columns([
                TextColumn::make('laboratorium.nama_lab')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kegiatan.kategori_kegiatan')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nama_kegiatan')
                    ->limit(20)
                    ->label('Nama Kegiatan')
                    ->sortable(),
                TextColumn::make('tanggal')
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
            'index' => Pages\ListKegiatanLabs::route('/'),
            'create' => Pages\CreateKegiatanLab::route('/create'),
            'edit' => Pages\EditKegiatanLab::route('/{record}/edit'),
        ];
    }
}
