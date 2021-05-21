<?php
		          $baglanti = new PDO("mysql:host=localhost;dbname=smf", "root", "");
		          $baglanti->exec("SET NAMES utf8");
		          $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		          $stmt = $baglanti->prepare("SELECT * FROM smf_members WHERE id_member=? ");
		          $stmt->execute([$context['user']['id']]);
 


 
               $mysqlsunucu    = "localhost";
               $mysqlkullanici = "root";
               $mysqlsifre    = "";
               try
               {
                   $conn = new PDO("mysql:host=$mysqlsunucu;dbname=twrp;charset=utf8", $mysqlkullanici, $mysqlsifre);
                   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   //echo "Bağlantı başarılı"; 
                }
               catch(PDOException $e)
                {
                   //echo "Bağlantı hatası: " . $e->getMessage();
               }

               $stmt = $conn->prepare("SELECT * FROM karakterler WHERE forumid=?");
               $stmt->execute([$_GET['karakterisim']]);
               $oyuncu = $stmt->fetch();
               $isim = str_replace(_, " ", $oyuncu['isim']);
               if(empty($oyuncu['isim']))
               {
                  $isim = "Veri Bulunamadı";
                  $oyuncu['skin'] = 0;
                  $birlik['birlik_isim'] = "Veri Bulunamadı";
               }
               else
               {
                  if($oyuncu['birlik'] > 0) 
                  {
                     $stmt = $conn->prepare("SELECT * FROM birlikler WHERE birlik_id=?");
                     $stmt->execute([$oyuncu['birlik_id']]);
                     $birlik = $stmt->fetch();
                  }
                  else if($oyuncu['Birlik'] < 0)
                  {
                     $birlik['birlik_isim'] = "Veri Bulunamadı";
                  }
               }
                
           


                     $stmt->execute([$_GET['karakter']]);
        //cinsiyet = kadin v.s vs
                          
?>