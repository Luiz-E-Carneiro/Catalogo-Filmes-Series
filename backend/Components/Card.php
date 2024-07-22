<?php
final class Card
{
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function renderCard() {
        $card = '<div class="">';

                        

        $card .= '</div>';
        
        echo $card;
    }
}