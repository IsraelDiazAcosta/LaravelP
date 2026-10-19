<?php

namespace App\View\Components\web\blog\post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class show extends Component
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
    public function changeTitle(){
        $this->post->title="Nuevo titulo desde el componente";
    }
  
    public function render(): View|Closure|string
    {
        return view('components.web.blog.post.show');
    }
}
