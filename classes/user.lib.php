<?php
  /**
    @class : user 
    @date : 9:32pm 
    @author : youssifsayed
    @using : get user from datebase
  */
  class user{
    
    /**
      * string mksql() *
      
      @prame array $a 
      @prame string $type : sql type [where,delete,update]
      @using : change array to sql string  
      @date : 9:32pm 
    */
    public function mksql($q ,$type){
      switch($q){
        case : "SELECT"
          $sql = "SELECT * FROM `blog_users` WHERE";
          $i = 0;
          foreach($q as $name => $val){
            $and = ($i==0) ? NULL : "AND";
            $sql .= " {$name} = '{$val}'";
            $i++;
          }
        break;
      }
    }
    
    /**
     *mysql::query GETuser()*
     
     @prame array $q 
    */
    public function GETuser($q){
      global $condb;
      $sql = $this->mksql($q,"SELECT");
      return $condb->query($sql);
    }
  }
?>
