<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Showtime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Pesanan Tiket';
    protected static ?string $navigationGroup = 'Laporan & Transaksi';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // BAGIAN 1: PEMILIHAN JADWAL & JUMLAH TIKET
                Forms\Components\Section::make('Detail Jadwal')
                    ->description('Pilih film untuk melihat jadwal yang tersedia.')
                    ->schema([
                        Forms\Components\Select::make('movie_id')
                            ->label('Pilih Film')
                            // Kita secara manual mengambil data dari model Movie
                            ->options(
                                Movie::query()
                                    // Filter tambahan: hanya tampilkan film yang punya jadwal tayang
                                    ->whereHas('showtimes', fn($query) => $query->where('start_time', '>', now()))
                                    ->pluck('title', 'id')
                            )
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Set $set) => $set('showtime_id', null)),

                        // Pilih jadwal berdasarkan film yang dipilih di atas
                        Forms\Components\Select::make('showtime_id')
                            ->label('Pilih Jadwal Tayang')
                            ->native(false)
                            ->required()
                            ->options(function (Get $get) {
                                $movieId = $get('movie_id');
                                if (!$movieId) {
                                    return [];
                                }
                                // 💡 Opsi jadwal hanya muncul jika film sudah dipilih
                                return Showtime::where('movie_id', $movieId)
                                    ->where('start_time', '>', now()) // Hanya jadwal yang akan datang
                                    ->get()
                                    ->mapWithKeys(function ($st) {
                                        // Tampilkan info lengkap: Jam Tayang - Studio (Sisa Kursi)
                                        $sisaKursi = $st->studio->capacity - $st->bookings()->count();
                                        return [$st->id => $st->start_time->format('H:i') . ' - ' . $st->studio->name . ' (Sisa: ' . $sisaKursi . ' kursi)'];
                                    })
                                    ->all();
                            })
                            ->live() // 💡 Reaktif untuk menghitung harga
                            ->afterStateUpdated(fn(Set $set) => $set('quantity', 1)), // Reset jumlah tiket

                        Forms\Components\TextInput::make('quantity')
                            ->label('Jumlah Tiket')
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->live(onBlur: true) // 💡 Reaktif saat selesai mengetik
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                // Hitung ulang harga jika jumlah tiket berubah
                                $showtime = Showtime::find($get('showtime_id'));
                                if ($showtime) {
                                    $total = (int)$get('quantity') * $showtime->price;
                                    $set('total_price', $total);
                                }
                            }),
                    ])->columns(2),

                // BAGIAN 2: DETAIL PEMESAN & HARGA
                Forms\Components\Section::make('Detail Pemesan')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Pemesan (Opsional)')
                            ->relationship('user', 'name', fn(Builder $query) => $query->where('role', 'customer'))
                            ->native(false)
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')->required(),
                                Forms\Components\TextInput::make('email')->email()->required(),
                                Forms\Components\TextInput::make('password')->password()->required(),
                            ]),

                        Forms\Components\TextInput::make('total_price')
                            ->label('Total Harga')
                            ->prefix('Rp')
                            ->numeric()
                            ->readOnly() // 🔒 Harga tidak bisa diubah manual
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('showtime.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booking_code')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'view' => Pages\ViewBooking::route('/{record}'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
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
