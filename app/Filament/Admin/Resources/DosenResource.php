<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DosenResource\Pages;
use App\Filament\Admin\Resources\DosenResource\RelationManagers;

use App\Models\Dosen;
use App\Models\Jabatan;
use App\Models\Jenjang;
use App\Models\Universitas;
use App\Models\Laboratorium;
use App\Models\Dosen_jabatan;

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
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class DosenResource extends Resource
{
    protected static ?string $model = dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Dosen';

    protected static ?string $modelLabel = 'Dosen';

    protected static ?string $navigationGroup = 'Dosen';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Dosen')
                    ->schema([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                TextInput::make('nip')
                                    ->integer()
                                    ->label('NIP')
                                    ->placeholder('18-digit')
                                    ->required(),

                                TextInput::make('nama')
                                    ->label('Nama Dosen')
                                    ->required(),

                                TextInput::make('email')
                                    ->email()
                                    ->placeholder('dosen@gmail.com'),

                            ]),

                        FileUpload::make('foto')
                            ->label('Foto Dosen')
                            ->image()
                            ->disk('public'),

                    ]),

                Section::make('Pendidikan Dosen')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Select::make('jenjang')
                                    ->label('Pendidikan Terakhir')
                                    ->options([
                                        's1' => 'S1',
                                        's2' => 'S2',
                                        's3' => 'S3'
                                    ])
                                    ->preload(),

                                TextInput::make('universitas')
                                    ->placeholder('Tempat pendidikan terakhir'),
                            ]),
                    ]),

                Section::make('Akun Dosen')
                    ->description('Berupa akun resmi, berisi URL langsung (jika ada)')
                    ->schema([
                        TextInput::make('akun_scopus')->label('Scopus')->placeholder('https://www.example.com'),
                        TextInput::make('akun_googleScholar')->label('Google Scholar')->placeholder('https://www.example.com'),
                        TextInput::make('akun_sinta')->label('SINTA')->placeholder('https://www.example.com'),
                    ]),

                Section::make('Laboratorium')
                    ->schema([
                        Select::make('id_lab')
                            ->label('')
                            ->relationship('laboratorium', 'nama_lab', function (Builder $query) {
                                $userId = auth()->id();

                                if ($userId == 1) {
                                    $query;
                                } else {
                                    $idLab = auth()->user()->id_lab;
                                    $query->where('id', $idLab);
                                }
                            })
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),

                Section::make('Jabatan')
                    ->description('Jabatan dosen pada laboratorium yang bersangkutan')
                    ->schema([
                        Repeater::make('dosen_jabatan')
                            ->relationship('dosen_jabatan')
                            ->label('')
                            ->schema(components: [
                                Select::make('id_jabatan')
                                    ->label('Jabatan Laboratorium')
                                    ->relationship('jabatan', 'jabatan')
                                    ->preload()
                                    ->searchable(),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        TextInput::make('dari_tahun')
                                            ->label('Dari Tahun')
                                            ->numeric()
                                            ->minValue(date('Y') - 100)
                                            ->maxValue(date('Y') + 9)
                                            ->placeholder(date('Y') - 1),

                                        TextInput::make('sampai_tahun')
                                            ->label('Sampai Tahun')
                                            ->numeric()
                                            ->minValue(date('Y') - 99)
                                            ->maxValue(date('Y') + 10)
                                            ->placeholder(date('Y')),
                                    ])
                            ])
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
                    return $query->where('id_lab', $idLab);
                }
            })
            ->columns([
                TextColumn::make('nip')
                    ->label(label: 'NIP')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('foto')
                    ->circular(),
                TextColumn::make('nama')
                    ->searchable()
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
