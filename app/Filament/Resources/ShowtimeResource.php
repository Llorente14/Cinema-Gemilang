<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShowtimeResource\Pages;
use App\Filament\Resources\ShowtimeResource\RelationManagers;
use App\Models\Showtime;
use Illuminate\Support\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShowtimeResource extends Resource
{
    protected static ?string $model = Showtime::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Jadwal Tayang';
    protected static ?string $navigationGroup = 'Manajemen Cinema';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('movie_id')
                    ->relationship('movie', 'title')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('studio_id')
                    ->relationship('studio', 'name', fn(Builder $query) => $query->where('is_maintenance', false))
                    ->searchable()
                    ->required()
                    // 🎨 Memberi warna pada teks option
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->name}")
                    ->allowHtml()
                    ->getSearchResultsUsing(fn(string $search) => \App\Models\Studio::where('name', 'like', "%{$search}%")->limit(50)->get()->mapWithKeys(function ($studio) {
                        return [$studio->getKey() => '<span style="color: darkorange;">' . $studio->name . '</span>'];
                    })),


                Forms\Components\DateTimePicker::make('start_time')
                    ->required()
                    // 💡 Membuat field ini "live" agar perubahannya bisa langsung dideteksi
                    ->live(onBlur: true)
                    // 💡 Logika yang dijalankan setelah tanggal/jam diubah
                    ->afterStateUpdated(function (callable $set, ?string $state) {
                        if ($state === null) {
                            return;
                        }
                        // Konversi string tanggal ke objek Carbon
                        $date = Carbon::parse($state);
                        // Cek apakah hari Jumat (5), Sabtu (6), atau Minggu (7)
                        if (in_array($date->dayOfWeekIso, [5, 6, 7])) {
                            // Atur harga weekend
                            $set('price', 60000);
                        } else {
                            // Atur harga hari biasa
                            $set('price', 45000);
                        }
                    }),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('movie.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('studio.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BookingsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShowtimes::route('/'),
            'create' => Pages\CreateShowtime::route('/create'),
            'view' => Pages\ViewShowtime::route('/{record}'),
            'edit' => Pages\EditShowtime::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
