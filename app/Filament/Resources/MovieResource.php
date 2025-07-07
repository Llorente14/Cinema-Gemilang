<?php

namespace App\Filament\Resources;

use App\Enums\AgeRating;
use App\Enums\MovieStatus;
use App\Filament\Resources\MovieResource\Pages;
use App\Filament\Resources\MovieResource\RelationManagers;
use App\Models\Movie;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationLabel = 'Film';
    protected static ?string $navigationGroup = 'Manajemen Cinema';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug'),
                Forms\Components\Textarea::make('synopsis')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('poster_url'),
                Forms\Components\TextInput::make('trailer_url'),
                Forms\Components\TextInput::make('duration_in_minutes')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('release_date')
                    ->required(),
                Forms\Components\Select::make('age_rating')
                    ->options(AgeRating::class) // 👈 Otomatis ambil opsi & warna dari Enum
                    ->required()
                    ->native(false), // 👈 Gunakan style select dari Filament

                Forms\Components\Select::make('status')
                    ->options(MovieStatus::class) // 👈 Otomatis ambil opsi & warna dari Enum
                    ->required()
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('poster_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('trailer_url')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('duration_in_minutes')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('release_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(MovieStatus $state): string => match ($state) {
                        MovieStatus::ComingSoon => 'warning',
                        MovieStatus::NowPlaying => 'success',
                        MovieStatus::Archived => 'gray',
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('age_rating')
                    ->badge()
                    ->color(fn(AgeRating $state): string => match ($state) {
                        AgeRating::SU => 'info',
                        AgeRating::R13 => 'success',
                        AgeRating::D17 => 'warning',
                        AgeRating::D21 => 'danger',
                    })
                    ->searchable(),
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
                //Filter berdasarkan MOVIESTATUS Enums
                SelectFilter::make('status')
                    ->label('Filter Status Film')
                    ->native(false)
                    ->multiple()
                    ->options(
                        collect(MovieStatus::cases())->mapWithKeys(function ($status) {
                            return [$status->value => $status->getLabel()];
                        })
                    )
                    ->query(function ($query, array $data) {
                        if (empty($data['values'])) {
                            return;
                        }
                        $query->whereHas('showtimes.movie', function ($subQuery) use ($data) {
                            $subQuery->where('status', $data['values']);
                        });
                    }),
                //Filter berdasarkan AgeRating Enums
                SelectFilter::make('age_rating')
                    ->label('Filter Rating Usia')
                    ->native(false)
                    ->multiple()
                    ->options(
                        collect(AgeRating::cases())->mapWithKeys(function ($age_rating) {
                            return [$age_rating->value => $age_rating->getLabel()];
                        })
                    )
                    ->query(function ($query, array $data) {
                        if (empty($data['values'])) {
                            return;
                        }
                        $query->whereHas('showtimes.movie', function ($subQuery) use ($data) {
                            $subQuery->where('age_rating', $data['values']);
                        });
                    }),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('Tanggal Awal'),
                        DatePicker::make('Tanggal Akhir')->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['Tanggal Awal'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['Tanggal Akhir'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
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
            RelationManagers\ShowtimesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'view' => Pages\ViewMovie::route('/{record}'),
            'edit' => Pages\EditMovie::route('/{record}/edit'),
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
