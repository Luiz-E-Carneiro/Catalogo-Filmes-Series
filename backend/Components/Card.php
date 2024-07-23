<?php
final class Card
{
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function renderCard() {
        $card = '<form action="./../backend/Pages/Description.php" method="post" class="w-64 max-h-80 relative card">';
            $card .= '<input type="hidden" name="id" value="'. $this->data['id'].'">'; 
            $card .= '<img src=' . $this->data['imagem'] .' alt="Foto da capa da obra '. $this->data['titulo'] .'" class="w-full h-full">';
            
            $card .= '<div class="description absolute bottom-0 w-full h-2/6 flex flex-col justify-end gap-y-1 p-4">';
                $card .= '<span class="text-white font-bold">'. $this->data['titulo'] .'</span>';
                $card .= '<div>';

                if($this->data['tipo'] == "serie"){
                    $card .= '<span class="text-white font-bold">Série - '. $this->data['nome'].'</span>';    
                }else {
                    $card .= '<span class="text-white font-bold">Filme - '. $this->data['nome'].'</span>';    
                }

                $card .= '</div>';
            $card .= '</div>';

        $card .= '</form>';
        
        echo $card;
    }
}