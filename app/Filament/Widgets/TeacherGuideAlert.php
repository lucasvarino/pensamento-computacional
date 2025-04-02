<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;

class TeacherGuideAlert extends Widget
{
    protected static string $view = 'filament.widgets.teacher-guide-alert';
    protected $listeners = ['refreshComponent' => '$refresh'];

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && !$user->saw_guide;
    }

    public function dismissAlert()
    {
        $user = auth()->user();
        if ($user) {
            $user->update(['saw_guide' => true]);

            return redirect('/admin');
        }
    }
}
