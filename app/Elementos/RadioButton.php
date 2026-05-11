<?php
namespace App\Elementos;

class RadioButton extends Elemento {
    private array $opciones;
    private string $seleccionado;

    public function __construct(string $name, array $opciones, string $seleccionado='', bool $disabled=false) {
        parent::__construct($name, $seleccionado, $disabled);
        $this->opciones     = $opciones;
        $this->seleccionado = $seleccionado;
    }

    public function render(): string {
        $html = '';
        $dis  = $this->disabled ? 'disabled' : '';
        foreach ($this->opciones as $valor => $etiqueta) {
            $checked = ($valor == $this->seleccionado) ? 'checked' : '';
            $html .= "<div class='form-check form-check-inline'>";
            $html .= "<input class='form-check-input' type='radio' name='{$this->name}' value='{$valor}' {$checked} {$dis}>";
            $html .= "<label class='form-check-label'>{$etiqueta}</label>";
            $html .= "</div>";
        }
        return $html;
    }
}