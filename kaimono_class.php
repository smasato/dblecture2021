<?php
class kaimono_class{

    var $saifu;
    var $who;

    function kaimono_class( $money, $name ){
        $this->saifu = (int)$money;
        $this->who = $name;
    }

    function get_saifu(){
        return $this->saifu;
    }
    function buy( $nedan ){
        if( $this->saifu < $nedan ){
            return FALSE;
        }else{
            $this->saifu -= $nedan;
            return TRUE;
        }
    }
    function message( $shina ){
            print( $this->who.":".$shina."-購入<br />" );
    }
}
?>