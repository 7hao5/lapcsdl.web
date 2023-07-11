<div class="main">
        <?php
            include("sidebar/sidebar.php")
        ?>
        <div class="maincontent">
            <?php
                if(isset($_GET['quanly'])){
                    $tam=$_GET['quanly'];
                }else{
                    $tam='';
                }
                if($tam=='xemranksinhvien'){
                    include("quanlysinhvien/xemranksvien.php");
                }elseif($tam=='xemphanhoi'){
                    include("quanlysinhvien/xemphanhoi.php");
                }elseif($tam=='tinnhan'){
                    include("quanlysinhvien/nhanlaichosinhvien.php");
                }elseif($tam=='suadiem'){
                    include("quanlysinhvien/chinhsuadiemsvien.php");
                }elseif($tam=='suatt'){
                    include("quanlysinhvien/chinhsuathongtinsvien.php");
                }elseif($tam=='xemthongtinsv'){
                    include("quanlysinhvien/tracuusinhvien.php");
                }
            ?>
        </div>
</div>
<div class="clear"></div>