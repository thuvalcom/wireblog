<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $metaTitle;
    public $metaDescription;
    public $metaKeywords;
    public $metaAuthor;
    public $metaRobots;
    public $metaGoogleSiteVerification;
    public $adsCode;
    public function render()
    {
        return view('livewire.settings');
    }

    public function save()
    {

        $validatedData = $this->validate([
            'metaTitle' => 'required|max:255',
            'metaDescription' => 'required|max:255',
            'metaKeywords' => 'required|max:255',
            'metaAuthor' => 'required|max:255',
            'metaRobots' => 'required|max:255',
            'metaGoogleSiteVerification' => 'required|max:255',
            'adsCode' => 'required',
        ]);

        $settings = [
            'metaTitle' => $this->metaTitle,
            'metaDescription' => $this->metaDescription,
            'metaKeywords' => $this->metaKeywords,
            'metaAuthor' => $this->metaAuthor,
            'metaRobots' => $this->metaRobots,
            'metaGoogleSiteVerification' => $this->metaGoogleSiteVerification,
            'adsCode' => $this->adsCode,
        ];

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        session()->flash('success', 'Settings Successfuly updated');
        $this->redirect('/settings', navigate: true);
    }

    public function mount()
    {
        $this->metaTitle = Setting::where('key', 'metaTitle')->first()->value ?? '';
        $this->metaDescription = Setting::where('key', 'metaDescription')->first()->value ?? '';
        $this->metaKeywords = Setting::where('key', 'metaKeywords')->first()->value ?? '';
        $this->metaAuthor = Setting::where('key', 'metaAuthor')->first()->value ?? '';
        $this->metaRobots = Setting::where('key', 'metaRobots')->first()->value ?? '';
        $this->metaGoogleSiteVerification = Setting::where('key', 'metaGoogleSiteVerification')->first()->value ?? '';
        $this->adsCode = Setting::where('key', 'adsCode')->first()->value ?? '';
    }
}
