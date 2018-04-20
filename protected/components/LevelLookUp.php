<?php

class LevelLookUp{

      const Administrador=1;
      
      const Contador=2;
      
      const Secretario=3;

          // For CGridView, CListView Purposes

      public static function getLabel( $level ){

          if($level == self::Administrador)

            return '1';

          if($level == self::Contador)

            return '2';

          if($level == self::Secretario)

            return '3';

          return false;

      }

      // for dropdown lists purposes

      public static function getLevelList(){

          return array(

                 self::Administrador=>'1',
                 self::Contador=>'2',
                 self::Secretario=>'3',
          ); 

    }

}

