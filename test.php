<?php
				require_once("koneksi.php");
                $sql = "SELECT * FROM (SELECT * FROM arduino ORDER BY id DESC LIMIT 30) sub WHERE ruangan=1 ORDER BY id ASC";
                $row = $db->prepare($sql);
                $row->execute();
                $hasil = $row->fetchAll();
                foreach($hasil as $b){
                    echo $b['flame_sensor'];
                    echo ", ";
                }
                ?>