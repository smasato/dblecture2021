<?php
require_once( "kaimono_class.php" );
class kaimono2_class extends kaimono_class {

    var $card;

    function kaimono2_class( $money, $name, $card = 0 ){
        $this->kaimono_class( $money, $name );
        $this->card = $card;
    }

    function get_card(){
        return $this->card;
    }
    function buy2( $nedan ){
        if( !$this->buy( $nedan ) ){
            $this->card -= $nedan;
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function message_money( $shina ){
        $this->message( $shina );
    }
    function message_card( $shina ){
        print( $this->who.":".$shina."-購入(カード)<br />" );
    }
}
?>