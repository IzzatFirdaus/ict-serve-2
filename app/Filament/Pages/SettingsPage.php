<?php

namespace App\Filament\Pages;

use App\Models\Grade;
use App\Models\Setting;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string|\UnitEnum|null $navigationGroup = 'Pentadbiran Sistem';
    protected static ?string $title = 'Tetapan Aplikasi';
    protected string $view = 'filament.pages.settings-page';

    public ?array $data = [];

    public function mount(): void
    {
        // Find the 'general' settings record, or create it if it doesn't exist.
        $settings = Setting::query()->firstOrCreate(['key' => 'general'])->value ?? [];
        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('min_approval_grade_id')
                ->label('Gred Minimum Pegawai Penyokong')
                ->options(Grade::where('is_approver_grade', true)->pluck('name', 'id'))
                ->helperText('Gred minimum yang diperlukan untuk menyokong permohonan pinjaman.')
                ->required(),
            TextInput::make('return_reminder_days')
                ->label('Peringatan Pemulangan (Hari)')
                ->numeric()
                ->helperText('Bilangan hari sebelum tarikh pulang untuk menghantar notifikasi e-mel peringatan.')
                ->required(),
        ])->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Find and update the 'general' settings record.
        $setting = Setting::query()->firstOrNew(['key' => 'general']);
        $setting->value = $data;
        $setting->save();

        Notification::make()
            ->title('Tetapan berjaya disimpan')
            ->success()
            ->send();
    }
}
