<?php

namespace App\Http\Livewire;

use App\Models\Admin\{Content, Author, Program};
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SearchAll extends Component
{
    public $search;
    protected $queryString = ['search'];
    public function render(): View
    {
        $searchContents = [];
        try {
            $content_ids = Content::search($this->search)->keys()->toArray();
            $searchContents = Content::with('admin.authorInfo')
                ->whereIn('id', $content_ids)
                ->get(['imgCover', 'id', 'title', 'admin_id']);
        } catch (\Exception $e) {
            // Bağlantı hatası durumunda bir uyarı mesajı döndürür
            session()->flash('message', 'MeiliSearch servisine bağlanılamıyor. Lütfen servisin çalıştığından emin olun ve tekrar deneyin.');
        }
        return view('livewire.search-all', [
            'searchContents' => empty($this->search) ? Content::whereNotNull(["published_at"])->limit(12)->inRandomOrder()->get() : $searchContents
        ]);
    }
}
