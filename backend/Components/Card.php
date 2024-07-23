<?php
final class Card
{
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function renderCard() {
        $card = '<div class="w-64 max-h-80 relative card">';
            $card .= '<img src=' . $this->data['imagem'] .' alt="Foto da capa da obra'. $this->data['titulo'] .'" class="w-full h-full">';
            
            $card .= '<div class="description absolute bottom-0 w-full h-2/6 flex flex-col justify-end gap-y-2 p-4">';
                $card .= '<span class="text-white font-bold">'. $this->data['titulo'] .'</span>';
                $card .= '<div>';

                if($this->data['tipo'] == "serie"){
                    $card .= '<span class="text-white font-bold">Série - '. $this->data['tipo'].'</span>';    
                }else {
                    $card .= '<span class="text-white font-bold">Filme - '. $this->data['tipo'].'</span>';    
                }

                $card .= '</div>';
            $card .= '</div>';

        $card .= '</div>';
        
        echo $card;
    }
}