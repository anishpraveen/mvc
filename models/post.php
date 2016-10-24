<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $sql="SELECT * FROM posts where userID = '". $_SESSION['userid'] ."'";
      $req = $db->query($sql);

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }
     public static function insert($auther,$content) {
      $conn = mysqliDB::getConn();
      $sql=$conn->prepare(" INSERT INTO `posts`(`userID`, `author`, `content`) VALUES (?,?,?)");
      $sql->bind_param('iss', $_SESSION['userid'],$auther,$content);               
      //echo "$conn";
      if ($sql->execute() === TRUE) {
          $id= $sql->insert_id;
          $pMessage= "Record Added successfully";
          //$_SESSION['username']=$name;
          $conn->close();
          return TRUE;
      } else {
          $pMessage= "Error Adding record: " . $conn->error;
          return FALSE;
      }

      $conn->close();
      return $id;
      
    }

    public static function delete($id){
      $conn = mysqliDB::getConn();
      $sql=$conn->prepare(" DELETE FROM `posts` WHERE id=? AND userID=?" );
      $sql->bind_param('ii', $id, $_SESSION['userid']);               
      //echo "$conn";
      if ($sql->execute() === TRUE) {
          //$id= $sql->insert_id;
          $pMessage= "Record Deleted successfully";
          //$_SESSION['username']=$name;
          $conn->close();
          return TRUE;
      } else {
          $pMessage= "Error Deleting record: " . $conn->error;
          return FALSE;
      }

      $conn->close();
      //return $id;
    }
  }
?>