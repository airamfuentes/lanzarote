<?php
namespace App\Elementos;

class Elemento {
    protected string $name;
    protected string $value;
    protected bool $disabled;

    public function __construct(string $name, string $value='', bool $disabled=false) {
        $this->name     = $name;
        $this->value    = $value;
        $this->disabled = $disabled;
    }

    public function render(): string { return ''; }
    public function __toString(): string { return $this->render(); }
}