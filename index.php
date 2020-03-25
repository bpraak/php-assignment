<?php
    include 'connect.php';
    session_start();

    

    if(!isset($_SESSION['user_id'])){
        header("Location:first.html");
    }
    $id = $_SESSION['user_id'];

?>

<!DOCTYPE html>

<head>
    <link href="./css/index.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,900&display=swap" rel="stylesheet">
    <script src="./js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <div class="list">
            <ol class="gradient-list">
                <?php
                    $li = "select * from prakhar_profile where not user_id='$id' order by name" ;
                    $result = mysqli_query($conn,$li);
                    if(!$result){
                        die('QUERY FAILED'.$id. mysqli_error($conn));
                    }
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <li>
                    <a href="index.php?uid=<?php echo $row['user_id']; ?>" class="no-link">
                    <div class="people">
                    <div ><img class="dp" src="uploads/profile_<?php echo $row['user_id'] ?>.png"></div>
                    <div class="list-wrapper">
                        <div><?php echo $row['name'] ?></div>
                        <div class="list-item">
                            <div><?php echo $row['gender'];?></div>
                            <div><?php echo $row['city'];?></div>
                            <div><?php echo $row['qual'];?></div>
                        </div>
                    </div>
                    </div>
                    </a>
                </li>
                    <?php } ?>
            </ol>
        </div>
        <div class="grid">
            <div class="info">
                <div class="top-info">
                    <a href="edit.php">Edit Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
                <div class="bottom-info">
                    <div class="not-photo">
                        <div>
                            <div class="heading">Name: </div>
                            <?php 
                                

                                $sql="select prakhar_user.*,prakhar_profile.* from prakhar_profile join prakhar_user on prakhar_user.user_id=prakhar_profile.user_id where prakhar_profile.user_id='$id'";
                                $data= mysqli_query($conn,$sql);
                                if(!$data){
                                    die('QUERY FAILED' . mysqli_error($conn));

                                }
                                $r = mysqli_fetch_array($data);
                                echo $r['name']
                            ?>
                        </div>
                        <div>
                            <div class="heading">Gender: </div><?php echo $r['gender'];?>
                        </div>
                        <div>
                            <div class="heading">City: </div><?php echo $r['city'];?>

                        </div>
                        <div>
                            <div class="heading">Qualification: </div><?php echo $r['qual'];?>

                        </div>
                        <div>
                            <div class="heading">Phone: </div><?php echo $r['phone'];?>

                        </div>
                    </div>
                    <div class="photo">
                        <img src="uploads/profile_<?php echo $id ?>.png" class="my-dp">
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="heading">
                    <center>
                        CHAT : <?php 
                                    if(isset($_GET['uid'])){
                                        $to_id = $_GET['uid'];
                                        $person = "select name from prakhar_profile where user_id='$to_id'";
                                        $result = mysqli_query($conn,$person);
                                        $re = mysqli_fetch_assoc($result);
                                        echo $re['name'];
                                    } 
                                    else echo "Select a person";
                                ?>
                    </center>
                </div>
                <div class="chat-box">
                    <div class="chat-fixed">
                        <div><input type="text" name="message" id="msg" onkeypress="check_enter(event,<?php echo $to_id; ?>,<?php echo $id; ?>)"></div>
                        <div><button id="send" onclick="send_msg(<?php echo $to_id; ?>,<?php echo $id; ?>)">Send</button></div>
                    </div>
                    <div class="msg-wrapper">
                    <!-- <div class="msg-my">11pm<span class="my">Your Message</span></div>
                    <div class="msg-his"><span class="his">his Message</span>11pm</div>
                    <div class="msg-my">11pm<span class="my">Your Message</span></div>
                    <div class="msg-his"><span class="his">his Message</span>11pm</div> -->
                    <?php 
                    if(isset($_GET['uid'])){
                        ?>
                    <script>
                        setTimeout(get_msg(<?php echo $to_id; ?>,<?php echo $id; ?>),1000);
                    </script>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>